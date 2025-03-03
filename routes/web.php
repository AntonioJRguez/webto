<?php

use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', homeController::class);

Route::get('/inicio-sesion', function () {
    return view('inicio-sesion');
});
Route::get('/parcelas', function () {
    return view('parcelas');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
