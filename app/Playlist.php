<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Playlist extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'playlist';

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id', 'id');
    }
}
