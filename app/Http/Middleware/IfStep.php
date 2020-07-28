<?php

namespace App\Http\Middleware;

use App\Step;
use Closure;
use Illuminate\Support\Facades\Auth;

class IfStep
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Step::where('userId',Auth::user()->id)->count() > 0){
            return $next($request);
        }
        return abort(403, 'Unauthorized action.');

    }
}
