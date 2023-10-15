<?php
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\AnswerController;
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
//Route::get('form/{Event:slug}', \App\Livewire\EventResponsePost::class);
Route::get('form/{event:slug}', [\App\Http\Controllers\EventResponseController::class, 'index'])
        ->name('event.form');
Route::get('form/{eventResponse:uuid}/result', [\App\Http\Controllers\EventResponseController::class, 'success'])
    ->name('event.success');
//Route::get('/', function () {
//    return view('homepage');
//})->name('home');

Route::get('/tentangkami', function () {
    return view('tentangkami');
});

Route::get('/detailsurvey', [AnswerController::class, 'detailsurvey']);
Route::get('/listpegawai', [SurveyController::class, 'listpegawai']);
Route::get('/dashboard', [AnswerController::class, 'dashboard']);
Route::get('/listguest', [SurveyController::class, 'listGuest']);
