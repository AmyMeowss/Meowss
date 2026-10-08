<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();

        $posts = $user->posts()->orderBy('created_at', 'desc')->limit(10)->get();

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function CreatePost(Request $request) {
        $form = $request->validate([
            'content' => ['required', 'string', 'min:2', 'max:250']
        ]);

        // dd($form);

        $post = $request->user()->posts()->create([
            'content' => $form['content']
        ]);
        $post->save();
        return redirect('dashboard');
    }
}
