<?php
use App\Models\Survey;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
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

Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::get('form/{event:slug}', [\App\Http\Controllers\EventResponseController::class, 'index'])
    ->name('event.form');
    Route::get('form/{eventResponse:uuid}/result', [\App\Http\Controllers\EventResponseController::class, 'success'])
    ->name('event.success');
    
    Route::get('/formSurvey/{id}', [QuestionController::class, 'formSurvey']);
    Route::post('/formSurvey/{id}/submit', [AnswerController::class, 'submitSurvey']);
    
    Route::get('/', [SurveyController::class, 'index'])->name('home');
    Route::get('/riwayats', [SurveyController::class, 'riwayat'])->middleware('auth');

    Route::get('/daftarkegiatanumum', [EventController::class, 'kegiatanumum']);

    Route::get('/daftarkegiatanpegawai', [EventController::class, 'kegiatanpegawai']);

    Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
            
    Route::get('/detailsurvey/{id}', [SurveyController::class, 'detailsurvey']);

    Route::get('/listpegawai', [SurveyController::class, 'listpegawai'])->middleware('auth');

    Route::get('/listguest', [SurveyController::class, 'listGuest']);

    Route::get('/analisis', [SurveyController::class, 'listAnalis']);

    Route::get('/dashboard', [SurveyController::class, 'dashboard'])->middleware('auth');

    Route::get('/hasil/{scriptId}', [SurveyController::class, 'hasilAnalis']);
    Route::get('../admin/login')->name('login');

    Route::get('/tentangkami', function () {
            return view('guest.tentangkami');
        });

    Route::get('/terimakasih', function () {
        return view('terimakasih');
    });

    Route::get('/logout', [UserController::class, 'logOut']);

    Route::get('/cities/{provinceCode}', [QuestionController::class, 'getCitiesByProvince']);
    Route::get('/districts/{cityCode}', [QuestionController::class, 'getDistrictsByCity']);
    Route::get('/villages/{districtCode}', [QuestionController::class, 'getVillagesByDistrict']);

});