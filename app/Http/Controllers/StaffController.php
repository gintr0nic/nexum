<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Message;
use App\FriendRequest;
use App\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StaffController extends Controller {

    public function __construct() {
        $this->middleware('staff');
    }

    public function index() {
        return view('admin.admin');
    }

    public function userList() {
        $users = User::where('role', 'user')->latest()->get();

        return view('admin.userlist', ['users' => $users]);
    }

    public function blogList() {
        $blogs = Blog::all();

        return view('admin.bloglist', ['blogs' => $blogs]);
    }

    public function deleteBlog(Request $request, $blogname) {
        $blog = Blog::where('blogname', $blogname)->first();

        $blog->delete();
    }

    public function deletePost(Request $request, $blogname, $postid) {
        $post = Post::where('id', $postid)->first();

        $reason = 'Il tuo post sul blog ' . $blogname . ' è stato eliminato perchè: ' . $request->input('reason');

        Message::create([
            'from' => auth()->user()->username,
            'to' => $post->getAuthor()->username,
            'text' => $reason,
        ]);

        $post->delete();
    }
}