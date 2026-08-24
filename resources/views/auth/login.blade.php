@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container">
        <h1>Login at {{ config('app.name') }}</h1>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Login</h3>

                <!-- Error handling -->
                @include('shared.errors')

                <form action="{{ route('login') }}" method="post">
                    {{-- Username --}}
                    <div class="form-group mb-2">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" id="username" placeholder="Username">
                    </div>

                    {{-- Password --}}
                    <div class="form-group mb-2">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                    </div>

                    {{-- Submit --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection