<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model
{
    protected $primaryKey = 'nama_kel';

    public function kegiatan(){
        return $this->hasMany('App\kegiatan');
    }
}
