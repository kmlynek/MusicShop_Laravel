@extends('layouts.main')

@section('content')

@auth
<h2>Witaj ponownie, {{ Auth::user()->name }}!</h2>
@if(Auth::user()->is_admin)
<p>Możesz zarządzać całym asortymentem!</p>
@else
<p>Możesz korzystać ze sklepu i przeglądać aktualne produkty.</p>
@endif


<div class="row gy-3">
    <div class="col-md-4">
        <a href="/products" class="text-decoration-none">
            <div class="card">
                <div class="card-body">
                    <p class="card-title h5 text-black clearfix">Produkty</p>
                </div>
            </div>
        </a>
    </div>

    @if(Auth::user()->is_admin)
    <div class="col-md-4">
        <a href="/categories" class="text-decoration-none">
            <div class="card">
                <div class="card-body">
                    <p class="card-title h5">Kategorie</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="/brands" class="text-decoration-none">
            <div class="card">
                <div class="card-body">
                    <p class="card-title h5">Marki</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="/admin/users" class="text-decoration-none">
            <div class="card border-secondary">
                <div class="card-body">
                    <p class="card-title h5 ">Lista użytkowników</p>
                </div>
            </div>
        </a>
    </div>

    @endif
</div>

@else
<h2>Witaj w naszym sklepie muzycznym!</h2>
<p>Aby mieć dostęp do produktów - <a href="/register">zarejestruj się</a> lub <a href="/login">zaloguj</a>.</p>
@endauth

@endsection