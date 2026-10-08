<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    private function ValidateUsername($input) {
        $regex = '/[a-z0-9]+/';
        return preg_match($regex, $input);
    }


    public function RegisterForm(Request $request) {
        // Validate
        $credentials = $request->validate([
            'username' => ['required', 'string', 'min:1', 'max:32', 'unique:users,username'],
            'password' => ['required', 'string', 'confirmed', 'min:8']
        ]);

        // Convert to lowercase
        $username = $credentials['username'];
        $username = strtolower($username);
        if (!ValidateUsername($username)) {
            return back()->withErrors([
                'username' => 'Username does not match requirements'
            ]);
        }

        // Verify username
        $exisingUser = User::where('username', '=', $username)->first();
        if ($exisingUser) {
            // Invalid code
            return back()->withErrors([
                'username' => 'Username is already taken'
            ]);
        }

        // Create new user
        $NewUser = new User;
        $NewUser['username'] = $username;
        $NewUser['nickname'] = $username;
        $NewUser['password'] = $credentials['password'];
        $NewUser->save();

        return back();
    }
}
