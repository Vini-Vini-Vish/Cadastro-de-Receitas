<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\ImageController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//Inicio Rotas Classe Cadastro
Route::get('/cadastro/listar', [CadastroController::class, 'index'])->name('cadastro.listar');
Route::get('/cadastro/cancelar', [CadastroController::class, 'cancel'])->name('cadastro.cancelar');
Route::get('/cadastro/incluir', [CadastroController::class, 'new'])->name('cadastro.incluir');

Route::get('/cadastro/alterar/{id}', [CadastroController::class, 'update'])->name('cadastro.update');
Route::get('/cadastro/excluir/{id}', [CadastroController::class, 'delete'])->name('cadastro.delete');
Route::get('/cadastro/consultar/{id}', [CadastroController::class, 'view'])->name('cadastro.consultar');

Route::post('/cadastro/salvar', [CadastroController::class, 'create'])->name('cadastro.salvar');
Route::post('/cadastro/update/{id}', [CadastroController::class, 'save'])->name('cadastro.atualizar');
Route::post('/cadastro/excluir/{id}', [CadastroController::class, 'excluir'])->name('cadastro.excluir');
//Fim Rotas Classe Cadastro

//rotas para imagem
Route::get('/imagem/{imagem}', [ImageController::class, 'getImages'])->name('imagem.get');
Route::post('/store', [ImageController::class, 'store'])->name('imagem.store');
Route::post('/imagem/excluir', [ImageController::class, 'excluir'])->name('imagem.excluir');

//Inicio Rotas Classe Cadastro
Route::get('/receitas/listar', [ReceitaController::class, 'index'])->name('receitas.listar');
Route::get('/receitas/cancelar', [ReceitaController::class, 'cancel'])->name('receitas.cancelar');
Route::get('/receitas/incluir', [ReceitaController::class, 'new'])->name('receitas.incluir');

Route::get('/receitas/alterar/{id}', [ReceitaController::class, 'update'])->name('receitas.update');
Route::get('/receitas/excluir/{id}', [ReceitaController::class, 'delete'])->name('receitas.delete');
Route::get('/receitas/consultar/{id}', [ReceitaController::class, 'view'])->name('receitas.consultar');

Route::any('receitas/pesquisar', [ReceitaController::class, 'search'])->name('receitas.pesquisar'); 

Route::post('/receitas/salvar', [ReceitaController::class, 'create'])->name('receitas.salvar');
Route::post('/receitas/update/{id}', [ReceitaController::class, 'save'])->name('receitas.atualizar');
Route::post('/receitas/excluir/{id}', [ReceitaController::class, 'excluir'])->name('receitas.excluir');
//Fim Rotas Classe Cadastro

// jeito errado de fazer chamadas
    // Route::get('/cadastro/listar', 'CadastroController@index')->name('cadastro.listar');
    // Route::get('/cadastro/cancelar', 'CadastroController@cancel')->name('cadastro.cancelar');
    // Route::get('/cadastro/incluir', 'CadastroController@new')->name('cadastro.incluir');

    // Route::get('/cadastro/alterar/{id}', 'CadastroController@update')->name('cadastro.update');
    // Route::get('/cadastro/excluir/{id}', 'CadastroController@delete')->name('cadastro.delete');
    // Route::get('/cadastro/consultar/{id}', 'CadastroController@view')->name('cadastro.consultar');

    // Route::post('/cadastro/salvar', 'CadastroController@create')->name('cadastro.salvar');
    // Route::post('/cadastro/update/{id}', 'CadastroController@save')->name('cadastro.atualizar');
    // Route::post('/cadastro/excluir/{id}', 'CadastroController@excluir')->name('cadastro.excluir');
//

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
