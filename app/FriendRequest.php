<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class FriendRequest extends Model
{
    protected $guarded = [];

    public function getCreationDate() {
        $date = Carbon::parse($this->attributes['created_at'])->isoFormat('DD-MM-YYYY');

        return $date;
    }

    public function getCreationTime() {
        $date = Carbon::parse($this->attributes['created_at'])->isoFormat('HH:mm');

        return $date;
    }

    public function getUpdatedDate() {
        $date = Carbon::parse($this->attributes['updated_at'])->isoFormat('DD-MM-YYYY');

        return $date;
    }

    public function getUpdatedTime() {
        $date = Carbon::parse($this->attributes['updated_at'])->isoFormat('HH:mm');

        return $date;
    }

    public function getUser() {
        $user = User::where('username', $this->from)->first();

        return $user;
    }
}