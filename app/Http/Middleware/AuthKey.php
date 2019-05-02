<?php

namespace App\Http\Middleware;

use App\Http\Response;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        try {
            // Verificar app key y Token
            $app_key = $request->header('APP_KEY');
            $token = $request->header('Authorization');
            $apy = JWTAuth::getPayload($token)->toArray();
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            $resp = ['ok' => false, "mssg" => 'token_expired'];
            return response()->json($resp, 500);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            $resp = ['ok' => false, "mssg" => 'token_invalid'];
            return response()->json($resp, 500);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            $resp = ['ok' => false, "mssg" => 'Authorization: a token_is_required'];
            return response()->json($resp, 500);
        }
        return $next($request);
    }
}
