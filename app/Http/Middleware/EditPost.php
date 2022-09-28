<?php

namespace App\Http\Middleware;

use Closure;

use App\Post;
use Illuminate\Support\Facades\Gate;

class EditPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $postid = $request->route()->parameters()['postid'];
        $post = Post::where('id', $postid)->first();

        if (Gate::allows('editPost', $post)) {
            return $next($request);
        }else{
            abort('403');
        }
    }
}