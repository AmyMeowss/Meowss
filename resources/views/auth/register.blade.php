@extends('layouts.app')

@section('title', 'Login')

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

                    {{-- Email --}}
                    <div class="form-group mb-2">
                        <label for="email">Email (optional)</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="Email">
                        <small>This field is optional. Your email is only used for account recovery.</small>
                    </div>

                    {{-- Invite code --}}
                    <div class="form-group mb-2">
                        <label for="code">Invitation code</label>
                        <input class="form-control" type="text" name="code" id="code" placeholder="00000000-0000-0000-0000-000000000000">
                        <small>Our platform is invite only. Please enter your invitation code.</small>
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

                <hr />
                <h3>Don't have an invitation code?</h3>
                <p>Don't worry, you can join the waitlist by filling in this <a href="#TODO">quick form</a> :)</p>
            </div>
        </div>
    </div>
@endsection