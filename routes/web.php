<?php

use App\Http\Controllers\LojaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')
->prefix('usuarios')
->group(function(){
    Route::get('/menu', [UsuarioController::class, 'index'])->name('usuarios_menu');
    Route::get('/form', [UsuarioController::class, 'form'])->name('usuarios_form');
    Route::get('/update', [UsuarioController::class, 'formUpdate']);
    Route::get('/delete', [UsuarioController::class, 'formDelete']);
    Route::post('/create', [UsuarioController::class, 'create'])->name('usuarios_create');
    Route::get('/list', [UsuarioController::class, 'list'])->name('usuarios_list');
    Route::post('/update', [UsuarioController::class, 'update'])->name('usuarios_update');
    Route::delete('/delete', [UsuarioController::class, 'delete'])->name('usuarios_delete');
});

Route::middleware('auth')
    ->prefix('lojas')
    ->group(function(){
        Route::get('/menu', [LojaController::class, 'index'])->name('lojas_menu');
        Route::get('/form', [LojaController::class, 'form'])->name('lojas_form');
        Route::get('/update', [LojaController::class, 'formUpdate']);
        Route::get('/delete', [LojaController::class, 'formDelete']);
        Route::post('/create', [LojaController::class, 'create'])->name('lojas_create');
        Route::get('/list', [LojaController::class, 'list'])->name('lojas_list');
        Route::post('/update', [LojaController::class, 'update'])->name('lojas_update');
        Route::delete('/delete', [LojaController::class, 'delete'])->name('lojas_delete');
    });

Route::middleware('auth')
    ->prefix('produtos')
    ->group(function(){
        Route::get('/menu', [ProdutoController::class, 'index'])->name('produtos_menu');
        Route::get('/form', [ProdutoController::class, 'form'])->name('produtos_form');
        Route::get('/update', [ProdutoController::class, 'formUpdate']);
        Route::get('/delete', [ProdutoController::class, 'formDelete']);
        Route::post('/create', [ProdutoController::class, 'create'])->name('produtos_create');
        Route::get('/list', [ProdutoController::class, 'list'])->name('produtos_list');
        Route::post('/update', [ProdutoController::class, 'update'])->name('produtos_update');
        Route::delete('/delete', [ProdutoController::class, 'delete'])->name('produtos_delete');
    });
