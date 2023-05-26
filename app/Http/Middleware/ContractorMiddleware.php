<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContractorMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth()->user();
        if($user && $user->hasRole('contractor')){
            return $next($request);
        }
        else{
            return redirect()->route('dashboard');
        }
    }
}

