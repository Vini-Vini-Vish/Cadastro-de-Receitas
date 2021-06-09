<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Inicio Rotas Classe Cadastro
    Route::get('/cadastro/listar', [CadastroRestController::class, 'index'])->name('cadastro.listar');
    Route::get('/cadastro/cancelar', [CadastroRestController::class, 'cancel'])->name('cadastro.cancelar');
    Route::get('/cadastro/incluir', [CadastroRestController::class, 'new'])->name('cadastro.incluir');

    Route::get('/cadastro/alterar/{id}', [CadastroRestController::class, 'update'])->name('cadastro.update');
    Route::get('/cadastro/excluir/{id}', [CadastroRestController::class, 'delete'])->name('cadastro.delete');
    Route::get('/cadastro/consultar/{id}', [CadastroRestController::class, 'view'])->name('cadastro.consultar');

    Route::post('/cadastro/salvar', [CadastroRestController::class, 'create'])->name('cadastro.salvar');
    Route::post('/cadastro/update/{id}', [CadastroRestController::class, 'save'])->name('cadastro.atualizar');
    Route::post('/cadastro/excluir/{id}', [CadastroRestController::class, 'excluir'])->name('cadastro.excluir');
//Fim Rotas Classe Cadastro

// //rotas para imagem
// Route::get('/imagem/{imagem}', [ImageController::class, 'getImages'])->name('imagem.get');
// Route::post('/thumbnail/{imagem}', [ImageController::class, 'getThumbnailore'])->name('thumbnail.get');
// Route::post('/store', [ImageController::class, 'store'])->name('imagem.store');
// Route::post('/imagem/excluir', [ImageController::class, 'excluir'])->name('imagem.excluir');

// //Inicio Rotas Classe Cadastro
// Route::get('/receitas/listar', [ReceitaController::class, 'index'])->name('receitas.listar');
// Route::get('/receitas/cancelar', [ReceitaController::class, 'cancel'])->name('receitas.cancelar');
// Route::get('/receitas/incluir', [ReceitaController::class, 'new'])->name('receitas.incluir');

// Route::get('/receitas/alterar/{id}', [ReceitaController::class, 'update'])->name('receitas.update');
// Route::get('/receitas/excluir/{id}', [ReceitaController::class, 'delete'])->name('receitas.delete');
// Route::get('/receitas/consultar/{id}', [ReceitaController::class, 'view'])->name('receitas.consultar');

// Route::any('receitas/pesquisar', [ReceitaController::class, 'search'])->name('receitas.pesquisar'); 

// Route::post('/receitas/salvar', [ReceitaController::class, 'create'])->name('receitas.salvar');
// Route::post('/receitas/update/{id}', [ReceitaController::class, 'save'])->name('receitas.atualizar');
// Route::post('/receitas/excluir/{id}', [ReceitaController::class, 'excluir'])->name('receitas.excluir');
// //Fim Rotas Classe Cadastro

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
