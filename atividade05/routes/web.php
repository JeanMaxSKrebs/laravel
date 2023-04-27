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
Route::get('/salaos', [SalaoController::class, 'index']);
Route::get('/salao/{id}', [SalaoController::class, 'show']);
Route::get('/festas', [FestaController::class, 'index']);
Route::get('/festa/{id}', [FestaController::class, 'show']);
Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/cliente/{id}', [ClienteController::class, 'show']);