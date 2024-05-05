<?php

namespace App\Http\Middleware;

use App\Models\ApiKey;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->apiKeyInput;

        if (!$apiKey || !ApiKey::where('key', $apiKey)->exists()) {
            return response()->json(['error' => 'Unauthorized. Invalid API key.'], 401);
        }

        return $next($request);
    }
}
