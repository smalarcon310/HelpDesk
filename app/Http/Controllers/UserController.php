<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()->latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = ['admin', 'tecnico', 'usuario'];
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required', 'in:admin,tecnico,usuario'],
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('users.index')->with('success', 'Usuario creado.');
    }

    public function edit(User $user)
    {
        $roles = ['admin', 'tecnico', 'usuario'];
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
            'role' => ['required', 'in:admin,tecnico,usuario'],
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Usuario desactivado.');
    }

    public function restore($id)
    {
        User::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Usuario restaurado.');
    }
}
