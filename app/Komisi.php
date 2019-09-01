<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komisi extends Model
{
    protected $table = 'komisi';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
