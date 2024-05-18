<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\MatriksController;
use App\Http\Controllers\LandingpageController;

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
Route::get('/', [App\Http\Controllers\LandingpageController::class, 'index'])->name('home');


//admin
//=====================================================================================================================================================

Route::post('/sign-in', [LoginController::class ,'loginAjax'])->name('loginAjax');

Route::group(['prefix' => 'admin'], function(){

    Route::post('/logout', [LoginController::class ,'logout'])->name('destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('check.role:pakar');

    //User
    Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');
    Route::get('/user/add', [UserController::class, 'create'])->name('user-create')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user-edit')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');
    Route::POST('/user/add-save', [UserController::class, 'store'])->name('user-store')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');

    //Criteria
    Route::get('/criteria', [CriteriaController::class, 'index'])->name('criteria')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');
    Route::get('/criteria/add', [CriteriaController::class, 'create'])->name('criteria-create')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');
    Route::post('/criteria/add-save', [CriteriaController::class, 'store'])->name('criteria-store')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');

    //Alternatif
    Route::get('/alternative', [AlternativeController::class, 'index'])->name('alternative')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');
    Route::get('/alternative/add', [AlternativeController::class, 'create'])->name('alternative-create')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');
    Route::post('/alternarive/addgete', [AlternativeController::class, 'store'])->name('alternative-store')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');

    //perbandingan berpasangan kriteria
    Route::get('/perbandingan/criteria', [CriteriaController::class, 'pairwiseComparison'])->name('pairwiseComparisonCriteria')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');
    Route::get('/perbandingan/criteria/edit', [CriteriaController::class, 'editPairwiseComparison'])->name('pairwiseComparisonCriteriaEdit')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');
    Route::post('/perbandingan/criteria/edit-save', [CriteriaController::class, 'editSavePairwiseComparison'])->name('pairwiseComparisonCriteriaEditSave')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');


    //perbandingan berpasangan alternative
    Route::get('/perbandingan/alternative', [AlternativeController::class, 'pairwiseComparison'])->name('pairwiseComparisonAlternative')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');
    Route::get('/perbandingan/alternative/edit', [AlternativeController::class, 'editPairwiseComparison'])->name('pairwiseComparisonAlternativeEdit')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');
    Route::post('/perbandingan/alternative/edit-save', [AlternativeController::class, 'editSavePairwiseComparison'])->name('pairwiseComparisonAlternativeEditSave')->middleware('auth')->middleware('multirole:superadmin,SEO,pakar');
});
