<?php

use App\Http\Controllers\SeriesController;
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

Route::get('/', function () {
    return redirect('/series');
});


//Usa nomencatura padrão do laravel para rotas para fazer definir as rotas:
Route::resource('/series', SeriesController::class)->only(['index', 'create', 'store', 'destroy']);


//Essa rota esta sendo feita no resource usando o padrão pre-determinado do laravel que usa a seguinte regra para passagem de paramentros: o resource usa a singular da primera parte da sua rota (nesse caso 'series') como parametro, ou seja, o resource esta fazendo a rota: /series/{series} (o singular de series no ingles é series)
//Route::delete('series/destroy/{id}', [SeriesController::class, 'destroy'])->name('series.destroy');

//Modo de fazer sem ter a nomenclatura padrão:
// Route::controller(SeriesController::class)->group(function () {
//     Route::get('/series', 'index')->name('series.index');
//     Route::get('/series/create', 'create')->name('series.create');
//     Route::post('/series/salvar', 'store')->name('series.store');
// });
