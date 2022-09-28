<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $guarded = [];

    public function getAuthor() {
        $user = User::where('username', $this->author)->first();

        return $user;
    }

    public function getCreationDate() {
        $date = Carbon::parse($this->attributes['created_at'])->isoFormat('DD-MM-YYYY');

        return $date;
    }

    public function getCreationTime() {
        $date = Carbon::parse($this->attributes['created_at'])->isoFormat('HH:mm');

        return $date;
    }
}