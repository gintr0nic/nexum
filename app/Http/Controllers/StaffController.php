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

    public function userList() {
        $users = User::where('role', 'user')->latest()->get();

        return view('admin.userlist', ['users' => $users]);
    }

    public function blogList() {
        $blogs = Blog::all();

        return view('admin.bloglist', ['blogs' => $blogs]);
    }
}