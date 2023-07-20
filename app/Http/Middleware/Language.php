<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Session;
use App\Models\Language as Local;
use Illuminate\Http\Request;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $language = Local::where('is_default', 1)->first();
        
        if(Session::has('locale')){
            $locale = Session::get('locale');
        }
        else{
            $locale = $language->code;
        }

        App::setLocale($locale);
        $request->session()->put('locale', $locale);

        return $next($request);
    }
}
