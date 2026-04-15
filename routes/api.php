<?php
use App\Models\cliente;
use App\Http\Controllers\ClientController;
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

// Route::middleware(['auth'])->group(function () {
// });
//Route::apiResource('clientes', ClientController::class);

Route::get('/cliente',function(){
    return cliente::all();
});