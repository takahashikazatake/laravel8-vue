<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $name) {
        $user = User::where('name', $name)->first();

        $articles = $user->articles->sortByDesc('created_at');

        return view('users.show', ['user' => $user, 'articles' => $articles]);
    }

    public function edit(string $name) {
        $user = User::where('name', $name)->first();

        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, string $name) {
        $user = User::where(['name' => $name])->first();
        $user->description = $request->description;
        $user->save();
        return redirect()->route('users.show', ['name' => $name]);
    }
}
