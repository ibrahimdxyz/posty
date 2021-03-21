<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }


    public function index() 
    {
        return view('auth.login');
    }

    public function store(Request $request) {

        // 1.validate request
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]); 

        // 2. login
        if (!Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        }
    
        // 4.redirect
        return redirect()->route('dashboard');
    }
}
