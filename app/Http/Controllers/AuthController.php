<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Login form
    public function LoginPage() {
        return view('auth.login');
    }

    public function LoginForm(Request $request) {
        // Validate
        $credentials = $request->validate([
            'username' => ['required', 'string', 'min:1', 'max:32'],
            'password' => ['required', 'string']
        ]);
        
        $AuthAttempt = Auth::attempt($credentials);
        if ($AuthAttempt) {
            // Login OK
            $request->session()->regenerate();

            return redirect()->intended('feed');
        }

        return back()->withErrors([
            'email' => 'Invalid username/password'
        ]);
    }
}
