@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container">
        <h1>Register at {{ config('app.name') }}</h1>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Register</h3>

                <!-- Error handling -->
                @include('shared.errors')

                <form action="{{ route('register') }}" method="post">
                    {{-- Username --}}
                    <div class="form-group mb-2">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" id="username" placeholder="Username">
                        <small>Your unique username. Lowercase letters / numbers / . / _ are accepted.</small>
                    </div>

                    {{-- Password --}}
                    <div class="form-group mb-2">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password_confirmation">Confirm password</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Password">
                    </div>

                    {{-- Submit --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create account</button>
                    </div>
                </form>

                <p>Already have an account? <a href="{{ route('login') }}">Login</a>!</p>
            </div>
        </div>
    </div>
@endsection