<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    // the naming is for consistency's sake
    public function store() {
        Auth::logout();
        return redirect()->route('home');
    }
}
