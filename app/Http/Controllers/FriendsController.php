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
        $friendUsernames = auth()->user()->getFriends();
        $friends = [];

        foreach($friendUsernames as $friendUsername) {
            $user = User::where('username', $friendUsername)->first();
            array_push($friends, $user);
        }

        return view('friends', ['friendRequests' => $friendRequests, 'friends' => $friends]);
    }

    public function sendFriendRequest(Request $request) {
        FriendRequest::create([
            'from' => auth()->user()->username,
            'to' => $request->input('to'),
        ]);
    }

    public function acceptFriendRequest(Request $request) {
        $friendRequest = FriendRequest::where('id', $request->input('id'))->first();

        $from = User::where('username', $friendRequest->from)->first();
        $to = User::where('username', $friendRequest->to)->first();

        $from->friends .= $to->username . ';';
        $to->friends .= $from->username . ';';

        $friendRequest->status = 'accepted'; 

        $from->save();
        $to->save();
        $friendRequest->save();
    }

    public function refuseFriendRequest(Request $request) {
        $friendRequest = FriendRequest::where('id', $request->input('id'))->first();
        $friendRequest->status = 'refused'; 
        $friendRequest->save();
    }

    public function removeFriend(Request $request) {
        $friend = User::where('username', $request->input('username'))->first();

        $friends = auth()->user()->getFriends();
        $friends = array_diff($friends, [$friend->username]);
        $friends = implode(";", $friends);
        auth()->user()->friends = $friends;
        auth()->user()->save();

        $friends = $friend->getFriends();
        $friends = array_diff($friends, [auth()->user()->username]);
        $friends = implode(";", $friends);
        $friend->friends = $friends;
        $friend->save();
    }
}