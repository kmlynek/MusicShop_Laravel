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
                <li class="nav-item"><a class="nav-link" href="/products">Produkty</a></li>
                <li class="nav-item"><a class="nav-link" href="/categories">Kategorie</a></li>
                <li class="nav-item"><a class="nav-link" href="/brands">Marki</a></li>
                <li class="nav-item"><a class="nav-link" href="/login">Logowanie</a></li>
                <li class="nav-item"><a class="nav-link" href="/register">Rejestracja</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>