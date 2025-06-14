<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Plot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as RulesPassword;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $mp = [
            'name.required' => 'El nombre completo es obligatorio.',
            'name.string' => 'El nombre debe contener solo texto.',
            'name.max' => 'El nombre no puede exceder los 255 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.mixed' => 'La contraseña debe contener mayúsculas y minúsculas.',
            'password.letters' => 'La contraseña debe contener al menos una letra.',
            'password.numbers' => 'La contraseña debe contener al menos un número.',
            'password.symbols' => 'La contraseña debe contener al menos un símbolo.',
            'phone_number.string' => 'El teléfono debe contener solo ciertos caracteres.',
            'phone_number.max' => 'El número telefónico no puede exceder los 15 caracteres.',

            'plot_code.required' => 'El código de parcela es obligatorio.',
            'plot_code.string' => 'El código de parcela debe ser texto.',
            'plot_code.exists' => 'El código de parcela no existe en nuestro sistema.',
        ];

        $datosValidados = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                RulesPassword::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'phone_number' => 'nullable|string|max:15',
            'plot_code' => 'required|string|exists:plots,plot_code',
        ], $mp);

        User::create([
            'name' => $datosValidados['name'],
            'email' => $datosValidados['email'],
            'password' => $datosValidados['password'],
            'registration_date' => now(),
            'is_admin' => false,
            'phone_number' => $datosValidados['phone_number'],
            'plot_code' => $datosValidados['plot_code'],
        ]);

        return redirect()->route('index')
            ->with('success', '¡Registro exitoso! Ahora puedes iniciar sesión.');
    }
}
