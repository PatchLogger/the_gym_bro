<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Response;

class OutputBufferMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        ob_start(); // Start output buffering

        $response = $next($request); // Proceed with the request

        // Check if a redirection is needed
        if ($response->isRedirect()) {
            ob_end_flush(); // Flush the output buffer and send it to the browser
            return $response;
        }

        ob_end_clean(); // Clean the output buffer without sending it

        return $response;
    }
}
