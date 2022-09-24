<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/logo.svg') }}" class="d-inline-block align-top" width="30" height="30">
            Nexum
        </a>
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}#features">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}#regolamento">Regolamento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}#contatti">Contatti</a>
            </li>
        </ul>
        <div class="d-flex">
            <ul class="navbar-nav">
                <button type="button" onclick="location.href='{{ route('login') }}'" class="btn btn-outline-light mx-1">Login</button>
                <button type="button" class="btn btn-light mx-1">Registrati</button>
            </ul>
        </div>
    </div>
</nav>