<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HelloMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $hello = 'Hello! This is Middleware!!';
        $bye = 'Good-bye, Middleware...';
        $data = [
            'hello' => $hello,
            'bye' => $bye,
        ];
        $request->merge($data);
        return $next($request);
    }
}
