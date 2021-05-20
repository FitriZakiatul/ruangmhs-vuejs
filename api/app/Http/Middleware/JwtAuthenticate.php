<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class JwtAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->hasHeader('Authorization'))
            return response()->json([
                'code' => 401,
                'data' => null,
                'message' => 'Token tidak valid!',
                'success' => false,
            ]);

        $authorization = $request->header('Authorization');
        $prefix = strpos('Bearer ', $authorization) !== -1;
        $token = str_replace('Bearer ', '', $authorization);

        if (!$prefix)
            return response()->json([
                'code' => 403,
                'data' => null,
                'message' => 'Format token tidak valid!',
                'success' => false,
            ]);

        $key = config('services.jwt.secret');
        $payload = JWT::decode($token, $key, ['HS256']);
        if (!$payload->data)
            return response()->json([
                'code' => 403,
                'data' => null,
                'message' => 'Format token tidak valid!',
                'success' => false,
            ]);

        $request->user = $payload->data;

        return $next($request);
    }
}
