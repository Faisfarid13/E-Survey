<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Survey;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


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
            $question = $questions->where('id', $questionId)->firstOrFail();
            
             $validationRules = explode(",", $question->validation);
            //$validationRules = ['required', 'min:2', 'max:8', 'numeric'];
            //dd($validationRules);
            $validator = \Illuminate\Support\Facades\Validator::make(
                ['answer' => $answer],
                ['answer' => $validationRules]
            );
        

            if ($validator->fails()) {
                 
                // Jika validasi gagal, lempar ValidationException
                return redirect()->back()->withInput()->withErrors($validator);
            }
            else {
                if ($question->question_category_id === 4 ||  $question->question_category_id === 5 ||  $question->question_category_id === 6 ||  $question->question_category_id === 7) {
                    Answer::create([
                        'user_id' => auth()->user() ? auth()->user()->id : null,
                        'question_id' => $questionId,
                        'choice_id' => $answer,
                        'answer' => Choice::findOrFail($answer)->pilihan_pertanyaan,
                    ]);}
    
                else {
                    Answer::create([
                        'user_id' => auth()->user() ? auth()->user()->id : null,
                        'question_id' => $questionId,
                        'answer' => $answer,
                    ]);
                } 
            }
             
            
        }
        // Redirect atau response lainnya
        return redirect('/');
    }
}
