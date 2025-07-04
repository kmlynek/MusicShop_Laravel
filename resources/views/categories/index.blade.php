@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Kategorie produktów</h2>
    <a href="/categories/create" class="btn btn-success mb-3">+ Dodaj kategorię</a>
</div>
<form method="GET" action="/categories" class="mb-4 d-flex">
    <input type="text" name="q" class="form-control me-2" placeholder="Szukaj kategorii..." value="{{ request('q') }}">
    <button type="submit" class="btn btn-outline-primary">Szukaj</button>
</form>

    <table class="table table-striped">
        <thead><tr><th>Nazwa</th><th>Opis</th><th>Akcje</th></tr></thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="/categories/edit/{{ $category->id }}" class="btn btn-primary btn-sm">Edytuj</a>
                    <a href="/categories/delete/{{ $category->id }}" class="btn btn-danger btn-sm"
                       onclick="return confirm('Usunąć wybraną kategorię?')">Usuń</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
