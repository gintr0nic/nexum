<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Message extends Model
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

    public function getFrom() {
        $user = User::where('username', $this->from)->first();

        return $user;
    }
}