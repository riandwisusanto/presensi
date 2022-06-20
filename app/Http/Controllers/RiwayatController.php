<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perijinan;
use App\Presensi;
use Auth;
use App\User;
use App\Staf;
use Illuminate\Support\Facades\Hash;
use App\Carbon\Carbon;

class RiwayatController extends Controller
{
    public function laporan(){
		$presensi = Presensi::get();
        $perijinan = Perijinan::get();
        $users = User::get();
        $staf  = Staf::get();
		return view('/riwayat/laporan',compact('users', 'presensi', 'perijinan', 'staf'));
	}
    public function timeZone($location){
        return date_default_timezone_set($location);
    }

    public function cetak_riwayat(){
        $this->timeZone('Asia/Jakarta');
		$perijinan = Perijinan::get();
        $user = User::get();
        $staf  = Staf::get();
        $presensi = Presensi::get();
        $date = date("Y-m-d"); 

		return view('riwayat/cetak-riwayat',compact('perijinan', 'user', 'presensi', 'date', 'staf'));
	}

    public function cetak_riwayat_pertanggal($tglawal, $tglakhir){
		// dd(["Tanggal Awal: ".$tglawal, "Tanggal Akhir: ".$tglakhir]);
		$cetakpertanggal = User::get()->whereBetween('created_at',[$tglawal, $tglakhir]);
        $staf  = Staf::get();
		return view('riwayat/cetak-riwayat-form', compact('cetakpertanggal', 'staf'));
	}

}
