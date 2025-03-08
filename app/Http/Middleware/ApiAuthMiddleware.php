<?php

namespace App\Http\Middleware;



use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // ✅ ทำงานเฉพาะ `/api/` เท่านั้น
        if (!str_starts_with($request->getPathInfo(), '/api/')) {
            return $next($request);
        }

        $apiUser = env('API_USER');
        $apiPassword = env('API_PASSWORD');

        $user = $request->header('API-USER');
        $password = $request->header('API-PASSWORD');

        if ($user !== $apiUser || $password !== $apiPassword) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
