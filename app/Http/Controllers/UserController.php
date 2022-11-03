<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Message;
use App\FriendRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($username) {
        $user = User::where('username', $username)->first();

        return view('user', ['user' => $user]);
    }

    public function showEditForm() {
        return view('edit');
    }

    public function edit(Request $request) {
        $user = auth()->user();

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->sex = $request->input('sex');
        $user->birthdate = $request->input('birthdate');
        $user->city = $request->input('city');
        $user->address = $request->input('address');
        $user->bio = $request->input('bio');

        if($request->input('private') == null)
            $user->private = false;
        else
            $user->private = true;

        $user->save();
    }

    public function getMessages() {
        $user = auth()->user();

        $messages = Message::where('to', $user->username)->latest()->get();

        return view('messages', ['messages' => $messages]);
    }

    public function search(Request $request) {
        $query = $request->input('q');

        if(str_contains($query, "*") && str_ends_with($query, "*")) {
            $query = str_replace("*", "%", $query);
        }

        $users = User::whereRaw("concat(name, ' ', surname) like '" .$query. "' ")->get();

        return view('results', ['users' => $users]);
    }
}