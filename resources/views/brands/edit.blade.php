@extends('layouts.main')

@section('content')
    <h2>Edytuj nazwę marki</h2>

    <form method="POST" action="/brands/update/{{ $brand->id }}">
        @csrf
        <div class="mb-3">
            <label>Nazwa</label>
            <input type="text" name="name" class="form-control" value="{{ $brand->name }}" required>
        </div>
        <div class="mb-3">
            <label>Opis</label>
            <textarea name="description" class="form-control">{{ $brand->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        <a href="/brands" class="btn btn-secondary">Anuluj</a>
    </form>
@endsection
