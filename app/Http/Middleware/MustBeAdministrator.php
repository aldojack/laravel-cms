<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdministrator
{
    /**
     * Hanle an incoming request
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->guest()){
            abort(Response::HTTP_FORBIDDEN);
        }

        if(auth()->user()->username !== 'aldojack'){
            abort(Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}