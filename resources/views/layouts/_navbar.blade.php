<div class="navbar bg-dark navbar-dark navbar-expand-sm">

    <div class="container-fluid">

        {{-- Navbar --}}
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link active">{{ config('app.name') }}</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">Feed</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">Discover</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="btn btn-primary">Post</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">[USERNAME]</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Notifications</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </li>
            @endauth
            @guest
                <li class="nav-item">
                <a href="#TODO" class="btn btn-secondary">Login</a>
            </li>
            @endguest
        </ul>

    </div>

</div>