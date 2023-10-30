<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Survey;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function formSurvey($surveyTitle){

        $surveys = Survey::where('title', $surveyTitle)->firstOrFail();
        $sections = $surveys->section;
        return view('formSurvey',compact('surveys','sections'));
    }

    // public function testFormSurvey($surveyId){

    //     $surveys = Survey::where('id', $surveyId)->firstOrFail();
    //     $questions = $surveys->questions;
    //     return view('testFormSurvey',compact('surveys',  'questions'));
    // }
}
