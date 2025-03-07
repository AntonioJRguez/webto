<?php

use App\Models\Plot;
use App\Models\Task;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;

Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/registrarse', [RegisterController::class, 'register'])->name('register');

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/inicio', function () {
    return view('index-session');
});

// Route::get('/prueba', function () {
//     // Plot::create([
//     //     'name' => 'los rikitauners',
//     //     'description' => 'Somos los rikitauners y venimos a joaer'
//     // ]);
//     // return 'plot created';
//     // Task::create([
//     //     'task_name' => 'recoger mandarina',
//     //     'description' => 'tenemo que recoger mandarina',
//     //     'plot_id' => 1
//     // ]);
//     // return 'task created';

//     $plot = Plot::find(1);
//     return $plot->tasks;

// });

Route::get('/registrarse', function () {

   return view('register') ;

})->name('register');

Route::get('/prueba2', function () {
    Plot::create([
        'name' => 'los rikitauners',
        'description' => 'Somos los rikitauners y venimos a joaer',
        'plot_code' => 'asdf'
    ]);
     return 'plot created';
    // Task::create([
    //     'task_name' => 'recoger mandarina',
    //     'description' => 'tenemo que recoger mandarina',
    //     'plot_id' => 1
    // ]);
    // return 'task created';

});