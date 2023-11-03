<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function dashboard(){
        $now = date('Y-m-d');
        return view('pegawai.dashboard', [
            'datas' => User::Where('id', '>=', $now)->get()
        ]);
    }
}
