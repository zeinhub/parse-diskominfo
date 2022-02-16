<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/arsip', [HomeController::class, 'arsip'])->name('arsip');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/statistik', [HomeController::class, 'statistic'])->name('statistic');
Route::get('/filter-pencarian', [HomeController::class, 'filter'])->name('filter');
Route::get('/admin', [HomeController::class, 'index'])->name('admin');
Route::get('/admin/upload-data', [AdminController::class, 'uploadData'])->name('upload-data');
Route::get('/admin/edit-data', [AdminController::class, 'editPost'])->name('edit-post');
Route::get('/admin/upload-dokumentasi', [AdminController::class, 'uploadDokumentasi'])->name('upload-file');
