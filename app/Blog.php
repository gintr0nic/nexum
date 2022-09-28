<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Blog extends Model
{
    protected $guarded = [];

    public function getPosts() {
        $posts = Post::where('blog', $this->blogname)->latest()->get();

        return $posts;
    }

    public function getOwner() {
        $user = User::where('username', $this->owner)->first();

        return $user;
    }

    public function getCreationDate() {
        $date = Carbon::parse($this->attributes['created_at'])->isoFormat('DD-MM-YYYY');

        return $date;
    }
}
