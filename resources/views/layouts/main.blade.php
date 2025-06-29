<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Sklep muzyczny' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Sklep Muzyczny</a>
            <ul class="navbar-nav ms-auto">
                @auth
                @if(Auth::user()->is_admin)
                <li class="nav-item"><a class="nav-link" href="/products">Produkty</a></li>
                <li class="nav-item"><a class="nav-link" href="/categories">Kategorie</a></li>
                <li class="nav-item"><a class="nav-link" href="/brands">Marki</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/users">Użytkownicy</a></li>
                @endif
                @endauth


                @auth
                <li class="nav-item">
                    <span class="nav-link">Witaj, {{ Auth::user()->name }}!</span>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                         <button class="nav-link btn btn-outline-danger ms-2">Wyloguj</button>
                    </form>
                </li>
                @else
                <li class="nav-item"><a class="nav-link" href="/login">Logowanie</a></li>
                <li class="nav-item"><a class="nav-link" href="/register">Rejestracja</a></li>
                @endauth
            </ul>

        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>