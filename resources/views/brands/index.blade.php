@extends('layouts.main')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Marki</h2>
    <a href="/brands/create" class="btn btn-success mb-3">+ Dodaj markę</a>
</div>
<form method="GET" action="/brands" class="mb-4 d-flex">
    <input type="text" name="q" class="form-control me-2" placeholder="Szukaj marki..." value="{{ request('q') }}">
    <button type="submit" class="btn btn-outline-primary">Szukaj</button>
</form>


    <table class="table table-striped">
        <thead><tr><th>Nazwa</th><th>Opis</th><th>Akcje</th></tr></thead>
        <tbody>
        @foreach($brands as $brand)
            <tr>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->description }}</td>
                <td>
                    <a href="/brands/edit/{{ $brand->id }}" class="btn btn-primary btn-sm">Edytuj</a>
                    <a href="/brands/delete/{{ $brand->id }}" class="btn btn-danger btn-sm"
                       onclick="return confirm('Usunąć markę?')">Usuń</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
