<?php

use Illuminate\Support\Facades\Route;
use App\Models\cliente;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;


Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/registro', function () {
    return view('register');
});




Route::get('/control-panel', function () {
    $clientes = Cliente::paginate(9);
    return view('mainPage', compact('clientes'));
})->name('control-panel');


Route::post('/control-panel', function (StoreClientRequest $request) {

    try {
        cliente::create([
            'nome' => $request->nome,
            'cpf_cnpj' => $request->cpf_cnpj,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'aniversario' => $request->aniversario,
            'data_inclusao' => now()
        ]);

        return response()->json([
            'success' => true
        ]);

    } catch (\Throwable $e) {

        return response()->json([
            'success' => false,
            'error' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ], 500);
    }

})->name('control-panel.store');