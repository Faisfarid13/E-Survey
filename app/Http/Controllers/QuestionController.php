<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function formSurvey($surveyTitle){

        $surveys = Survey::where('title', $surveyTitle)->firstOrFail();
        $questions = $surveys->questions;
        return view('formSurvey',compact('surveys',  'questions'));
    }
}
