<!-- Link Google Fonts e Font Awesome -->
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-darkblue shadow-sm">
    <div class="container-fluid">
        <!-- Logo e Link Home a Sinistra -->
        <a class="navbar-brand text-white d-flex align-items-center me-auto" href="{{ route('homepage') }}">
            <img src="{{ asset('/storage/images/navbar.png') }}" alt="logo" class="logo me-2">
            <span class="fw-bold" style="letter-spacing: 1px;">The Aulab Post</span>
        </a>
        <ul class="navbar-nav d-none d-lg-flex me-3">
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('homepage') }}">Home</a>
            </li>
        </ul>
        
        <!-- Toggler per Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenuto della Navbar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Link di autenticazione e link Navbar a Destra -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
                <!-- Link di autenticazione -->
                @guest
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('register') }}">Registrati</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('login') }}">Accedi</a>
                </li>
                @endguest
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ciao {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @if (Auth::user()->is_writer)
                            <li><a class="dropdown-item" href="{{ route('writer.dashboard') }}">Dashboard Writer</a></li>
                        @endif
                        @if (Auth::user()->is_revisor)
                            <li><a class="dropdown-item" href="{{ route('revisor.dashboard') }}">Dashboard Revisor</a></li>
                        @endif
                        @if (Auth::user()->is_admin)
                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                    @endif
                        <li>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Logout</a>
                        </li>
                        <form action="{{ route('logout') }}" method="POST" id="form-logout" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
                @endauth

                <!-- Link Inserisci un articolo, Lavora con noi, Tutti gli articoli -->
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('article.create') }}">Inserisci un articolo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-white" aria-current="page" href="{{ route('careers') }}">Lavora con noi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-white" aria-current="page" href="{{ route('article.index') }}">Tutti gli articoli</a>
                </li>

                <!-- Form di ricerca -->
                <li class="nav-item">
                    <form action="{{ route('article.search') }}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2 rounded-pill" type="search" name="query" placeholder="Cerca tra gli articoli..." aria-label="Search">
                        <button class="btn btn-outline-light rounded-pill d-flex align-items-center" type="submit">
                            <i class="fas fa-search" style="color: #ffffff; font-size: 16px;"></i>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>    