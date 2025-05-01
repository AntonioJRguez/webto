<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    public function update(Request $request, $id)
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

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
