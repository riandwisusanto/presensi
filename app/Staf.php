<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    protected $fillable = ['user_id','lokasi_id','email','password','no_telp','nama', 'nip', 'alamat', 'jabatan','file'];
    protected $table = "staf";
    protected $primaryKey = 'id';

    public function lokasi(){ 
        return $this->belongsTo('App\Lokasi','lokasi_id');
    }
    public function user(){ 
        return $this->belongsTo('App\User','user_id');
    }
}
