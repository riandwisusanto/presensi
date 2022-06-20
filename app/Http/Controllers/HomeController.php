<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Perijinan;
use App\Presensi;
use App\Staf;

class HomeController extends Controller
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
    public function index()
    {
        $role = auth()->user()->role;
        $staf = Staf::count();
        $perijinan = Perijinan::count();
        $month = date('m');
        $presensi = Presensi::whereMonth('created_at', '=', $month)->count();

        if($role == 'staf'){
            $perijinan = Perijinan::where("id", "=", auth()->user()->id)->count();
            $presensi  = Presensi::where("id", "=", auth()->user()->id)->count();
        }
        return view('home', compact('role','perijinan','presensi','staf'));
    }
}
