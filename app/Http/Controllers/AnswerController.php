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
    public function submitSurvey(Request $request, $surveyTitle)
    {
        $survey = Survey::where('title', $surveyTitle)->first();
        // if (!$survey) {
        //     abort(404, "Survei tidak ditemukan");
        // }
        $questions = Question::where('survey_id', $survey->id)->get();

        
        foreach ($request->input('answers') as $questionId => $answer) {
            $question = $questions->where('id', $questionId)->first();
            
            // $rules = $this->getValidationRules($question);
            // $messages = $this->getValidationMessages($question);

            // $request->validate([
            //     "answers.$questionId" => $rules,
            // ], $messages);
           
            if ($question->question_category_id === 2) {
                Answer::create([
                    'user_id' => auth()->user()->id,
                    'question_id' => $questionId,
                    'answer' => $answer,
                ]);
            } 
            elseif ($question->question_category_id === 3) {
                Answer::create([
                    'user_id' => auth()->user()->id,
                    'question_id' => $questionId,
                    'answer' => $answer,
                ]);}
            elseif ($question->question_category_id === 4 || 5) {
                Answer::create([
                    'user_id' => auth()->user()->id,
                    'choice_id' => $answer,
                    'answer' => Choice::findOrFail($answer)->pilihan_pertanyaan,
                ]);}
                if ($question->question_category_id === 6) {
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

    // protected function getValidationRules(Question $question)
    // {
    //     $rules = [];

    //     // Validasi required
    //     if (in_array(['type' => 'required'], $question->validation_rules ?? [] )) {
    //         $rules[] = 'required';
    //     }

    //     // Validasi maxLength
    //     $maxLengthRule = $question->validation_rules
    //         ->where('type', 'maxLength')
    //         ->first();

    //     if ($maxLengthRule) {
    //         $rules[] = ['max:' . $maxLengthRule['value']];
    //     }

    //     return $rules;
    // }

    // protected function getValidationMessages(Question $question)
    // {
    //     $messages = [];

    //     // Pesan untuk validasi required
    //     if (in_array(['type' => 'required'], $question->validation_rules)) {
    //         $messages["answers.{$question->id}.required"] = "Pertanyaan ini harus diisi.";
    //     }

    //     // Pesan untuk validasi maxLength
    //     $maxLengthRule = $question->validation_rules
    //         ->where('type', 'maxLength')
    //         ->first();

    //     if ($maxLengthRule) {
    //         $messages["answers.{$question->id}.max"] = "Jawaban harus memiliki maksimal {$maxLengthRule['value']} karakter.";
    //     }

    //     return $messages;
    //}
}
