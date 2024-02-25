<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
        $now = date('Y-m-d');
        return view('pegawai.dashboard', [
            'datas' => User::Where('id', '>=', $now)->get()
        ]);
    }

    public function profile(){
        return view('pegawai.profilePegawai', [
            'users' => User::all()
        ]);
    }

    public function logOut(Request $request){
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }

    public function backAction(Request $request){
        return redirect()->back();
    }
}
