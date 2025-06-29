@extends('layouts.main')

@section('content')
    <h2>Dodaj markę</h2>

    <form method="POST" action="/brands">
        @csrf
        <div class="mb-3">
            <label>Nazwa</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Opis</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Zapisz</button>
        <a href="/brands" class="btn btn-secondary">Anuluj</a>
    </form>
@endsection
