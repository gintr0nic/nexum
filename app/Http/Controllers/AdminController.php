<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Message;
use App\FriendRequest;
use App\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        return view('admin.admin');
    }
}