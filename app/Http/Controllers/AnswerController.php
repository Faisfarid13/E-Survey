<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Survey;
use App\Models\Question;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AnswerController extends Controller
{
    public function detailsurvey(){
        return view('detailsurvey');
    }
    
    public function submitSurvey(Request $request, $surveyTitle)
    {
        $survey = Survey::where('title', $surveyTitle)->first();
        $questions = Question::where('survey_id', $survey->id)->get();
        
        foreach ($request->input('answers') as $questionId => $answer) {
            $question = $questions->where('id', $questionId)->first();
            
            
            if ($question->question_category_id === 1 || $question->question_category_id === 2 || $question->question_category_id === 3) {
                Answer::create([
                    'user_id' => auth()->user()->id,
                    'question_id' => $questionId,
                    'answer' => $answer,
                ]);
            } 
            elseif ($question->question_category_id === 4 ||  $question->question_category_id === 5) {
                Answer::create([
                    'user_id' => auth()->user()->id,
                    'choice_id' => $answer,
                    'answer' => Choice::findOrFail($answer)->pilihan_pertanyaan,
                ]);}

            else {
                Answer::create([
                    'user_id' => auth()->user()->id,
                    'question_id' => $questionId,
                    'answer' => $answer,
                ]);
            }
        }
        // Redirect atau response lainnya
        return redirect('/');
    }

   
    public function dashboard(){
        $now = date('Y-m-d');
        return view('dashboard', [
            'datas' => Survey::Where('tanggal_selesai', '>=', $now)->get()
        ]);
    }
}
