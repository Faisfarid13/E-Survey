<?php
use App\Models\Survey;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SurveyController::class, 'index']);
Route::get('/riwayats', [SurveyController::class, 'riwayat']);

Route::get('/listpegawai', [SurveyController::class, 'listpegawai']);
Route::get('/formSurvey/{title}', [QuestionController::class, 'formSurvey']);
Route::post('/formSurvey/{title}/submit', [AnswerController::class, 'submitSurvey']);

Route::get('/listguest', [SurveyController::class, 'listGuest']);
Route::get('/dashboard', [AnswerController::class, 'dashboard']);
Route::get('/tentangkami', function () {
    return view('tentangkamif');
});

Route::get('/detailsurvey', [AnswerController::class, 'detailsurvey']);
// /detailsurvey/{id}

