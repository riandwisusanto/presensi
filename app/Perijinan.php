<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Perijinan;
use App\User;

class Perijinan extends Model
{
    protected $fillable = ['user_id', 'izin', 'tanggal', 'jam', 'tujuan', 'date'];
    protected $table = "perijinan";
    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
