<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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



Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'postregister']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/karya-ilmiah/makalah', [UserController::class, 'makalah'])->name('makalah');
    Route::post('/pdfExport', [UserController::class, 'pdfExport'])->name('pdfExport');

    Route::get('/surat/lamaran-pekerjaan', [UserController::class, 'lamaranPekerjaan'])->name('lamaranPekerjaan');
    Route::post('/preview-lamaran-pekerjaan', [UserController::class, 'lamaranPekerjaanPost'])->name('lamaranPekerjaanPost');

    Route::get('/download-file/{file}', [UserController::class, 'downloadFile'])->name('downloadFile');
    Route::get('/delete-file/{file}', [UserController::class, 'deleteFile'])->name('deleteFile');

    Route::post('/logout', [LoginController::class, 'logout']);

    Route::middleware('admin')->group(function () {
        Route::get('/management-user', [adminController::class, 'managementUser'])->name('managementUser');
        Route::post('/tambah-user', [adminController::class, 'tambahUser'])->name('tambahUser');
        Route::get('edit-user/{id}', [adminController::class, 'editUser'])->name('editUser');
        Route::post('/edit-user', [adminController::class, 'editUserPost'])->name('editUserPost');
        Route::get('/delete-user/{id}', [adminController::class, 'deleteUser'])->name('deleteUser');
    });
});
