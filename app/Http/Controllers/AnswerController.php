<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function isiSurvey(){
        return view('isiSurvey');
    }

    public function dashboard(){
        $now = date('Y-m-d');
        return view('dashboard', [
            'datas' => Survey::Where('tanggal_selesai', '>=', $now)->get()
        ]);
    }
}
