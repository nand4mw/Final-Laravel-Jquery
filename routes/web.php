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
Route::get('/', [HomeController::class, 'index'])->name('home');
////////////////////////////////////////////////////////////////////////


Route::get('/kapal', [KapalController::class, 'index'])->name('kapal');
Route::get('/tambah-kapal', [KapalController::class, 'tambah']);
Route::post('/tambah-kapal', [KapalController::class, 'tambahAction']);
Route::get('/kapal/{id}/edit', [KapalController::class, 'edit']);
Route::get('/kapal/{id}/edit', [KapalController::class, 'editAction']);
Route::get('/kapal/{id}/hapus', [KapalController::class, 'hapus']);
////////////////////////////////////////////////////////////////////////


Route::get('/pemilik', [PemilikController::class, 'index'])->name('pemilik');
Route::get('/tambah-data-pemilik', [PemilikController::class, 'tambah']);
Route::post('/tambah-data-pemilik', [PemilikController::class, 'tambahAction']);
Route::get('/edit-pemilik/{id}', [PemilikController::class, 'edit']);
Route::post('/edit-pemilik/{id}', [PemilikController::class, 'editAction']);
Route::get('/hapus/{id}/hapus', [PemilikController::class, 'hapus']);
////////////////////////////////////////////////////////////////////////


Route::get('/dpi', [DpiController::class, 'index'])->name('dpi');
Route::get('/tambah-data-dpi', [DpiController::class, 'tambah']);
Route::post('/tambah-data-dpi', [DpiController::class, 'tambahAction']);
Route::get('/dpi/{id}/edit', [DpiController::class, 'edit']);
Route::get('/dpi/{id}/edit', [DpiController::class, 'editAction']);
Route::get('/dpi/{id}/hapus', [DpiController::class, 'hapus']);
////////////////////////////////////////////////////////////////////////


Route::get('/alat-tangkap', [AlatTangkapController::class, 'index'])->name('alattangkap');
Route::get('/tambah-alat-tangkap', [AlatTangkapController::class, 'tambah']);
Route::post('/tambah-alat-tangkap', [AlatTangkapController::class, 'tambahAction']);
Route::get('/alattangkap/{id}', [AlatTangkapController::class, 'edit']);
Route::get('/alattangkap/{id}', [AlatTangkapController::class, 'editAction']);
Route::get('/alattangkap/{id}', [AlatTangkapController::class, 'hapus']);
////////////////////////////////////////////////////////////////////////
