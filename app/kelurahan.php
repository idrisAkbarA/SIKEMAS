<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model
{
    public function kegiatan(){
        return $this->hasMany('App\kegiatan');
    }
}
