<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Message;
use App\FriendRequest;
use App\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($blogname) {
        $blog = Blog::where('blogname', $blogname)->first();

        return view('blog', ['blog' => $blog]);
    }

    public function post(Request $request, $blogname) {
        Post::create([
            'blog' => $blogname,
            'author' => auth()->user()->username,
            'text' => $request->input('text'),
        ]);
    }
}