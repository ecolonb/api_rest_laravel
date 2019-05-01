<?php

namespace App\Http\Middleware;

use App\Http\Response;
use Closure;

class AuthKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('APP_KEY');
        if ($token != 'abcd123') {
            return response()->json(['ok' => false, 'message' => 'App key not found!'], 401);
        }
        return $next($request);
    }
}
