<?php
namespace App\Http\Middleware;

use Closure, Auth;

class isKepalaMiddleware
{
    
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->id_level == 3){
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
