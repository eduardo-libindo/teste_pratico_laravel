<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Livewire\Auditoria;
use App\Livewire\Relatorio;
use App\Livewire\GrupoEconomicoForm;
use App\Livewire\GrupoEconomicoList;
use App\Livewire\BandeiraForm;
use App\Livewire\BandeiraList;
use App\Livewire\UnidadeForm;
use App\Livewire\UnidadeList;
use App\Livewire\ColaboradorForm;
use App\Livewire\ColaboradorList;

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Rotas para Grupo Econômico
    Route::get('/grupo-economico', GrupoEconomicoList::class)->name('grupo-economico.index');
    Route::get('/grupo-economico/create', GrupoEconomicoForm::class)->name('grupo-economico.create');
    Route::get('/grupo-economico/edit/{id}', GrupoEconomicoForm::class)->name('grupo-economico.edit');

    // Rotas para Bandeira
    Route::get('/bandeira', BandeiraList::class)->name('bandeira.index');
    Route::get('/bandeira/create', BandeiraForm::class)->name('bandeira.create');
    Route::get('/bandeira/edit/{id}', BandeiraForm::class)->name('bandeira.edit');

    // Rotas para Unidade
    Route::get('/unidade', UnidadeList::class)->name('unidade.index');
    Route::get('/unidade/create', UnidadeForm::class)->name('unidade.create');
    Route::get('/unidade/edit/{id}', UnidadeForm::class)->name('unidade.edit');

    // Rotas para Colaborador
    Route::get('/colaborador', ColaboradorList::class)->name('colaborador.index');
    Route::get('/colaborador/create', ColaboradorForm::class)->name('colaborador.create');
    Route::get('/colaborador/edit/{id}', ColaboradorForm::class)->name('colaborador.edit');

    // Relatório de Colaboradores
    Route::get('/colaborador/relatorio', Relatorio::class)->name('colaborador.relatorio');

    // Auditoria
    Route::get('/auditoria', Auditoria::class)->name('auditoria.index');

    Route::any('{catchall}', 'HomeController@notfound')->where('catchall', '.*');

});

require __DIR__ . '/auth.php';
