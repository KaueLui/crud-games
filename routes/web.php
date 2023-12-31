<?php

use App\Http\Controllers\GamesController;
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

Route::prefix('games')->group(function(){
    Route::get('/', [GamesController::class, 'index'])->name('games-index');
    // Add game
    Route::get('/create', [GamesController::class, 'create'])->name('games-create');
    Route::POST('/', [GamesController::class, 'store'])->name('games-store');
    // Edit game
    Route::get('/{id}/edit', [GamesController::class, 'edit'])->where('id', '[0-9+]')->name('games-edit');
    Route::put('/{id}', [GamesController::class, 'update'])->where('id', '[0-9+]')->name('games-update');
    // Delete
    Route::delete('/{id}', [GamesController::class, 'destroy'])->where('id', '[0-9+]')->name('games-destroy');
});



//Quando a URL não estiver registrada
Route::fallback(function (){
    return "Erro";
});