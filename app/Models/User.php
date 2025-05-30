<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'registration_date',
        'is_admin',
        'phone_number',
        'plot_code',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
    public function plot()
    {
        return $this->belongsTo(Plot::class, 'plot_code', 'plot_code');
    }
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenera la sesión
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no son correctas.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Cierra sesión

        $request->session()->invalidate(); // Invalida la sesión actual
        $request->session()->regenerateToken(); // Regenera el token CSRF

        return redirect('/');
    }
    public function completedTasks()
    {
        return $this->hasMany(Task::class, 'completed_by');
    }
}
