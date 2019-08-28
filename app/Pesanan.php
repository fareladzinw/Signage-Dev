<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    public function paket()
    {
        return $this->belongsTo('App\Paket');
    }
}
