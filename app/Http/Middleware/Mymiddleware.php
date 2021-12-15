<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class Mymiddleware
{
    public function testware(Request $request,Response $response, Closure $next)
    {
        $response = $next($request);			// perform action before handling request
        return $response;			// Perform action after handling request
    }
}
