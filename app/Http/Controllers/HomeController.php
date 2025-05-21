<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plot;
use App\Models\Crop;
use App\Models\Task;
use App\Models\User;
use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showIndex()
    {
        if (Auth::check()) {
            return view('index-session');
        } else {
            return view('index');
        }
    }
    public function showMyPlot()
    {
        if (Auth::check()) {

            $user = Auth::user();
            $plot = $user->plot;
            $tasks = [];
            $tasks = $plot->tasks;
            $tasks = $tasks->toArray();
            $today = Carbon::today()->toDateString();
            $completedTasks = [];
            $pastTasks = [];
            $todayTasks = [];
            $futureTasks = [];
            foreach ($tasks as $task) {
                $fecha = $task['limit_date']; // o $event->event_date si es objeto

                if ($fecha < $today) {
                    if (!is_null($task['completed_date'])) {
                        $completedTasks[] = $task;
                    } else {
                        $pastTasks[] = $task;
                    }
                } elseif ($fecha == $today) {
                    $todayTasks[] = $task;
                } else {
                    $futureTasks[] = $task;
                }
            }
            return view('myplot', compact('plot', 'completedTasks', 'pastTasks', 'todayTasks', 'futureTasks'));
        } else {
            return view('index');
        }
    }

    public function showEvents()
    {
        if (Auth::check()) {
            $nowUser = Auth::check();
            // $events = Event::orderBy('event_date', 'asc')->paginate(3);
            $today = Carbon::today()->toDateString(); // fecha actual en formato 'YYYY-MM-DD'

            $events = Event::where('event_date', '>=', $today)->orderBy('event_date', 'asc')->paginate(3);

            return view('events', compact('events', 'nowUser'));
        } else {

            return view('index');
        }
    }
}
