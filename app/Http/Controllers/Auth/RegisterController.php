<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Plot;
use App\Models\User;
use Illuminate\Http\Request;



class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'phone_number' => 'nullable|string|max:15',
            'plot_code' => 'required|string|exists:plots,plot_code', // Asegura que el plot existe
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Encripta la contraseña
            'registration_date' => now(),
            'is_admin' => false, // Por defecto, no es administrador
            'phone_number' => $request->phone_number,
            'plot_code' => $request->plot_code,
        ]);

        return redirect()->route('index')->with('success', 'Usuario registrado correctamente.');
    }



}