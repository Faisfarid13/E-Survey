<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Survey;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index(){
        $now = date('Y-m-d');
        $events = Event::latest()->where('date_start', '<=', $now )
        ->get();

        $surveys = Survey::where('criteria', 'umum')
            ->filter(request(['search']))
            ->where('status', 'AKTIF')
            ->get();

        return view('guest.homepage', compact('events','surveys'));
    }

    public function dashboard() {
        $now = date('Y-m-d');
        $surveys = Survey::where('tanggal_selesai', '>=', $now)
            ->orderBy('criteria')
            ->get();

        $events = Event::latest()->where('date_start', '<=', $now )
        ->get();

        return view('pegawai.dashboard', compact('surveys', 'events'));
    }

    public function riwayat(Request $request){
        $perPage = $request->input('entries', 5);
        $search = $request->input('search');
        
        $query = Survey::where('status', 'SELESAI') 
        ->where('criteria', 'pegawai', 'unit'); 
        

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        $surveys = $query->paginate($perPage);

        return view('pegawai.riwayatSurvey', [
            'surveys' => $surveys
        ]);
    }

    public function isisurvey(){
        return view('isiSurvey', [
            'surveys' => Survey::Where('criteria', 'pegawai')
            ->where('status', 'AKTIF')
            ->get()
        ]);
    }
    
    public function listAnalis(){
        $query = Survey::where('status', 'SELESAI')
            ->where(function($query){
                $query->whereNotNull('code')->orWhere('code','!=','');
            })
            ->paginate(5);

        return view('guest.analisis',[
            'surveys' => $query
        ]);
    }

    public function hasilAnalis($scriptId){
        return view('.guest.hasilAnalis', [
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

    public function listGuest(Request $request){
        $perPage = $request->input('entries', 5);
        $search = $request->input('search');
        
        $query = Survey::where('criteria', 'umum')
        ->where('status', 'AKTIF');

        if($search){
            $query->where('title', 'like', '%' . $search . '%');
        }

        $surveys = $query->paginate($perPage);

        return view('guest.surveyListGuest', [
            'surveys' => $surveys
        ]);
    }

    public function detailsurvey($id){
        return view('detailsurvey', [
            'surveys' => Survey::where('id', $id)->get()
        ]);
    }

}
