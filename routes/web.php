<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [DashboardController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/beritaku', [BeritaController::class, 'index']);
    Route::post('/add/beritaku', [BeritaController::class, 'add'])->name('add-beritaku');
    Route::post('/edit/beritaku/{id}', [BeritaController::class, 'edit'])->name('edit-beritaku');
    Route::post('/delete/beritaku/{id}', [BeritaController::class, 'delete'])->name('delete-beritaku');
    Route::post('/update/beritaku/{id}', [BeritaController::class, 'update'])->name('update-beritaku');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
