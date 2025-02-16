<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VisitorAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('visitor_id')) {
            return redirect()->route('visitor.login');
        }

        return $next($request);
    }
}

