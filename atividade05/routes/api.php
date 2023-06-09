<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/salaos', [SalaoController::class, 'index']);
Route::get('/salao/{id}', [SalaoController::class, 'show']);
Route::post('/salao', [SalaoController::class,'store']);
Route::put('/salao/{id}', [SalaoController::class,'update']);
Route::delete('/salao/{id}', [SalaoController::class,'remove']);

Route::apiResource('salaos',SalaoController::class)
    ->parameters([
        'salaos'=>'salao'
    ]);

Route::get(
    'salaos/{salao}/festas',
    [
        SalaoController::class,
        'festas'
    ]
);

Route::get('salaos/cliente/{nomeCliente}',[
    FornecedorController::class,
    'cliente'
]);

Route::get('/festas', [FestaController::class, 'index']);
Route::get('/festa/{id}', [FestaController::class, 'show']);
Route::post('/festa', [FestaController::class,'store']);
Route::put('/festa/{id}', [FestaController::class,'update']);
Route::delete('/festa/{id}', [FestaController::class,'remove']);

Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/cliente/{id}', [ClienteController::class, 'show']);
Route::post('/cliente', [ClienteController::class,'store']);
Route::put('/cliente/{id}', [ClienteController::class,'update']);
Route::delete('/cliente/{id}', [ClienteController::class,'remove']);

