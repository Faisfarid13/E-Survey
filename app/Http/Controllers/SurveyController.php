<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function index(){
        return view('homepage', [
            'surveys' => Survey::all()
        ]);
    }
    public function dashboard(){
        $now = date('Y-m-d');
        return view('dashboard', [
            'datas' => Survey::Where('tanggal_selesai', '>=', $now)->get()
        ]);
    }

    public function riwayat(){
        return view('riwayatSurvey', [
            'surveys' => Survey::Where('status', 'SELESAI')->get()
        ]);
    }

    public function listguest(){
        return view('surveyListGuest', [
            'surveys' => Survey::Where('criteria', 'umum')
            ->where('status', 'AKTIF')
            ->get()
        ]);
    }

    public function listpegawai(){
        return view('surveyList', [
            'surveys' => Survey::Where('criteria', 'pegawai')
            ->where('status', 'AKTIF')
            ->get()
        ]);
    }

    public function isisurvey(){
        return view('isiSurvey', [
            'surveys' => Survey::Where('criteria', 'pegawai')
            ->where('status', 'AKTIF')
            ->get()
        ]);
    }

}
