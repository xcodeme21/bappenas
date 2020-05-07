<?php
namespace App\Http\Middleware;

use Closure, Auth;

class isDeputiMiddleware
{
    
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->id_level == 5){
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
