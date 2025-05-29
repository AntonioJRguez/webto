<?php


use App\Models\Plot;
use App\Models\Task;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ControlPanelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/registrarse', [RegisterController::class, 'register'])->name('register');

// Route::get('/', function () {
//     if (Auth::check()) {
//         return view('index-session');
//     } else {
//         return view('index');
//     }
// })->name('index');


Route::get('/registrarse', function () {

    return view('register');
})->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginAdmin', [LoginController::class, 'logInAdmin'])->name('loginAdmin');
Route::post('/loginUser', [LoginController::class, 'logInUser'])->name('loginUser');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/admin', [ControlPanelController::class, 'showControlPanel'])->name('admin');
Route::get('/admin/users', [ControlPanelController::class, 'showControlPanelUsers'])->name('admin.users');
Route::get('/admin/user/{user}', [ControlPanelController::class, 'showControlPanelEditUser'])->name('admin.update.user');

Route::put('/admin/user/{user}', [ControlPanelController::class, 'UpdateUser'])->name('admin.update.user');
Route::delete('/admin/user/{user}', [ControlPanelController::class, 'DestroyUser'])->name('admin.delete.user');


Route::get('/admin/plot/create/', [ControlPanelController::class, 'showCreatePlot'])->name('admin.create.plot');
Route::put('/admin/plot/create/', [ControlPanelController::class, 'StorePlot'])->name('admin.store.plot');

Route::get('/admin/plots', [ControlPanelController::class, 'showControlPanelPlots'])->name('admin.plots');
Route::get('/admin/plot/{plot}', [ControlPanelController::class, 'showControlPanelEditPlot'])->name('admin.update.plot');
Route::put('/admin/plot/{plot}', [ControlPanelController::class, 'UpdatePlot'])->name('admin.update.plot');
Route::delete('/admin/plot/{plot}', [ControlPanelController::class, 'DestroyPlot'])->name('admin.delete.plot');


Route::get('/admin/event/create/', [ControlPanelController::class, 'showCreateEvent'])->name('admin.create.event');
Route::put('/admin/event/create/', [ControlPanelController::class, 'StoreEvent'])->name('admin.store.event');

Route::get('/admin/events', [ControlPanelController::class, 'showControlPanelEvents'])->name('admin.events');
Route::get('/admin/event/{event}', [ControlPanelController::class, 'showControlPanelEditEvent'])->name('admin.update.event');
Route::put('/admin/event/{event}', [ControlPanelController::class, 'UpdateEvent'])->name('admin.update.event');
Route::delete('/admin/event/{event}', [ControlPanelController::class, 'DestroyEvent'])->name('admin.delete.event');

Route::get('/', [HomeController::class, 'showIndex'])->name('index');

Route::get('/myplot', [HomeController::class, 'showMyPlot'])->name('myplot');

Route::get('/myplot/newtask', [HomeController::class, 'showCreateTask'])->name('newtask');
Route::post('/myplot/newtask', [HomeController::class, 'CreateTask'])->name('store.task');
Route::get('/myplot/task/{task}', [HomeController::class, 'showEditTask'])->name('edit.task');
Route::post('/myplot/task/{task}', [HomeController::class, 'updateTask'])->name('update.task');

Route::post('/myplot/tasks/move/{id}', action: [HomeController::class, 'updateTaskToYesterday'])->name('task.moveToYesterday');
Route::post('/myplot/deleteTask/{id}', action: [HomeController::class, 'deleteTask'])->name('task.delete');

Route::post('/myplot/tasks/complete/', action: [HomeController::class, 'completeTask'])->name('tasks.complete');
Route::post('/myplot/tasks/movetomorrow/', action: [HomeController::class, 'updateTasksToTomorrow'])->name('tasks.moveToTomorrow');
Route::post('/myplot/tasks/movepending/', action: [HomeController::class, 'updateTasksToPending'])->name('task.moveToPending');



Route::post('/myplot/tasks/delete/', action: [HomeController::class, 'deleteTasks'])->name('tasks.delete');


Route::get('/myplot/newcrop', [HomeController::class, 'showCreateCrop'])->name('newcrop');
Route::post('/myplot/newcrop', [HomeController::class, 'CreateCrop'])->name('store.crop');
Route::get('/myplot/crop/{crop}', [HomeController::class, 'showEditCrop'])->name('edit.crop');
Route::post('/myplot/crop/{crop}', [HomeController::class, 'updateCrop'])->name('update.crop');

Route::post('/myplot/deleteCrop/{id}', [HomeController::class, 'deleteCrop'])->name('crop.delete');

Route::get('/events', [HomeController::class, 'showEvents'])->name('events');

Route::get('/calendar', [HomeController::class, 'showCalendar'])->name('calendar');

