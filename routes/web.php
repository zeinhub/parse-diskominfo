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
// Route::get('/register', [AccountController::class, 'register'])->name('register');
// Route::post('/action-register', [AccountController::class, 'actionregister'])->name('actionregister');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['checkRole:admin,user']);
Route::get('/actionlogout', [AccountController::class, 'actionlogout'])->name('logout')->middleware(['checkRole:admin,user']);

//Admin
Route::get('/admin/home', [AdminController::class, 'index'])->name('adminhome')->middleware('checkRole:admin');
Route::get('/admin/upload-data', [AdminController::class, 'uploadData'])->name('upload-data')->middleware('checkRole:admin');
Route::get('/admin/edit-data/{uuid}', [AdminController::class, 'editData'])->name('edit-post')->middleware('checkRole:admin');
Route::get('/admin/berita/{uuid}', [AdminController::class, 'berita'])->name('admin-berita')->middleware('checkRole:admin');
Route::get('/admin/berita/{uuid}/download/{id}', [AdminController::class, 'download'])->name('download')->middleware('checkRole:admin');
Route::post('/admin/store-file', [AdminController::class, 'store'])->name('store-file')->middleware('checkRole:admin');
Route::post('/admin/store-edit/{uuid}', [AdminController::class, 'storeEdit'])->name('store-edit')->middleware('checkRole:admin');
Route::delete('/admin/delete-dokumentasi/{id}', [AdminController::class, 'deleteDokumentasi'])->name('delete-dokumentasi')->middleware('checkRole:admin');
Route::get('/admin/tambah-akun', [AccountController::class, 'register'])->name('register')->middleware('checkRole:admin');
Route::post('/admin/action-register', [AccountController::class, 'actionregister'])->name('actionregister')->middleware('checkRole:admin');


//User
Route::get('/statistik/berita', [HomeController::class, 'statistikBerita'])->name('statistik-berita')->middleware(['checkRole:admin,user']);
Route::get('/statistik/kategori', [HomeController::class, 'statistikKategori'])->name('statistik-kategori')->middleware(['checkRole:admin,user']);
Route::get('/filter-pencarian', [HomeController::class, 'filter'])->name('filter')->middleware(['checkRole:admin,user']);
Route::get('/hasil-filter-pencarian', [HomeController::class, 'hasilFilter'])->name('hasil-filter')->middleware(['checkRole:admin,user']);
Route::get('/cari-filter-pencarian', [HomeController::class, 'cariFilter'])->name('cari-filter')->middleware(['checkRole:admin,user']);
Route::get('/cari-berita', [HomeController::class, 'cariArtikel'])->name('cari')->middleware(['checkRole:admin,user']);
Route::get('/berita/{uuid}', [HomeController::class, 'berita'])->name('berita')->middleware(['checkRole:admin,user']);
Route::get('/author/{username}', [HomeController::class, 'postbyauthor'])->name('postbyauthor')->middleware(['checkRole:admin,user']);
Route::get('/category/{kategori}', [HomeController::class, 'postbycategory'])->name('postbycategory')->middleware(['checkRole:admin,user']);
Route::get('/category', [HomeController::class, 'allcategory'])->name('allcategory')->middleware(['checkRole:admin,user']);
Route::get('/allpost', [HomeController::class, 'allpost'])->name('allpost')->middleware(['checkRole:admin,user']);
Route::get('/about', [HomeController::class, 'about'])->name('about')->middleware(['checkRole:admin,user']);
