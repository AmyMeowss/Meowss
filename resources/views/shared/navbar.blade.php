<div class="navbar bg-dark navbar-dark navbar-expand-sm mb-2">

    <div class="container-fluid">

        {{-- Navbar --}}
        @guest
        <!-- Guest nav -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link active">{{ config('app.name') }}</a>
            </li>
        </ul>
        <ul class="navbar-nav">
                <li class="nav-item">
                <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
            </li>
        </ul>
        @endguest

        @auth
        <!-- Authenticated nav -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link active">{{ config('app.name') }}</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">Posts</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">Settings</a>
            </li>
        </ul>
        @endauth

    </div>

</div>