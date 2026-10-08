@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <p>
            Welcome, <b>{{ $user->username }}!</b>
        </p>

        <h3>Feed</h3>
        <p>
            Your feed URL:
            <input type="text" class="form-control" disabled value="{{ route('home') }}" readonly>
        </p>

        <h3>Posts</h3>
        <h4>Create post</h4>
        <form action="{{ route('dashboard.createpost') }}" method="post">
            @csrf
            <textarea class="form-control mb-2" name="content" id="content" cols="30" rows="3" maxlength="250" placeholder="Post content (max 250 characters)"></textarea>
            <button type="submit" class="btn btn-primary">Create post</button>
        </form>

        <h4>Recent posts:</h4>
        <ul  class="font-monospace">
            @foreach ($posts as $post)
                <li>
                    <b>[{{ $post->created_at }}]</b> {{ $post->content }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection