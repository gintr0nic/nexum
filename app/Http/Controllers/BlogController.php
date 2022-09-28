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

    public function newPost(Request $request, $blogname) {
        Post::create([
            'blog' => $blogname,
            'author' => auth()->user()->username,
            'text' => $request->input('text'),
        ]);
    }

    public function deletePost(Request $request, $blogname, $postid) {
        Post::where('id', $postid)->first()->delete();
    }

    public function editPost(Request $request, $blogname, $postid) {
        $post = Post::where('id', $postid)->first();

        $post->text = $request->input('text');

        $post->save();
    }

    public function showNewBlogForm() {
        return view('newblog');
    }

    public function newBlog(Request $request) {
        $blog = Blog::create([
            'blogname' => $request->input('blogname'),
            'name' => $request->input('name'),
            'topic' => $request->input('topic'),
            'owner' => auth()->user()->username,
        ]);

        Post::create([
            'blog' => $blog->blogname,
            'author' => auth()->user()->username,
            'text' => $request->input('firstpost'),
        ]);

        return redirect('/blog/' . $blog->blogname);
    }
}