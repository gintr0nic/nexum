<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'username', 'sex', 'birthdate', 'address', 'city', 'bio', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getBirthdate() {
        return Carbon::parse($this->birthdate)->isoFormat('d-M-Y');
    }

    public function getSignupDate() {
        return Carbon::parse($this->created_at)->isoFormat('d-M-Y');
    }

    public function getBlogs() {
        $blogs = Blog::where('owner', $this->username)->get();

        return $blogs;
    }

    public function isStaff() {
        return $this->attributes['role'] == 'staff';
    }

    public function isAdmin() {
        return $this->attributes['role'] == 'admin';
    }

    public function isPrivate() {
        return $this->attributes['private'];
    }

    public function getFriends() {
        $friends = explode(";", $this->attributes['friends']);
        array_pop($friends);

        return $friends;
    }

    public function getFriendsUsers() {
        $users = [];
        $friends = $this->getFriends();

        foreach($friends as $friend) {
            $user = User::where('username', $friend)->get()->first();
            array_push($users, $user);
        }

        return $users;
    }

    public function isFriendOf($username) {
        $friends = $this->getFriends();
    
        return in_array($username, $friends);
    }

    public function getReceivedRequests() {
        $requests = FriendRequest::where('to', $this->username)->get();

        return count($requests);
    }

    public function getAcceptedRequests() {
        $requests = FriendRequest::where('to', $this->username)->where('status', 'accepted')->get();

        return count($requests);
    }

    public function getRefusedRequests() {
        $requests = FriendRequest::where('to', $this->username)->where('status', 'refused')->get();

        return count($requests);
    }

    public function getPendingRequests() {
        $requests = FriendRequest::where('to', $this->username)->where('status', 'pending')->get();

        return count($requests);
    }
}
