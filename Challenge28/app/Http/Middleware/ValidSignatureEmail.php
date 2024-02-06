<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
 
class ValidSignatureEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $relative
     * @return \Illuminate\Http\Response
     *
     * 
     */
    public function handle($request, Closure $next, $relative = null)
    {
        if ($request->hasValidSignature($relative !== 'relative')) {
            return $next($request);
        }
        $email = explode("/", $request->getPathInfo())[2];

        return redirect()->route('expired')->with('email' , $email);
    }
}
