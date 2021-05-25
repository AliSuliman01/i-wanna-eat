<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HashingPassword
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
        $json = $request->json() ;
        $json->has('password') ? $json->set('password',Hash::make($json->get('password'))):null;
        return $next($request);
    }
}
