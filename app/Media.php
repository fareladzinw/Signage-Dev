<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id', 'id');
    }
}
