<?php

namespace App\Http\Middleware;

use Closure;

use App\Post;
use Illuminate\Support\Facades\Gate;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Gate::allows('isStaffOrAdmin')) {
            return $next($request);
        }else{
            abort('403');
        }
    }
}