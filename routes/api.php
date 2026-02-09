<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    sleep(2); // simula carga
    return response()->json([
        'ok' => true,
        'message' => 'Petición completada correctamente desde Laravel'
    ]);
});

Route::post('/login', function (Request $request) {
    return response()->json([
        'token' => 'token-falso-123',
        'user' => [
            'name' => 'Admin Demo',
            'role' => 'admin'
        ]
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
