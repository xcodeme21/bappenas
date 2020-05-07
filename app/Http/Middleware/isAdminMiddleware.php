<?php
namespace App\Http\Middleware;

use Closure, Auth;

class isAdminMiddleware
{
    
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->id_level == 1){
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
