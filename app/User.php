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

    public function isFriendOf($username) {
        return false; // TO DO
    }
}
