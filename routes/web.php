<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');