<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Message;
use App\FriendRequest;
use App\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        return view('admin.admin');
    }

    public function info() {
        $users = User::where('role', 'user')->latest()->get();
        $blogs = Blog::all();

        return view('admin.info', ['users' => $users, 'blognumber' => count($blogs)]);
    }

    public function friendList(Request $request, $username) {
        $user = User::where('username', $username)->get()->first();

        $friends = $user->getFriendsUsers();

        return view('admin.friendlist', ['friends' => $friends, 'user' => $user]);
    }

    public function manageStaff() {
        $members = User::where('role', 'staff')->get();

        return view('admin.managestaff', ['members' => $members]);
    }

    public function removeStaff(Request $request) {
        $user = User::where('username', $request->input('username'))->first();

        $user->delete();
    }

    protected function createStaff(array $data)
    {
        return User::create([
            'role' => 'staff',
            'username' => $data['username'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'birthdate' => $data['birthdate'],
            'address' => $data['address'],
            'city' => $data['city'],
            'bio' => $data['bio'],
            'sex' => $data['sex'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function registerStaff(Request $request)
    {
        $this->staffValidator($request->all())->validate();

        $user = $this->createStaff($request->all());

        return $this->manageStaff();
    }

    protected function staffValidator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date', 'max:255'],
            'sex' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        return $validator;
    }
}