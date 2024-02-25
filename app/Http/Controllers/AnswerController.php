<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Wilayah;
use Illuminate\Http\Request;


class AnswerController extends Controller
{
    // fungsi untuk submit survey
    public function submitSurvey(Request $request, $surveyId)
    {

        $survey = Survey::where('id', $surveyId)->first();
        // $questions = Question::where('survey_id', $survey->id)->get();
        $validationErrors = [];
        $validAnswers = [];

        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'question_') === 0) {
                $questionId = substr($key, 9); // Ambil ID pertanyaan dari $key
                $question = Question::findOrFail($questionId);

                $validationRules = explode(",", $question->validation);
                $messages = [
                    'required' => 'jawaban ini wajib diisi.',
                    'min' => 'jawaban ini harus memiliki paling sedikit :min karakter.',
                    'max' => 'jawaban terlalu panjang, maksimal :max karakter.',
                    'numeric' => 'jawaban harus berupa angka.',
                ];

                $validator = \Illuminate\Support\Facades\Validator::make(
                    ['answer' => $value],
                    ['answer' => $validationRules,],
                    $messages
                );

                if ($validator->fails()) {
                    // If validation fails for a question, store the error messages
                    $validationErrors[$key] = $validator->errors()->all();
                } else {
                    // If validation passes, store the answer for submission
                    $validAnswers[$key] = $value;
                }
            }
        }
        //cek apakah ada error dari masing-masing pertanyaan
        if (!empty($validationErrors)) {
            // If there are validation errors, redirect back to the form with error messages
            return redirect()->back()->withInput()->withErrors($validationErrors);
        } else {
            foreach ($validAnswers as $key => $value) {
                $questionId = substr($key, 9);
                $question = Question::findOrFail($questionId);

                //melakukan submit jawaban sesuai kategori
                if ($question->question_category_id === 10) {
                    // Ambil file yang diunggah 
                    if ($request->hasFile('question_' . $questionId)) {
                        $uploadedFile = $request->file($key);

                        $filePath = $uploadedFile->store('file-uploads');
                        Answer::create([
                            'survey_id' => $survey->id,
                            'user_id' => auth()->user() ? auth()->user()->id : null,
                            'question_id' => $questionId,
                            'choice_id' => null,
                            'answer' => $filePath,
                        ]);
                    } else {
                        return "file ga ke detect";
                    }
                }
                //submit untuk kategori skala, pilihan ganda & dropdown
                elseif ($question->question_category_id === 4 ||  $question->question_category_id === 5 ||  $question->question_category_id === 6) {
                    Answer::create([
                        'survey_id' => $survey->id,
                        'user_id' => auth()->user() ? auth()->user()->id : null,
                        'question_id' => $questionId,
                        'choice_id' => $value,
                        'answer' => Choice::findOrFail($value)->pilihan_pertanyaan,
                    ]);
                }
                //submit untuk kategori provinsi
                elseif ($question->question_category_id === 11) {
                    Answer::create([
                        'survey_id' => $survey->id,
                        'user_id' => auth()->user() ? auth()->user()->id : null,
                        'question_id' => $questionId,
                        'answer' => $value,
                    ]);
                }
                //submit untuk kategori checkbox
                elseif ($question->question_category_id === 7) {

                    $selectedChoices = [];
                    foreach ($value as $answer) {
                        $choice = Choice::findOrFail($answer);
                        $selectedChoices[] = $choice->pilihan_pertanyaan;
                    }
                    Answer::create([
                        'survey_id' => $survey->id,
                        'user_id' => auth()->user() ? auth()->user()->id : null,
                        'question_id' => $questionId,
                        'choice_id' => null,
                        'answer' => json_encode($selectedChoices),
                    ]);
                }
                //submit untuk kategori jawaban singkat, jawaban panjang, email, tanggal, & waktu
                else {
                    Answer::create([
                        'survey_id' => $survey->id,
                        'user_id' => auth()->user() ? auth()->user()->id : null,
                        'question_id' => $questionId,
                        'choice_id' => null,
                        'answer' => $value,
                    ]);
                }
            }
        }
        //Redirect index
        return redirect('/terimakasih');
    }
}
