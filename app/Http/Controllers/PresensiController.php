<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Presensi;
use App\Lokasi;
use Carbon\Carbon;

class PresensiController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function timeZone($location){
        return date_default_timezone_set($location);
    }

    public function cek_lokasi(Request $request){
        return response()->json(['success'=>'Ajax request submitted successfully']);
    }
    
    public function index()
    {
        $this->timeZone('Asia/Jakarta');
        $presensi = Presensi::all();
        $lokasi = Lokasi::all();
        $user = User::where('id', Auth::user()->id)->first();
        $user_id = Auth::user()->id;
        $date = date("Y-m-d");
        $cek_absen = Presensi::where(['user_id' => $user_id, 'date' => $date])
                            ->get()
                            ->first();
        if (is_null($cek_absen)) {
            $info = array(
                "status" => "Anda belum mengisi absensi!",
                "btnIn" => "",
                "btnOut" => "disabled");
        } elseif ($cek_absen->time_out == NULL) {
            $info = array(
                "status" => "Jangan lupa absen keluar",
                "btnIn" => "disabled",
                "btnOut" => "");
        } else {
            $info = array(
                "status" => "Absensi telah selesai!",
                "btnIn" => "disabled",
                "btnOut" => "disabled");
        }
        
        $data_absen = Presensi::where('user_id', $user_id)
                        ->orderBy('date', 'desc')
                        ->paginate(20);
        return view('presensi.index', compact('data_absen', 'lokasi', 'info', 'user', 'user_id', 'presensi'));
    }

    public function datang(Request $request){
        // dd($request);
        
        $cek_datang = Presensi::where('status', 'datang')->first();
            
        //simpan database presensi
        // absen masuk
        if (empty($cek_datang))
        {
            $lok = new Lokasi;
            $lok->latitude = $request->latitude;
            $lok->longitude = $request->longitude;
            $lok->save();

            $presensi = new Presensi;
            $this->timeZone('Asia/Jakarta');
            $presensi->user_id = Auth::user()->id;
            $presensi->id_lokasi = $lok->id;
            $presensi->date = date("Y-m-d");
            $presensi->time_in = date("H:i:s");
            $presensi->rencana = $request->rencana;
            $presensi->status = "datang";
            $presensi->save();  
        }else{

            $presensi = Presensi::where('user_id', Auth::user()->id)->where('status', 'datang')->first();
            
            $presensi->user_id = Auth::user()->id;
            $this->timeZone('Asia/Jakarta');
            $presensi->date = date("Y-m-d");
            $presensi->time_out = date("H:i:s");
            $foto = $request->file('file');
            if($foto != ""){
                $extension = $foto->getClientOriginalExtension();
                $filename = time() . '_bukti.' . $extension;
                $foto->move('bukti_pekerjaan/' , $filename);
                $presensi->bukti = $filename;
            }
            $presensi->status = "pulang";
            $presensi->update();

            $lok = Lokasi::where('id', $presensi->id_lokasi)->first();;
            $lok->latitude = $request->latitude;
            $lok->longitude = $request->longitude;
            $lok->update();
            
        }
        // dd($request);
        return redirect('/presensi');
    }

    public function laporan(){
        $presensi = Presensi::get();
        $lokasi = Lokasi::get();
        $users = User::get();
        return view('/presensi/laporan-presensi',compact('users', 'lokasi', 'presensi'));
    }

    public function cetak_presensi(){
        $this->timeZone('Asia/Jakarta');
        $presensi = Presensi::get();
        $user = User::get();
        $user_id = Auth::user()->id;
        $date = date("Y-m-d");
        $lokasi = Lokasi::get();

        $data_absen = Presensi::where('user_id', $user_id)
                        ->orderBy('date', 'desc')
                        ->paginate(5);
        return view('presensi/cetak-presensi',compact('data_absen', 'user', 'user_id', 'presensi', 'lokasi', 'date'));
    }

    public function cetak_presensi_pertanggal($tglawal, $tglakhir){
        // dd(["Tanggal Awal: ".$tglawal, "Tanggal Akhir: ".$tglakhir]);
        $cetakpertanggal = Presensi::get()->whereBetween('date',[$tglawal, $tglakhir]);
        $lokasi = Lokasi::get();
        return view('presensi/cetak-presensi-form', compact('cetakpertanggal', 'lokasi'));
    }
}
 