<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
 
class IsAmdin
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
        // dd($request->user()->type);
        if ($request->user()->type == 'regular') {
            // redirect to regular user view
            return redirect()->route('userDashboard');
        }
        return $next($request);
    }
}
