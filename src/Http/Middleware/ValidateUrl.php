<?php

namespace App\Http\Middleware;

use Closure;

class ValidateUrl
{
    public function handle($request, Closure $next)
    {
        // Lakukan validasi URL di sini
        $validUrls = [
            'GET /api/desa',
            'GET /api/desa/{id}',
            'POST /api/desa',
            'PUT /api/desa/{id}',
            'DELETE /api/desa/{id}',
        ];

        $currentUrl = $request->method() . ' ' . $request->path();

        if (!in_array($currentUrl, $validUrls)) {
            return response()->json(['error' => 'Invalid URL'], 400);
        }

        return $next($request);
    }
}
