<?php
namespace App\Http\Middleware;

use Closure, Auth;

class isPegawaiMiddleware
{
    
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->id_level == 2){
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
