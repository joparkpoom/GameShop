<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureRole
{
    public function handle(Request $request, Closure $next, string $role): Response|RedirectResponse
    {
        $user = $request->user();

        if (! $user || $user->role !== $role) {
            return $role === 'admin'
                ? redirect()->route('admin.login')
                : redirect()->route('user.login');
        }

        return $next($request);
    }
}
