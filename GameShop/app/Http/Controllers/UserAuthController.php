<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserAuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.user-login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt([...$credentials, 'role' => 'user'], $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'Invalid frontend credentials.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->route('user.dashboard');
    }

    public function dashboard(): View
    {
        return view('user.dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.login');
    }
}
