<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aktivasi extends Model
{
    protected $table = 'aktivasi';

    protected $fillable = ['user_id', 'tanggal', 'kode', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
