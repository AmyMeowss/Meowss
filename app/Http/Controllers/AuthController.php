<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Invitation;

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

    // Register
    public function RegisterPage() {
        return view('auth.register');
    }

    public function RegisterForm(Request $request) {
        // Validate
        $credentials = $request->validate([
            'username' => ['required', 'string', 'min:1', 'max:32', 'unique:users,username'],
            'email' => ['nullable', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
            'code' => ['required', 'uuid']
        ]);

        // Convert to lowercase
        $username = $credentials['username'];
        $username = strtolower($username);

        // Verify username
        // TODO: verify if it meets the requirements

        // Create new user
        $NewUser = User::create([
            'username' => $username,
            'nickname' => $username,
            'email' => $credentials['email'],
            'password' => $credentials['password']
        ]);
    }
}
