<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FakeAuth extends Controller
{
    public function login()
    {
        return redirect(route('contacts.index'))->with('warning', 'Necessário estar logado');
    }

    public function fakeLogin()
    {
        $user = User::first();

        if ($user == null) {
            $user = User::factory()->create();
        }

        Auth::login($user);
        return redirect(route('contacts.index'))->with('success', 'Usuário logado');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('contacts.index'))->with('success', 'Usuário deslogado');
    }
}
