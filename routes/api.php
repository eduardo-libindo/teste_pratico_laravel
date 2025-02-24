<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GrupoEconomicoController;
use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\ColaboradorController;

Route::middleware('auth:api')->group(function () {
    Route::apiResource('grupo-economico', GrupoEconomicoController::class)->name('grupo-economico');
    Route::apiResource('bandeira', BandeiraController::class)->name('bandeira');
    Route::apiResource('unidade', UnidadeController::class)->name('unidade');
    Route::apiResource('colaborador', ColaboradorController::class)->name('colaborador');
    Route::get('colaborador/relatorio', [ColaboradorController::class, 'relatorio'])->name('colaborador.relatorio');
    Route::get('colaborador/exportar', [ColaboradorController::class, 'exportar'])->name('colaborador.exportar');
});

require __DIR__ . '/auth.php';
