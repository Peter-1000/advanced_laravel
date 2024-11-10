<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param string $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next, $name)
    {
        if (auth()->user()->name != $name) {
            return response()->json('Un Authorized', Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
