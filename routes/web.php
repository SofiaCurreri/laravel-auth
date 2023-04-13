<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ProjectController;

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


Route::get('/',  [GuestHomeController::class, 'index']);

Route::get('/home', [AdminHomeController::class, 'index'])->middleware('auth')->name('home');

Route::middleware('auth')
    ->prefix('/admin')
    ->name('admin.')
    ->group(
        function() {
            Route::resource('projects', ProjectController::class)
                ->parameters(['projects' => 'project:slug']); //così per tutta la risorsa si usa slug al posto dell' id (va bene solo se slug è unico)
        }
    );

Route::middleware('auth')
    ->prefix('profile') //tutti gli url hanno il prefisso /profile
    ->name('profile.') //tutti i nomi delle rotte hanno il prefisso profile. (profile.edit, profile.update, profile.destroy)
    ->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';