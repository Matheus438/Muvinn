<?php

use App\Http\Controllers\MuvinnController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('imovel/criar',[ MuvinnController::class, 'criarAnuncio']);
Route::post('imovel/pesquisaTipoImove', [MuvinnController::class, 'pesquisaPorTipoDeImovel']);
Route::delete('imovel/delete', [MuvinnController::class, 'excluir']);
Route::put('imovel/update', [MuvinnController::class, 'update']);
Route::get('imovel/retornarTodos', [MuvinnController::class, 'retornarTodos']);