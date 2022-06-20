<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perijinan;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PerijinanController extends Controller
{
    public function index(){
        // set expired perijinan
        $data_exp = Perijinan::where([
            'user_id' => Auth::user()->id,
            'status'  => 'Menunggu'
        ])->get();

        $now = new Carbon();

        foreach($data_exp as $data){
            $date_exp = "";
            if($data->tanggal_awal != $data->tanggal_akhir)
                $date_exp = $data->tanggal_awal." 23:59:00";
            else{
                $menit = explode(" - ",$data->jam);
                $date_exp = $data->tanggal_awal." ".$menit[0].":00";
            }

            $exp   = new Carbon($date_exp);

            if($exp->isPast()){
                $pr = Perijinan::find($data->id);
                $pr->status= 'Expired';
                $pr->save();
            }
        }
        
        $perijinan = Perijinan::where('user_id', Auth::user()->id )->get();
        $user = User::get();
        $ijin['diijinkan'] = Perijinan::where([
            'user_id' => Auth::user()->id,
            'status'  => 'DiIjinkan'
        ])->count();
        $ijin['ditolak'] = Perijinan::where([
            'user_id' => Auth::user()->id,
            'status'  => 'DiTolak'
        ])->count();
        $ijin['menunggu'] = Perijinan::where([
            'user_id' => Auth::user()->id,
            'status'  => 'Menunggu'
        ])->count();
        $ijin['expired'] = Perijinan::where([
            'user_id' => Auth::user()->id,
            'status'  => 'Expired'
        ])->count();

        return view ('perijinan.index',compact('user', 'perijinan', 'ijin'));
    }
    
    public function timeZone($location){
        return date_default_timezone_set($location);
    }

    public function upload_ijin(Request $request){
        $perijinan = new Perijinan;
        $perijinan->user_id = Auth::user()->id;
        $perijinan->izin = $request -> izin;
        $perijinan->tanggal_awal = $request -> tanggal_awal;
        $perijinan->tanggal_akhir = $request -> tanggal_akhir;
        $perijinan->jam = $request -> jam;
        $perijinan->tujuan = $request -> tujuan;
        $perijinan->status = "Menunggu";
        $perijinan->note = $request -> note;
        $perijinan->save();  

        // dd($request);
        return redirect('/ijin');
    }

    public function updateijin(Request $request, $id){
        // dd($pengajuan);
        $perijinan = Perijinan::find($id);
        $perijinan->status= $request->status;
        // dd($pengajuan);
        $perijinan->save();
        return redirect('/perijinan/laporan');
    }  

    public function laporan(){
		$perijinan = Perijinan::get();
        $user = User::get();
		return view('/perijinan/laporan-perijinan',compact('user', 'perijinan'));
	}

    public function cetak_perijinan(){
        $this->timeZone('Asia/Jakarta');
		$perijinan = Perijinan::get();
        $user = User::get();
        $user_id = Auth::user()->id;
        $date = date("Y-m-d"); 

		return view('perijinan/cetak-ijin',compact('user', 'user_id', 'perijinan', 'date'));
	}

    public function cetak_perijinan_pertanggal($tglawal, $tglakhir){
		// dd(["Tanggal Awal: ".$tglawal, "Tanggal Akhir: ".$tglakhir]);
		$cetakpertanggal = Perijinan::get()->whereBetween('tanggal',[$tglawal, $tglakhir]);
        // dd($cetakpertanggal);
		return view('perijinan/cetak-ijin-form', compact('cetakpertanggal'));
	}

    public function tanggal_ijin($tanggal)
    {
        $data = Perijinan::where([
            'user_id' => Auth::user()->id,
            'status' => 'DiIjinkan'
         ])->get();
        $data_ijin = 0;

        if($data){
            foreach($data as $data){
                $startDate = new Carbon($data->tanggal_awal);
                $endDate = new Carbon($data->tanggal_akhir);
                $all_dates = array();

                while ($startDate->lte($endDate)){
                  $all_dates[] = $startDate->toDateString();

                  $startDate->addDay();
                }

                foreach($all_dates as $all_dates){
                    if($all_dates == $tanggal){
                        $data_ijin = 1;
                    }
                }
            }
        }

        $ijin_pribadi = Perijinan::where([
            'user_id' => Auth::user()->id,
            'izin' => 'pribadi'
         ])->count();

        $ijin = 10 - $ijin_pribadi;
        echo json_encode([
            'data_ijin' => $data_ijin,
            'ijin_pribadi' => $ijin
        ]);
        exit;
    }
}
