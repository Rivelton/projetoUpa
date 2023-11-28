<?php

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


Route::get('/', [\App\Http\Controllers\IndexController::class, 'Index'])->name('site.index');
Route::get('/cadastrar-protocolo', [\App\Http\Controllers\CadastrarProtocoloController::class, 'mostrarFormularioCadastro'])->name('site.cadastrar');
Route::post('/cadastrar-protocolo', [\App\Http\Controllers\CadastrarProtocoloController::class, 'CadastrarProtocolo'])->name('site.cadastrar');
Route::get('/pesquisar-protocolo', [\App\Http\Controllers\PesquisarProtocoloController::class, 'ProcurarProtocolo'])->name('site.pesquisar');
Route::post('/pesquisar-protocolo', [\App\Http\Controllers\PesquisarProtocoloController::class, 'PesquisarProtocolo'])->name('site.pesquisar');

Route::post('/login', [\App\Http\Controllers\Login::class, 'Login'])->name('site.login');
Route::get('/login{erro?}', [\App\Http\Controllers\Login::class, 'mostrarLogin'])->name('site.login');
Route::get('/visualizar-pdf/{pdf_path}', [\App\Http\Controllers\PesquisarProtocoloController::class, 'VisualizarPDFReal'])->name('site.visualizar_pdf_real');


Route::middleware('autenticacao')->prefix('/admin')->group(function () {
    Route::get('/sair', [\App\Http\Controllers\Login::class, 'sair'])->name('site.sair');
    Route::get('/gerencia', [\App\Http\Controllers\GerenciaController::class, 'Gerencia'])->name('site.gerencia');
    Route::get('/gerencia-protocolo', [\App\Http\Controllers\GerenciaProtocoloController::class, 'GerenciaProtocolo'])->name('site.gerencia_protocolo');
    Route::get('/gerencia-protocolo/pagina_ficha/{protocolo}', [\App\Http\Controllers\GerenciaProtocoloController::class, 'PaginaFicha'])->name('site.pagina_ficha');
    Route::get('/gerencia/detalhes-protocolo/{protocolo}', [\App\Http\Controllers\GerenciaProtocoloController::class, 'detalhesProtocolo'])->name('site.detalhes_protocolo');
    Route::post('/gerencia-protocolo/salvar-arquivo/{protocolo}', [\App\Http\Controllers\GerenciaProtocoloController::class, 'salvarArquivo'])->name('site.salvar_arquivo');
    //aqui ficara as rotas admin
});

Route::fallback([\App\Http\Controllers\IndexController::class, 'Index'])->name('site.fallback');