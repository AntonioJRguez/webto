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
        $customMessages = [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo electrónico válido (ejemplo: usuario@dominio.com).',
            'password.required' => 'La contraseña es obligatoria.',
        ];

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], $customMessages);

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
    public function logInUser(Request $request)
    {
        $customMessages = [
            'email.required' => 'Por favor ingresa tu dirección de correo electrónico',
            'email.email' => 'Debes proporcionar una dirección de correo válida (ejemplo: usuario@dominio.com)',
            'password.required' => 'Es necesario que ingreses tu contraseña',
        ];

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], $customMessages);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect()->route('index'); // Redirigir al index
        }

        return back()->withErrors(['error' => 'Credenciales incorrectas.']);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Cierra sesión

        $request->session()->invalidate(); // Invalida la sesión actual
        $request->session()->regenerateToken(); // Regenera el token CSRF

        return redirect('/');
    }
}
