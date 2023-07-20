<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Maintenance
{

    public function handle($request, Closure $next)
    {
        
       if(get_setting('is_maintenance') == 1){
        return redirect(route('front.maintenance'));
       }
       return $next($request);
    }
}
