<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $accepted = collect($roles)
            ->flatMap(fn ($role) => preg_split('/[|,]/', $role))
            ->filter()
            ->values()
            ->all();

        if (! Auth::user()->hasRole($accepted)) {
            abort(403);
        }

        return $next($request);
    }
}
