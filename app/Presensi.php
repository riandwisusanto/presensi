<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presensi;
use App\User;

class Presensi extends Model
{
    protected $fillable = ['user_id', 'time_out', 'time_in', 'status', 'note', 'date'];
    protected $table = "presensi";
    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

}
