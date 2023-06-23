<?php

use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\ReservaController;
use App\Http\Controllers\Api\SalaoController;
use App\Http\Controllers\Api\FestaController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Auth\LoginController;
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
// Route::get('/salao/{id}', [SalaoController::class, 'show']);
// Route::post('/salao', [SalaoController::class,'store']);
// Route::put('/salao/{id}', [SalaoController::class,'update']);
// Route::delete('/salao/{id}', [SalaoController::class,'remove']);

Route::apiResource('/salao', SalaoController::class)->middleware('auth:sanctum');



//ver quais reservas o salão especificado tem 
Route::get(
    'salaos/{salao}/reservas',
    [
        SalaoController::class,
        'reservas'
    ]
);
//ver quais salões o cliente utilizou 
Route::get('salaos/{nomeCliente}',[
    SalaoController::class,
    'cliente'
]);

Route::get('/festas', [FestaController::class, 'index']);
// Route::get('/festa/{id}', [FestaController::class, 'show']);
// Route::post('/festa', [FestaController::class,'store']);
// Route::put('/festa/{id}', [FestaController::class,'update']);
// Route::delete('/festa/{id}', [FestaController::class,'remove']);

Route::apiResource('/festa', SalaoController::class)->middleware('auth:sanctum');

Route::get('/reservas', [ReservaController::class, 'index']);
// Route::get('/reserva/{id}', [ReservaController::class, 'show']);
// Route::post('/reserva', [ReservaController::class,'store']);
// Route::put('/reserva/{id}', [ReservaController::class,'update']);
// Route::delete('/reserva/{id}', [ReservaController::class,'remove']);

Route::apiResource('/reserva', SalaoController::class)->middleware('auth:sanctum');

Route::get('/clientes', [ClienteController::class, 'index']);
// Route::get('/cliente/{id}', [ClienteController::class, 'show']);
// Route::post('/cliente', [ClienteController::class,'store']);
// Route::put('/cliente/{id}', [ClienteController::class,'update']);
// Route::delete('/cliente/{id}', [ClienteController::class,'remove']);

Route::apiResource('/cliente', SalaoController::class)->middleware('auth:sanctum');

//ver quais reservas o cliente especificado tem 
Route::get(
    'clientes/{salao}/reservas',
    [
        ClienteController::class,
        'reservas'
    ]
);

Route::apiResource('users', UserController::class)->middleware('auth:sanctum');

Route::post('/login', [LoginController::class,'login'])->name('login');