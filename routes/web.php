<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlinikController;


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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/detail', function () {
    return view('detail');
})->name('detail');

Route::get('/artikel', function () {
    return view('artikel');
})->name('artikel');

Route::get('/event', function () {
    return view('event');
})->name('event');

Route::get('/map', function () {
    return view('map');
})->name('map');

Route::get('/ulasan', function () {
    return view('ulasan');
})->name('ulasan');

Route::get('/create', function () {
    return view('klinik.create');
})->name('create');


Route::get('/api/klinik-data', [KlinikController::class, 'getKlinikData']);

// Menambahkan data klinik
Route::post('/klinik', [KlinikController::class, 'store']);

// Mengupdate data klinik
Route::put('/klinik/{id}', [KlinikController::class, 'update']);

// Menghapus data klinik
Route::delete('/klinik/{id}', [KlinikController::class, 'destroy']);

Route::post('/klinik/store', [KlinikController::class, 'store'])->name('klinik.store');


Route::get('/klinik', [KlinikController::class, 'index'])->name('klinik.index');

require __DIR__.'/auth.php';
