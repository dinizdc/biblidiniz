<?php

use App\Http\Controllers\FotoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('login:liberado,admin')->prefix('/livros')->group(function () {
    Route::get('/home', [LivroController::class, 'home'])->name('livros.home');
    Route::get('/listar', [LivroController::class, 'livros'])->name('livros.listar');
    Route::get('/sair', [LoginController::class, 'sair'])->name('livros.sair');

    Route::post('/salvar', [LivroController::class, 'livrosForm'])->name('livros.salvar');
    Route::get('/cadastrar', [LivroController::class, 'livrosCadastrar'])->name('livros.cadastrar');
    Route::get('/editar/{id}', [LivroController::class, 'livrosEditar'])->name('livros.editar');    
    Route::get('/deletar/{id}', [LivroController::class, 'deletar'])->name('livros.deletar');    
    Route::post('/atualizar', [LivroController::class, 'livrosAtualizarDados'])->name('livros.atualizar');
    Route::post('/pesquisar', [LivroController::class, 'livros'])->name('livros.pesquisar');
    Route::post('/image', [LivroController::class, 'uploadImage'])->name('livros.image');
    Route::post('/upload', [FotoController::class, 'save'])->name('livros.image.save');
    Route::get('/pdf', [LivroController::class, 'pdfDownload'])->name('pdf');
});

Route::get('/{erro?}', [LoginController::class, 'login'])->name('site.login');
Route::post('/', [LoginController::class, 'autenticar'])->name('site.login');



