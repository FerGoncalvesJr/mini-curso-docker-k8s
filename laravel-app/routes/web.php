<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/alunos', function () {
    return ['Joao', 'Maria', 'Pedro', 'Ana', 'Carlos'];
});

Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now(),
        'message' => 'Mini Curso Laravel está funcionando!'
    ]);
});
