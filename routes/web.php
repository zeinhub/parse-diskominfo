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

//Admin
Route::middleware(['checkRole:admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('adminhome');
    Route::get('/admin/upload-data', [AdminController::class, 'uploadData'])->name('upload-data');
    Route::get('/admin/edit-data/{uuid}', [AdminController::class, 'editData'])->name('edit-post');
    Route::get('/admin/berita/{uuid}', [AdminController::class, 'berita'])->name('admin-berita');
    Route::get('/admin/berita/{uuid}/download/{id}', [AdminController::class, 'download'])->name('download');
    Route::post('/admin/store-file', [AdminController::class, 'store'])->name('store-file');
    Route::post('/admin/store-edit/{uuid}', [AdminController::class, 'storeEdit'])->name('store-edit');
    Route::delete('/admin/delete-dokumentasi/{id}', [AdminController::class, 'deleteDokumentasi'])->name('delete-dokumentasi');
    Route::get('/admin/tambah-akun', [AccountController::class, 'register'])->name('register');
    Route::post('/admin/action-register', [AccountController::class, 'actionregister'])->name('actionregister');
});

//User
Route::middleware(['checkRole:admin,user'])->group(function () {
    //Account
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['checkRole:admin,user']);
    Route::get('/actionlogout', [AccountController::class, 'actionlogout'])->name('logout')->middleware(['checkRole:admin,user']);

    Route::get('/statistik/berita', [HomeController::class, 'statistikBerita'])->name('statistik-berita');
    Route::get('/statistik/kategori', [HomeController::class, 'statistikKategori'])->name('statistik-kategori');
    Route::get('/hasil/statistik/kategori', [HomeController::class, 'hasilStatistikKategori'])->name('hasil-statistik-kategori');
    Route::get('/filter-pencarian', [HomeController::class, 'filter'])->name('filter');
    Route::get('/hasil-filter-pencarian', [HomeController::class, 'hasilFilter'])->name('hasil-filter');
    Route::get('/cari-filter-pencarian', [HomeController::class, 'cariFilter'])->name('cari-filter');
    Route::get('/cari-berita', [HomeController::class, 'cariArtikel'])->name('cari');
    Route::get('/berita/{uuid}', [HomeController::class, 'berita'])->name('berita');
    Route::get('/author/{username}', [HomeController::class, 'postbyauthor'])->name('postbyauthor');
    Route::get('/category/{kategori}', [HomeController::class, 'postbycategory'])->name('postbycategory');
    Route::get('/category', [HomeController::class, 'allcategory'])->name('allcategory');
    Route::get('/allpost', [HomeController::class, 'allpost'])->name('allpost');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/berita/{uuid}/download/{id}', [AdminController::class, 'download'])->name('user-download');
});
