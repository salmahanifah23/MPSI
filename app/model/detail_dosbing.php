<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class detail_dosbing extends Model
{
    //
    protected $table='detail_dosbing';
    protected $fillable = ['id_rancangan'];
    
    public function rancangan()
    {
        return $this->belongsTo( Rancangan::class, 'id_rancangan', 'id');
    }
    public function dosen()
    {
        return $this->belongsTo(dosen::class, 'id_dosen', 'id');
    }
}
