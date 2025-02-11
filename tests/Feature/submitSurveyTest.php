<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\AnswerController;
use App\Models\Answer;
use App\Models\Choice;
use App\Models\Question;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class submitSurveyTest extends TestCase
{
    /**
     * Test the submitSurvey method with valid answers.
     *
     * @return void
     */
    public function testSubmitSurveyWithValidAnswers()
    {
        $survey = Survey::factory()->create();
        $question1 = Question::factory()->create([
            'survey_id' => $survey->id,
            'question_category_id' => 1, // Jawaban singkat
            'validation' => 'required|max:100',
        ]);
        $question2 = Question::factory()->create([
            'survey_id' => $survey->id,
            'question_category_id' => 5, // Pilihan ganda
        ]);
        $choice = Choice::factory()->create([
            'question_id' => $question2->id,
        ]);

        $user = User::factory()->create();
        $this->actingAs($user);

        $request = [
            'question_' . $question1->id => 'Jawaban singkat',
            'question_' . $question2->id => $choice->id,
        ];

        $response = $this->post(route('submitSurvey', ['surveyId' => $survey->id]), $request);

        $response->assertRedirect('/terimakasih');

        $this->assertDatabaseHas('answers', [
            'survey_id' => $survey->id,
            'user_id' => $user->id,
            'question_id' => $question1->id,
            'answer' => 'Jawaban singkat',
        ]);

        $this->assertDatabaseHas('answers', [
            'survey_id' => $survey->id,
            'user_id' => $user->id,
            'question_id' => $question2->id,
            'choice_id' => $choice->id,
            'answer' => $choice->pilihan_pertanyaan,
        ]);
    }

    /**
     * Test the submitSurvey method with invalid answers.
     *
     * @return void
     */
    public function testSubmitSurveyWithInvalidAnswers()
    {
        $survey = Survey::factory()->create();
        $question = Question::factory()->create([
            'survey_id' => $survey->id,
            'question_category_id' => 1, // Jawaban singkat
            'validation' => 'required|max:5',
        ]);

        $request = [
            'question_' . $question->id => 'Jawaban terlalu panjang',
        ];

        $response = $this->post(route('submitSurvey', ['surveyId' => $survey->id]), $request);

        $response->assertSessionHasErrors(['question_' . $question->id]);
    }

    /**
     * Test the submitSurvey method with file upload.
     *
     * @return void
     */
    public function testSubmitSurveyWithFileUpload()
    {
        $survey = Survey::factory()->create();
        $question = Question::factory()->create([
            'survey_id' => $survey->id,
            'question_category_id' => 10, // File
        ]);

        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->create('test.pdf', 1024);
        $request = [
            'question_' . $question->id => $file,
        ];

        Storage::fake('file-uploads');

        $response = $this->post(route('submitSurvey', ['surveyId' => $survey->id]), $request);

        $response->assertRedirect('/terimakasih');

        $this->assertDatabaseHas('answers', [
            'survey_id' => $survey->id,
            'user_id' => $user->id,
            'question_id' => $question->id,
            'answer' => Storage::disk('file-uploads')->files()[0],
        ]);
    }
}