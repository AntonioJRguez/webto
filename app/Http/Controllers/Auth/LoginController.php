<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ControlPanelController;
use App\Models\Plot;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function logInAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, false)) {
            $user = Auth::user();
            if ($user->is_admin) {
                return redirect()->route('admin'); // Redirigir al panel de admin
            } else {
                Auth::logout(); // Desconectar si no es admin
                return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
            }
        }

        return back()->withErrors(['error' => 'Credenciales incorrectas.']);
    }
    public function logIn()
    {
        if (Auth::check()) {
            return view('index');
        }
        return redirect()->route('index')->withErrors(['error' => 'Acceso no autorizado']);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Cierra sesión

        $request->session()->invalidate(); // Invalida la sesión actual
        $request->session()->regenerateToken(); // Regenera el token CSRF

        return redirect('/');
    }
    
}
