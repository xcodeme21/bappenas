<?php
namespace App\Http\Middleware;

use Closure, Auth;

class isSekretarisMiddleware
{
    
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->id_level == 4){
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
