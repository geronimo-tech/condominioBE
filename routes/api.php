<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// 👇 AGREGA ESTO ABAJO
Route::get('/test', function () {
    return response()->json([
        'message' => 'Backend conectado correctamente'
    ]);
});

Route::post('/login', function (Illuminate\Http\Request $request) {
    return response()->json([
        'token' => 'token-falso-123',
        'user' => [
            'name' => 'Admin Demo',
            'role' => 'admin'
        ]
    ]);
});
