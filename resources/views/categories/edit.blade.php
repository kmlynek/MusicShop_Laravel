@extends('layouts.main')

@section('content')
    <h2>Edytuj kategorię</h2>

    <form method="POST" action="/categories/update/{{ $category->id }}">
        @csrf
        <div class="mb-3">
            <label>Nazwa</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <div class="mb-3">
            <label>Opis</label>
            <textarea name="description" class="form-control">{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        <a href="/categories" class="btn btn-secondary">Anuluj</a>
    </form>
@endsection
