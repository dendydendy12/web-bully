<?php

use App\Http\Controllers\FrontController;
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

Route::get('/',[FrontController::class, 'index'])->name('front.index');


Route::get('/details/{article:slug}' , [FrontController::class, 'details'])->name('front.details');

Route::get('/details/{video:slug}' , [FrontController::class, 'details'])->name('front.video');

Route::get('/category/{slug}' , [FrontController::class, 'category'])->name('front.category');

Route::get('/author/{author:slug}' , [FrontController::class, 'author'])->name('front.author');

Route::get('/about' , [FrontController::class, 'about'])->name('front.about');

Route::get('/report', [FrontController::class, 'showReportForm'])->name('front.report');
Route::post('/report', [FrontController::class, 'submitReport'])->name('front.submit_report');