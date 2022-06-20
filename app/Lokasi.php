<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lokasi;

class Lokasi extends Model
{
    protected $fillable = ['id', 'lokasi', 'longitude', 'latitude'];
    protected $table = "lokasi";
    protected $primaryKey = 'id';

    public function presensi(){
        return $this->hasMany('App\Presensi','lokasi_id');
    }
}
