<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\PasswordRecoveryController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



Route::post('/recuperar-password',[PasswordRecoveryController::class,'enviarCodigo']);
Route::post('/verificar-codigo',[PasswordRecoveryController::class,'verificarCodigo']);
Route::post('/cambiar-password',[PasswordRecoveryController::class,'cambiarPassword']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/test', function () {
        sleep(2);
        return response()->json([
            'ok' => true,
            'message' => 'Petición protegida correctamente'
        ]);
    });

    });