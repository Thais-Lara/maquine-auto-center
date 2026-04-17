<?php

use Illuminate\Support\Facades\Route;
use App\Models\cliente;
Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/registro', function () {
    return view('register');
});

Route::get('/control-panel', function () {
      $clientes = cliente::paginate(9);
    return view('mainPage',compact('clientes'));
});
