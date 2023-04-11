<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\ProjectController as GuestProjectController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;

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


Route::get('/',  [GuestProjectController::class, 'index']);

Route::get('/home', [AdminProjectController::class, 'index'])->middleware('auth')->name('home');

Route::middleware('auth')
    ->prefix('profile') //tutti gli url hanno il prefisso /profile
    ->name('profile.') //tutti i nomi delle rotte hanno il prefisso profile. (profile.edit, profile.update, profile.destroy)
    ->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';