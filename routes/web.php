<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\MatriksController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\CekRekomendasiController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HistoriCekPenangananController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\ErrorHandlingController;

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

// Route::get('/', function () {
//     echo 'ini halaman depan';
// });

Route::get('matrix/comparison', [MatriksController::class, 'showComparisonForm'])->name('matrix.comparison');
Route::post('matrix/comparison/process', [MatriksController::class, 'processComparisonForm'])->name('matrix.comparison.process');



Auth::routes();



//landing page
//================================================================================================================================================================
Route::get('/', [LandingpageController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/save', [ContactController::class, 'store'])->name('contact-save');
Route::get('/cek-rekomendasi-penanganan', [CekRekomendasiController::class, 'index'])->name('cekrekomendasi');
Route::post('/cek-rekomendasi-penanganan/hasil', [CekRekomendasiController::class, 'checkRecomendation'])->name('hasilcekrekomendasi')->middleware('redirectget');

//admin
//=====================================================================================================================================================

Route::post('/sign-in', [LoginController::class ,'loginAjax'])->name('loginAjax');

Route::group(['prefix' => 'admin'], function(){

    Route::get('/contact', [ContactController::class ,'show'])->name('contact-show')->middleware('auth')->middleware('multirole:superadmin');;
    Route::get('/contact/detail/{id}', [ContactController::class ,'detail'])->name('contact-detail')->middleware('auth')->middleware('multirole:superadmin');;

    Route::post('/logout', [LoginController::class ,'logout'])->name('destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');

    //User
    Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth')->middleware('multirole:superadmin');
    Route::get('/user/add', [UserController::class, 'create'])->name('user-create')->middleware('auth')->middleware('multirole:superadmin');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user-edit')->middleware('auth')->middleware('multirole:superadmin');
    Route::POST('/user/add-save', [UserController::class, 'store'])->name('user-store')->middleware('auth')->middleware('multirole:superadmin');
    Route::post('/user/update', [UserController::class, 'update'])->name('user-update')->middleware('auth')->middleware('multirole:superadmin');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user-delete')->middleware('auth')->middleware('multirole:superadmin');


    //Criteria
    Route::get('/criteria', [CriteriaController::class, 'index'])->name('criteria')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::get('/criteria/add', [CriteriaController::class, 'create'])->name('criteria-create')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::get('/criteria/edit/{id}', [CriteriaController::class, 'edit'])->name('criteria-edit')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::post('/criteria/add-save', [CriteriaController::class, 'store'])->name('criteria-store')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::post('/criteria/update', [CriteriaController::class, 'update'])->name('criteria-update')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::delete('/criteria/delete/{id}', [CriteriaController::class, 'destroy'])->name('criteria-delete')->middleware('auth')->middleware('multirole:superadmin,pakar');

    //Alternatif
    Route::get('/alternative', [AlternativeController::class, 'index'])->name('alternative')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::get('/alternative/add', [AlternativeController::class, 'create'])->name('alternative-create')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::get('/alternative/edit/{id}', [AlternativeController::class, 'edit'])->name('alternative-edit')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::get('/alternative/detail/{id}', [AlternativeController::class, 'show'])->name('alternative-show')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::post('/alternative/update', [AlternativeController::class, 'update'])->name('alternative-update')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::post('/alternarive/add-save', [AlternativeController::class, 'store'])->name('alternative-store')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::delete('/alternative-delete/{id}', [AlternativeController::class, 'destroy'])->name('alternative-delete')->middleware('auth')->middleware('multirole:superadmin,pakar');


    //perbandingan berpasangan kriteria
    Route::get('/perbandingan/criteria', [CriteriaController::class, 'pairwiseComparison'])->name('pairwiseComparisonCriteria')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::get('/perbandingan/criteria/edit', [CriteriaController::class, 'editPairwiseComparison'])->name('pairwiseComparisonCriteriaEdit')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::post('/perbandingan/criteria/edit-save', [CriteriaController::class, 'editSavePairwiseComparison'])->name('pairwiseComparisonCriteriaEditSave')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::get('/perbandingan/criteria/rangking', [CriteriaController::class, 'showNormalizedMatrix'])->name('rangkingCriteria')->middleware('auth')->middleware('multirole:superadmin,pakar');


    //perbandingan berpasangan alternative
    Route::get('/perbandingan/alternative', [AlternativeController::class, 'pairwiseComparison'])->name('pairwiseComparisonAlternative')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::get('/perbandingan/alternative/edit/{id}', [AlternativeController::class, 'editPairwiseComparison'])->name('pairwiseComparisonAlternativeEdit')->middleware('auth')->middleware('multirole:superadmin,pakar');
    // Route::post('/perbandingan/alternative/edit-save', [AlternativeController::class, 'editSavePairwiseComparison'])->name('pairwiseComparisonAlternativeEditSave')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::post('/perbandingan/alternative/edit-save/{id}', [AlternativeController::class, 'editSavePairwiseComparison'])->name('pairwiseComparisonAlternativeEditSave')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::get('/perbandingan/alternative/rangking', [AlternativeController::class, 'showNormalizedMatrix'])->name('rangkingAlternative')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::get('/perbandingan/alternative/rangking/{id_criteria}', [AlternativeController::class, 'compareAlternatives'])->name('rangkingCriteriaAlternative')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::get('/perbandingan/alternative/rangking', [AlternativeController::class, 'compareAlternativesAll'])->name('rangkingCriteriaAlternativeAll')->middleware('auth')->middleware('multirole:superadmin,pakar');

    //laporan
    Route::get('/histori/cek-penanganan', [HistoriCekPenangananController::class, 'index'])->name('historiCekPenanganan')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::get('/histori/cek-penanganan/detail/{id}', [HistoriCekPenangananController::class, 'show'])->name('historiCekPenangananShow')->middleware('auth')->middleware('multirole:superadmin,pakar');

    //desa
    Route::get('/village', [VillageController::class, 'index'])->name('village')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::get('/village/add', [VillageController::class, 'create'])->name('village-create')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::post('/village/store', [VillageController::class, 'store'])->name('village-store')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::get('/village/edit/{id}', [VillageController::class, 'edit'])->name('village-edit')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::post('/village/update', [VillageController::class, 'update'])->name('village-update')->middleware('auth')->middleware('multirole:superadmin,pakar');
    Route::delete('/village/destroy/{id}', [VillageController::class, 'destroy'])->name('village-destroy')->middleware('auth')->middleware('multirole:superadmin,pakar');

});

//error handling
//============================================================================================================================================
// Route::get('/400', [ErrorHandlingController::class, 'error_400']);
Route::get('/401', [ErrorHandlingController::class, 'error_401']);
Route::get('/403', [ErrorHandlingController::class, 'error_403']);
Route::get('/404', [ErrorHandlingController::class, 'error_404']);
Route::get('/500', [ErrorHandlingController::class, 'error_500']);
Route::get('/503', [ErrorHandlingController::class, 'error_503']);
