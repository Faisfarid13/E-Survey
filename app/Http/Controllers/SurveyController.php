<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function index(){
        return view('guest.homepage', [
            'surveys' => Survey::all()
        ]);
    }

   public function dashboard() {
        $now = date('Y-m-d');
        $surveys = Survey::where('tanggal_selesai', '>=', $now)
            ->orderBy('criteria')
            ->get();
    
        return view('pegawai.dashboard', compact('surveys'));
    }

    public function riwayat(){
        return view('pegawai.riwayatSurvey', [
            'surveys' => Survey::Where('status', 'SELESAI')
            ->where('criteria', 'pegawai', 'unit')
            ->get()
        ]);
    }

    public function listguest(){
        return view('guest.surveyListGuest', [
            'surveys' => Survey::Where('criteria', 'umum')
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

    public function hasilAnalis($scriptId){
        return view('hasilAnalis', [
            'surveys' => Survey::where('id', $scriptId)->get()
        ]);
    }

    public function listpegawai(Request $request)
    {
        $perPage = $request->input('entries', 5);
        $search = $request->input('search');
        
        $query = Survey::where('criteria', 'pegawai')
        ->where('status', 'AKTIF');

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        $surveys = $query->paginate($perPage);

        return view('pegawai.surveyList', [
            'surveys' => $surveys
        ]);
    }

}
