<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Message;
use App\FriendRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FriendsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $friendRequests = FriendRequest::where('to', auth()->user()->username)->latest()->get();

        return view('friends', ['friendRequests' => $friendRequests]);
    }

    public function sendFriendRequest(Request $request) {
        FriendRequest::create([
            'from' => auth()->user()->username,
            'to' => $request->input('to'),
        ]);
    }

    public function acceptFriendRequest(Request $request) {
        $friendRequest = FriendRequest::where('id', $request->input('id'))->first();
        $friendRequest->status = 'accepted'; 
        $friendRequest->save();
    }

    public function refuseFriendRequest(Request $request) {
        $friendRequest = FriendRequest::where('id', $request->input('id'))->first();
        $friendRequest->status = 'refused'; 
        $friendRequest->save();
    }
}