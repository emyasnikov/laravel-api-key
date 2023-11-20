<?php

namespace Emyasnikov\LaravelApiKey;

use Closure;
use Illuminate\Http\Request;

class ApiKeyMiddleware
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
        $api_key = config('api_key.key');

        if (!$api_key) {
            return $next($request);
        }

        $header = $request->header(config('api_key.header'));
        $param = $request->get(config('api_key.param'));

        if ($header == $api_key || $param == $api_key) {
            return $next($request);
        }

        return response()->json([
            'message' => 'Unauthorized',
        ], 401);
    }
}
