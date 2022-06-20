<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Perijinan;
use App\Staf;
use Auth;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
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
    public function index(){
        $user = User::where('id', Auth::user()->id)->first();
        $perijinan = Perijinan::get();
        return view('akun.index', compact('user','perijinan'));
    }

    public function updateprofile(Request $request){

        // $this->validate($request,[
        //     'password' => 'min:8', 'confirmed',
            
        // ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->no_telp = $request->no_telp;
        $user->email = $request->email;
        $foto = $request->file('file');
        if($foto != ""){
			$extension = $foto->getClientOriginalExtension();
			$filename = time() . '_user.' . $extension;
			$foto->move('gambar_user/' , $filename);
			$user->file = $filename;
		}
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $staf = Staf::where('user_id', Auth::user()->id)->first();
        $staf->alamat = $request->alamat;
        $staf->no_telp = $request->no_telp;
        $staf->email = $request->email;
        $staf->save();
        // return view('user.profile.index', compact('user'));
        return redirect('profil')->with(['success' => 'Profile berhasil diubah']);
    }

}
