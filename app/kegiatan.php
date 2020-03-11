<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    protected $primaryKey = 'id_kegiatan';
    public function kelurahan(){
        return $this->belongsTo('App\kelurahan');
    }
}
