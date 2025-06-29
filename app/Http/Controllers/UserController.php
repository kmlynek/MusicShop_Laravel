<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Lista użytkowników
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Formularz edycji
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Zapis edycji
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email', 'is_active']));

        return redirect('/admin/users');
    }

    // Dezaktywacja
    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = false;
        $user->save();

        return redirect('/admin/users');
    }
}
