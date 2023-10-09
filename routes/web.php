<?php
use App\Models\Survey;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\AnswerController;
use App\Models\Answer;
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

Route::get('/', function () {
    return view('homepage');
});

Route::get('/tentangkami', function () {
    return view('tentangkami');
});

Route::get('/isiSurvey', [AnswerController::class, 'isiSurvey']);
Route::get('/listpegawai', [SurveyController::class, 'listpegawai']);
Route::get('/dashboard', [AnswerController::class, 'dashboard']);
Route::get('/', [SurveyController::class, 'index']);

Route::get('/listguest', [SurveyController::class, 'listGuest']);
Route::get('/', [SurveyController::class, 'index']);

