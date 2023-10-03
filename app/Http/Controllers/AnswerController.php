<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function submitSurvey(Request $request)
    {

        foreach ($request->input('answers') as $questionId => $answer) {
            $question = Question::findOrFail($questionId);
    
            if ($question->question_category_id === 2) {
                Answer::create([
                    'user_id' => auth()->user()->id,
                    'question_id' => $questionId,
                    'answer' => $answer,
                ]);
            } elseif ($question->question_category_id === 4) {
                Answer::create([
                    'user_id' => auth()->user()->id,
                    'choice_id' => $answer,
                    'answer' => Choice::findOrFail($answer)->pilihan_pertanyaan,
                ]);
            }
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
}
