@extends('layouts.main')

@section('content')
<h2>Edytuj użytkownika</h2>

<form method="POST" action="/admin/users/update/{{ $user->id }}">
    @csrf
    <div class="mb-3">
        <label>Imię:</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
    </div>

    <div class="mb-3">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
    </div>

    <div class="mb-3">
        <label>Aktywny:</label>
        <select name="is_active" class="form-select">
            <option value="1" {{ $user->is_active ? 'selected' : '' }}>Tak</option>
            <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Nie</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Zapisz zmiany</button>
    <a href="/admin/users" class="btn btn-secondary">Anuluj</a>
</form>
@endsection
