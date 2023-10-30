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

Route::get('/', [SurveyController::class, 'index'])->name('home');
Route::get('/riwayats', [SurveyController::class, 'riwayat']);


Route::get('/formSurvey/{title}', [QuestionController::class, 'formSurvey']);
Route::post('/formSurvey/{title}/submit', [AnswerController::class, 'submitSurvey']);


Route::get('form/{event:slug}', [\App\Http\Controllers\EventResponseController::class, 'index'])
        ->name('event.form');
Route::get('form/{eventResponse:uuid}/result', [\App\Http\Controllers\EventResponseController::class, 'success'])
    ->name('event.success');
Route::get('/tentangkami', function () {
    return view('tentangkami');
});

Route::get('/detailsurvey', [AnswerController::class, 'detailsurvey']);
// /detailsurvey/{id}
Route::get('/listpegawai', [SurveyController::class, 'listpegawai']);
Route::get('/listguest', [SurveyController::class, 'listGuest']);
Route::get('/dashboard', [AnswerController::class, 'dashboard']);
