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
}
