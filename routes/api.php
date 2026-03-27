<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/teste', function () {
    return response()->json([
        'status' => true,
        'msg' => 'API funcionando 🚀',
    ]);
});

Route::post('/login', [LoginController::class, 'login']);

Route::post('/register', [LoginController::class, 'register']);
