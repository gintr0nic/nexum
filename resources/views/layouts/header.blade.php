<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/logo.svg') }}" class="d-inline-block align-top" width="30" height="30">
            Nexum
        </a>

        <ul class="navbar-nav me-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#regolamento">Regolamento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#contatti">Contatti</a>
                </li>
            @endguest

            @auth

                @cannot('isStaffOrAdmin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user', ['username' => Auth::user()->username]) }}">Profilo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#contatti">Messaggi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('friends') }}">Amici</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('newBlog') }}">Crea un nuovo blog</a>
                    </li>
                @endcannot

                @can('isStaffOrAdmin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin') }}">Pannello di amministrazione</a>
                    </li>
                @endcannot
            @endauth
        </ul>

        <div class="d-flex">
            <ul class="navbar-nav">
                @guest
                    <button type="button" onclick="location.href='{{ route('login') }}'"
                        class="btn btn-outline-light mx-1">Login</button>
                    <button type="button" onclick="location.href='{{ route('register') }}'"
                        class="btn btn-light mx-1">Registrati</button>
                @endguest

                @auth
                    <button type="button" onclick="location.href='{{ route('logout') }}'"
                        class="btn btn-outline-light mx-1">Logout</button>
                @endauth
            </ul>
        </div>
    </div>
</nav>
