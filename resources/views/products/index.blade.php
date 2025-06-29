@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Lista produktów</h1>
    @auth
    @if(Auth::user()->is_admin)
    <a href="/products/create" class="btn btn-success mb-3">+ Dodaj produkt</a>
    @endif
    @endauth

</div>

<div class="row">
    @forelse($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text fw-bold">Cena: {{ $product->price }} zł</p>

                @auth
                @if(Auth::user()->is_admin)
                <a href="/products/edit/{{ $product->id }}" class="btn btn-primary btn-sm">Edytuj</a>
                <a href="/products/delete/{{ $product->id }}" class="btn btn-danger btn-sm"
                    onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?')">
                    Usuń
                </a>
                @endif
                @endauth


            </div>
        </div>
    </div>
    @empty
    <p class="text-muted">Brak produktów do wyświetlenia.</p>
    @endforelse
</div>
@endsection