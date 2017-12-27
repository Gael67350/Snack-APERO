<?php

namespace App\Http\Middleware;

use Auth;
use Closure;


class AuthenticatedAsAdmin {

    public function handle($request, Closure $next) {
        if (!Auth::user()->isAdmin()) {
            return redirect(route('home'));
        }

        return $next($request);
    }
}