<?php

namespace FzlxTech\LaravelWso2\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\JWK;
use Illuminate\Support\Facades\Http;

class ValidateWso2Token
{
    public function handle(Request $request, Closure $next)
    {
        $auth = $request->header('Authorization');

        if (!$auth || !str_starts_with($auth, 'Bearer ')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = substr($auth, 7);

        try {
            $jwks = Http::get(config('wso2.jwks_url'))->json();
            $decoded = JWT::decode($token, JWK::parseKeySet($jwks));
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Invalid token', 'message' => $e->getMessage()], 401);
        }

        $request->attributes->add(['wso2_user' => (array) $decoded]);
        return $next($request);
    }
}
