<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Plot;
use App\Models\User;
use Cloudinary\Api\Upload\UploadApi;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControlPanelController extends Controller
{
    public function showControlPanel()
    {
        // dd(Auth::check()); 
        if (Auth::check()) {
            $user = Auth::user();
            if (!is_null($user) && $user->is_admin) {

                return view('controlpanel.controlPanel',); // Redirigir al panel de admin
            } else {
                Auth::logout(); // Desconectar si no es admin
                return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
            }
        } else {
            return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
        }
    }

    public function showControlPanelUsers()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (!is_null($user) && $user->is_admin) {
                $users = User::orderBy('id', 'desc')->get();
                return view('controlpanel.users-controlPanel', compact('users')); // Redirigir al panel de admin
            } else {
                Auth::logout(); // Desconectar si no es admin
                return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
            }
        } else {
            return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
        }
    }
    public function showControlPanelEditUser($idUser)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (!is_null($user) && $user->is_admin) {
                $user = User::find($idUser);
                return view('controlpanel.editUser-controlPanel', compact('user')); // Redirigir al panel de admin
            } else {
                Auth::logout(); // Desconectar si no es admin
                return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
            }
        } else {
            return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
        }
    }

    public function UpdateUser(Request $request, $id)
    {
        // Validación
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'plot_code' => 'exists:plots,plot_code|required|string|max:255',
            'is_admin' => 'required|boolean',
            'new_password' => 'nullable|min:8|confirmed',
        ]);


        $user = User::findOrFail($id);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->plot_code = $request->plot_code;
        $user->is_admin = $request->is_admin;


        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }


        $user->save();
        return redirect()->back()->with('success', 'Usuario actualizado correctamente.');
    }

    public function DestroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Usuario eliminado.');
    }

    public function showControlPanelPlots()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (!is_null($user) && $user->is_admin) {
                $plots = Plot::orderBy('id', 'desc')->get();
                return view('controlpanel.plots-controlPanel', compact('plots')); // Redirigir al panel de admin
            } else {
                Auth::logout(); // Desconectar si no es admin
                return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
            }
        } else {
            return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
        }
    }
    public function showControlPanelEditPlot($idPlot)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (!is_null($user) && $user->is_admin) {
                $plot = Plot::find($idPlot);
                return view('controlpanel.editPlot-controlPanel', compact('plot')); // Redirigir al panel de admin
            } else {
                Auth::logout(); // Desconectar si no es admin
                return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
            }
        } else {
            return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
        }
    }

    public function UpdatePlot(Request $request, $id)
    {


        // Validación
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|max:255',
            'plot_code' => 'required|string|max:255|unique:plots,plot_code,' . $id,
        ]);


        $plot = Plot::findOrFail($id);


        $plot->name = $request->name;
        $plot->description = $request->description;
        $plot->plot_code = $request->plot_code;


        $plot->save();
        return redirect()->back()->with('success', 'Parcela actualizada correctamente.');
    }
    public function DestroyPlot($id)
    {
        $plot = Plot::findOrFail($id);
        $plot->delete();
        return redirect()->back()->with('success', 'Parcela eliminada.');
    }

    public function StorePlot(Request $request)
    {
        // Validación
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'plot_code' => 'required|string|unique:plots|max:255',
            'fertilization_date' => 'nullable|date',
        ]);

        // Crear la parcela
        Plot::create([
            'name' => $request->name,
            'description' => $request->description,
            'plot_code' => $request->plot_code,
            'fertilization_date' => $request->fertilization_date ?? null,
        ]);
        return redirect()->back()->with('success', 'Parcela creada correctamente.');
    }

    public function showCreatePlot()
    {
        return view('controlpanel.createPlot-controlPanel');
    }



    //Eventos

    public function showControlPanelEvents()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (!is_null($user) && $user->is_admin) {
                $events = Event::orderBy('id', 'desc')->get();
                return view('controlpanel.events-controlPanel', compact('events')); // Redirigir al panel de admin
            } else {
                Auth::logout(); // Desconectar si no es admin
                return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
            }
        } else {
            return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
        }
    }
    public function showControlPanelEditEvent($idEvent)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (!is_null($user) && $user->is_admin) {
                $event = Event::find($idEvent);
                return view('controlpanel.editEvent-controlPanel', compact('event')); // Redirigir al panel de admin
            } else {
                Auth::logout(); // Desconectar si no es admin
                return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
            }
        } else {
            return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
        }
    }

    public function UpdateEvent(Request $request, $id)
    {


        // Validación
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|max:255',
            'location' => 'required|max:255',
            'event_date' => 'required|string|max:255',
            'capacity' => 'required|integer|max_digits:5',
        ]);


        $event = Event::findOrFail($id);


        $event->name = $request->name;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->event_date = $request->event_date;
        $event->capacity = $request->capacity;



        $event->save();
        return redirect()->back()->with('success', 'Evento actualizado correctamente.');
    }

    public function DestroyEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->back()->with('success', 'Parcela eliminada.');
    }
    public function StoreEvent(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|max:255',
            'location' => 'required|max:255',
            'event_date' => 'required|string|max:255',
            'capacity' => 'required|integer|max_digits:5',
            'event_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);
        $imageId = null;

    if ($request->hasFile('event_image')) {
        $filePath = $request->file('event_image')->getRealPath();

        $upload = (new UploadApi())->upload($filePath);

        $imageId = $upload['public_id'];
    }

   
        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'duration' => $request->duration,
            'event_date' => $request->event_date,
            'image_id' => $imageId, // Puede ser null si no se subió imagen
        ]);
        return redirect()->back()->with('success', 'Evento creado correctamente.');
    }

    public function showCreateEvent()
    {
        return view('controlpanel.createEvent-controlPanel');
    }
}
