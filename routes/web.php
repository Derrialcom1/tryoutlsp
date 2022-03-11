<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    ArtikelController,
    KategoriController
};
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

// Route::get('/', function () {
//     return view('auth/login');
// })->name('login');
Route::get('/login', function () {
    return view('auth/login');
})->name('login2');
Route::post('/login', [AuthController::class, "login"])->name('loginProses');

Route::get('/logout', [AuthController::class, "logout"])->name('logout');


Route::get('/', [ArtikelController::class, "isi"])->name('dashboardUser');
Route::get('/isiartikel/{id}', [ArtikelController::class, "isiartikel"])->name('isiartikel');


Route::group(['auth:sanctum'], function () {
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', [ArtikelController::class, "isi"])->name('dashboard');
        // Route::get('/isiartikel/{id}', [ArtikelController::class, "isiartikel"])->name('isiartikel');
        Route::get('/artikel', function () {
            return view('artikel');
        })->name('artikel');
        Route::get('/artikel', [ArtikelController::class, "index"])->name('artikel');
        Route::get('/addartikel', function () {
            return view('addartikel');
        })->name('addartikel');
        Route::get('/addartikel', [ArtikelController::class, "create"])->name('addartikel');
        Route::get('/editartikel/{id}', [ArtikelController::class, "show"])->name('editartikel');
        Route::post('/saveartikel', [ArtikelController::class, "store"])->name('saveartikel');
        Route::get('/deleteartikel/{id}', [ArtikelController::class, "destroy"])->name('deleteartikel');
        Route::post('/updateartikel/{id}', [ArtikelController::class, "update"])->name('updateartikel');


        Route::get('/kategori', function () {
            return view('kategori');
        })->name('kategori');
        Route::get('/kategori', [KategoriController::class, "index"])->name('kategori');
        Route::get('/addkategori', function () {
            return view('addkategori');
        })->name('addkategori');
        Route::get('/editkategori/{id}', [KategoriController::class, "show"])->name('editkategori');
        Route::post('/savekategori', [KategoriController::class, "store"])->name('savekategori');
        Route::get('/deletekategori/{id}', [KategoriController::class, "destroy"])->name('deletekategori');
        Route::post('/updatekategori/{id}', [KategoriController::class, "update"])->name('updatekategori');
    });
});