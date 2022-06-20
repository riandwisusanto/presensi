<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Staf;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class StafController extends Controller
{
    public function index(){
		$staf = Staf::get();
		return view('/staf/index',compact('staf'));
	}
	public function proses_upload(Request $request)
    {
        $this->validate($request, [
			'nama' => 'required',
            'nip' => 'required|numeric', 
			'alamat' => 'required',
			'jabatan' => 'required',
		]);

        // $hashed = Hash::make('password', [
        //     'rounds' => 12
        // ]);
        $user = new \App\User;
        $user->nip = $request->nip;
        $user->name = $request->nama;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->role = 'staf';
        $user->email = $request->email;
        $user->file = 'avatar-8.jpg';
        $user->alamat = $request->alamat;
        $user->jabatan = $request->jabatan;
        $user->password = Hash::make('password');
        $user->save();

        $staf = new \App\Staf;
        $staf->user_id  = $user->id;
        $staf->nip      = $request->nip;
        $staf->nama     = $request->nama;
        $staf->email    = $request->email;
        $staf->tanggal_lahir = $request->tanggal_lahir;
        $staf->alamat   = $request->alamat;
        $staf->jabatan  = $request->jabatan;
        $staf->save();

        // dd($request->all());
        return redirect()->back();
    }
    public function edit(Staf $staf)
    {
        $staf = Staf::find($staf->id);
        return view('staf/index', ['staf' => $staf]);
    }
	public function destroy($id)
    {
        // $perbaikan = Perbaikan::where('id_perbaikan', $id_perbaikan)->first();
        $staf = Staf::find($id);
 		$staf->delete();
        return redirect()->back();
    }

     
    public function timeZone($location){
        return date_default_timezone_set($location);
    }

    public function cetak_staff(){
        $this->timeZone('Asia/Jakarta');
		$staf = Staf::get();
        $user = User::get();
        $user_id = Auth::user()->id;
        $date = date("Y-m-d"); 

		return view('staf/cetak-staf',compact('user', 'user_id', 'staf', 'date'));
	}

    public function cetak_staff_pertanggal($tglawal, $tglakhir){
		// dd(["Tanggal Awal: ".$tglawal, "Tanggal Akhir: ".$tglakhir]);
		$cetakpertanggal = Staf::get()->whereBetween('created_at',[$tglawal, $tglakhir]);
        // dd($cetakpertanggal);
		return view('staf/cetak-staf-form', compact('cetakpertanggal'));
	}


}
