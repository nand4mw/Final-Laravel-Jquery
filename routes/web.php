<?php

use App\Http\Controllers\AlatTangkapController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DpiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeTangkapController;
use App\Http\Controllers\KapalController;
use App\Http\Controllers\PemilikController;
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

// autentification routes
Route::post('/login', []);
// end autentification routes


////////////////////////////////////////////////////////////////////////////////
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'dashboard'])->name('home');
////////////////////////////////////////////////////////////////////////


Route::get('/kapal', [KapalController::class, 'index'])->name('kapal');
Route::get('/kapal/{id}', [KapalController::class, 'showModal'])->name('kapal.modal');
Route::get('/tambah-kapal', [KapalController::class, 'tambah']);
Route::post('/tambah-kapal', [KapalController::class, 'tambahAction']);
Route::get('/edit-kapal/{id}/edit', [KapalController::class, 'edit']);
Route::post('/edit-kapal/{id}/edit', [KapalController::class, 'editAction']);
Route::delete('/hapus-kapal/{id}/', [KapalController::class, 'hapus'])->name('hapusKapal');
////////////////////////////////////////////////////////////////////////


Route::get('/pemilik', [PemilikController::class, 'index'])->name('pemilik');
Route::get('/tambah-data-pemilik', [PemilikController::class, 'tambah']);
Route::post('/tambah-data-pemilik', [PemilikController::class, 'tambahAction']);
Route::get('/edit-pemilik/{id}/edit', [PemilikController::class, 'edit']);
Route::post('/edit-pemilik/{id}/edit', [PemilikController::class, 'editAction']);
Route::delete('/hapus-pemilik/{id}/', [PemilikController::class, 'destroy'])->name('hapusPemilik');
////////////////////////////////////////////////////////////////////////


Route::get('/dpi', [DpiController::class, 'index'])->name('dpi');
Route::get('/tambah-data-dpi', [DpiController::class, 'tambah']);
Route::post('/tambah-data-dpi', [DpiController::class, 'tambahAction']);
Route::get('/edit-dpi/{id}/', [DpiController::class, 'edit']);
Route::post('/edit-dpi/{id}/', [DpiController::class, 'editAction']);
Route::delete('/hapus-dpi/{id}/', [DpiController::class, 'hapus'])->name('hapusDpi');
////////////////////////////////////////////////////////////////////////


Route::get('/alat-tangkap', [AlatTangkapController::class, 'index'])->name('alattangkap');
Route::get('/tambah-alat-tangkap', [AlatTangkapController::class, 'tambah']);
Route::post('/tambah-alat-tangkap', [AlatTangkapController::class, 'tambahAction'])->name('alatTangkap');
Route::get('/edit-alat-tangkap/{id}', [AlatTangkapController::class, 'edit']);
Route::post('/edit-alat-tangkap/{id}', [AlatTangkapController::class, 'editAction'])->name('editAlatTangkap');
Route::delete('/hapus-alattangkap/{id}', [AlatTangkapController::class, 'hapus'])->name('hapusAlat');
////////////////////////////////////////////////////////////////////////

Route::get('kapal/view/pdf', [KapalController::class, 'view_pdf']);
Route::get('kapal/download/pdf', [KapalController::class, 'download_pdf']);
