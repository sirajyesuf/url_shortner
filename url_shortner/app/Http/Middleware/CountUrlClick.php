<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountUrlClick
{
    
    public function handle(Request $request, Closure $next): Response
    {
        // get the url  from the route parameter
        $url = $request->route('url');

        // increment the view the url
        $url->update([
            "views" => $url->views + 1
        ]);

        return $next($request);
    }
}
