<?php

use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LayoutSessaoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessaoController;
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

Route::get('/', function () {
    return view('paginaInicial');
});

Route::controller(SessaoController::class)->group(function () {
    Route::get('/sessao', 'index')->name('sessao.index');
    Route::get('/sessao/create', 'create')->name('sessao.criar');
    Route::get('/sessao/edit/{id}/edit', 'edit')->name('sessao.editar');
    Route::put('/sessao/update/{id}', 'update')->name('sessao.atualizar');
    Route::post('/sessao/store', 'store')->name('sessao.salvar');
    Route::delete('/sessao/destroy/{sessao}', 'destroy')->name('sessao.excluir');
});

Route::resource('/layout', LayoutController::class)
    ->except(['show']);

Route::resource('/layoutsessao', LayoutSessaoController::class)
    ->only('store','destroy','update');
