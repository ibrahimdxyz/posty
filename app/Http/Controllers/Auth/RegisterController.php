<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.register');
    }

    
    public function store(Request $request) 
    {
        // 1.validate request
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        // 2.store the user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            // hash the password in order not to save it as plain text
            'password' => Hash::make($request->password)            
        ]);

        // Note: duplicate code. Maybe make a login service?
        // 3. login
        Auth::attempt($request->only('email', 'password'));
    
        // 4.redirect
        return redirect()->route('dashboard');
    }
}
