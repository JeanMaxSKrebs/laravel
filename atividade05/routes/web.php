<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SalaoController;
use App\Http\Controllers\FestaController;
use App\Http\Controllers\ClienteController;
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
    return view('welcome');
});

Route::get('/ola', [HomeController::class, 'index']);


Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produto/{id}', [ProdutoController::class, 'show']);
Route::get('/produto', [ProdutoController::class,'create']);
Route::post('/produto', [ProdutoController::class,'store']);

Route::get('/produto/{id}/edit', [
    ProdutoController::class,
    'edit'
])->name('produto.edit');

Route::post('/produto/{id}/update', [
    ProdutoController::class,
    'update'
])->name('produto.update');


Route::get('/salaos', [SalaoController::class, 'index']);
Route::get('/salao/{id}', [SalaoController::class, 'show']);
Route::get('/salao', [SalaoController::class,'create']);
Route::post('/salao', [SalaoController::class,'store']);

Route::get('/salao/{id}/edit', [
    SalaoController::class,
    'edit'
])->name('salao.edit');

Route::post('/salao/{id}/update', [
    SalaoController::class,
    'update'
])->name('salao.update');


Route::get('/festas', [FestaController::class, 'index']);
Route::get('/festa/{id}', [FestaController::class, 'show']);
Route::get('/festa', [FestaController::class,'create']);
Route::post('/festa', [FestaController::class,'store']);

Route::get('/festa/{id}/edit', [
    FestaController::class,
    'edit'
])->name('festa.edit');

Route::post('/festa/{id}/update', [
    FestaController::class,
    'update'
])->name('festa.update');


Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/cliente/{id}', [ClienteController::class, 'show']);
Route::get('/cliente', [ClienteController::class,'create']);
Route::post('/cliente', [ClienteController::class,'store']);

Route::get('/cliente/{id}/edit', [
    ClienteController::class,
    'edit'
])->name('cliente.edit');

Route::post('/cliente/{id}/update', [
    ClienteController::class,
    'update'
])->name('cliente.update');
