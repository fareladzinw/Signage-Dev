<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = 'request';

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id', 'id');
    }
}
