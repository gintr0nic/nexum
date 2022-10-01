<?php

namespace App\Http\Middleware;

use Closure;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Gate;

class SendFriendRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $to = User::where('username', $request->input('to'))->first();

        if (Gate::allows('sendFriendRequest', $to)) {
            return $next($request);
        }else{
            abort('403');
        }
    }
}