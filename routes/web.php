<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
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
//Account
Route::get('/', [AccountController::class, 'index'])->name('index');
Route::get('/login', [AccountController::class, 'login'])->name('login');
Route::post('/action-login', [AccountController::class, 'actionlogin'])->name('actionlogin');
Route::get('/register', [AccountController::class, 'register'])->name('register');
Route::post('/action-register', [AccountController::class, 'actionregister'])->name('actionregister');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/actionlogout', [AccountController::class, 'actionlogout'])->name('logout')->middleware('auth');

//Admin
Route::get('/admin/home', [AdminController::class, 'index'])->name('adminhome')->middleware('auth');
Route::get('/admin/upload-data', [AdminController::class, 'uploadData'])->name('upload-data')->middleware('auth');
Route::get('/admin/edit-data/{uuid}', [AdminController::class, 'editData'])->name('edit-post')->middleware('auth');
Route::get('/admin/berita/{uuid}', [AdminController::class, 'berita'])->name('admin-berita')->middleware('auth');
Route::post('/admin/store-file', [AdminController::class, 'store'])->name('store-file')->middleware('auth');
Route::post('/admin/store-edit/{uuid}', [AdminController::class, 'storeEdit'])->name('store-edit')->middleware('auth');
Route::delete('/admin/delete-dokumentasi/{id}', [AdminController::class, 'deleteDokumentasi'])->name('delete-dokumentasi')->middleware('auth');

//User
Route::get('/statistik', [HomeController::class, 'statistic'])->name('statistic')->middleware('auth');
Route::get('/filter-pencarian', [HomeController::class, 'filter'])->name('filter')->middleware('auth');
Route::get('/hasil-filter-pencarian', [HomeController::class, 'hasilFilter'])->name('hasil-filter')->middleware('auth');
Route::post('/cari-filter-pencarian', [HomeController::class, 'cariFilter'])->name('cari-filter')->middleware('auth');
Route::post('/cari-berita', [HomeController::class, 'cariArtikel'])->name('cari')->middleware('auth');
Route::get('/berita/{uuid}', [HomeController::class, 'berita'])->name('berita')->middleware('auth');
Route::get('/author/{username}', [HomeController::class, 'postbyauthor'])->name('postbyauthor')->middleware('auth');
Route::get('/category/{kategori}', [HomeController::class, 'postbycategory'])->name('postbycategory')->middleware('auth');
Route::get('/about', [HomeController::class, 'about'])->name('about')->middleware('auth');
