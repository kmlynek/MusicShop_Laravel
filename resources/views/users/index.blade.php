@extends('layouts.main')

@section('content')
<h2>Użytkownicy</h2>

<table class="table">
    <thead>
        <tr>
            <th>Imię</th>
            <th>Email</th>
            <th>Rola</th>
            <th>Aktywny</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->is_admin ? 'Admin' : 'Użytkownik' }}</td>
            <td>{{ $user->is_active ? 'TAK' : 'NIE' }}</td>
            <td>
                <a href="/admin/users/edit/{{ $user->id }}" class="btn btn-primary btn-sm">Edytuj</a>
                @if($user->is_active && !$user->is_admin)
                    <a href="/admin/users/deactivate/{{ $user->id }}" class="btn btn-danger btn-sm"
                       onclick="return confirm('Dezaktywować użytkownika?')">Dezaktywuj</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
