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

        // Find invitation
        $invitation = Invitation::where('code', '=', $credentials['code'])->first();
        if (!$invitation) {
            // Invalid code
            return back()->withErrors([
                'code' => 'Invalid invitation code given.'
            ]);
        }
        if ($invitation['isUsed'] == true) {
            // Invalid code
            return back()->withErrors([
                'code' => 'Invitation code has already been used.'
            ]);
        }

        // Create new user
        $NewUser = new User;
        $NewUser['username'] = $username;
        $NewUser['nickname'] = $username;
        $NewUser['email'] = $credentials['email'];
        $NewUser['password'] = $credentials['password'];
        $NewUser['invitation_id'] = $invitation['id'];
        $NewUser->save();

        // Update invitation
        $invitation['isUsed'] = true;
        $invitation['user_id'] = $NewUser['id'];
        $invitation->save();

        return back();
    }
}
