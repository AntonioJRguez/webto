<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plot;
use App\Models\Crop;
use App\Models\Task;
use App\Models\User;
use App\Models\Event;
use App\Models\EventImage;
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

            return view('myplot', ['plot' => $plot]);
        } else {
            return view('index');
        }
    }

    public function showEvents()
    {
        if (Auth::check()) {
            $nowUser = Auth::check();
            $events = Event::paginate(3);
            return view('events', compact('events', 'nowUser'));
        } else {
            
            return view('index');
        }
    }
}
