<?php

use App\Models\Plot;
use App\Models\Task;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/prueba', function () {
    // Plot::create([
    //     'name' => 'los rikitauners',
    //     'description' => 'Somos los rikitauners y venimos a joaer'
    // ]);
    // return 'plot created';
    // Task::create([
    //     'task_name' => 'recoger mandarina',
    //     'description' => 'tenemo que recoger mandarina',
    //     'plot_id' => 1
    // ]);
    // return 'task created';

    $plot = Plot::find(1);
    return $plot->tasks;

});