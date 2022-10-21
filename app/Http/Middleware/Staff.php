<?php

namespace App\Http\Middleware;

use Closure;

use App\Post;
use Illuminate\Support\Facades\Gate;

class Staff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Gate::allows('isStaff')) {
            return $next($request);
        }else{
            abort('403');
        }
    }
}