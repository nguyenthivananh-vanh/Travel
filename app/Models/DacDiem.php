<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DacDiem extends Model
{
    protected $table = "dacdiem";
    public function vungmien(){
        return $this->belongsTo('App\Models\VungMien','idVungMien','id');
    }
    public function diadiem(){
        return $this->hasMany('App\Models\DiaDiem','idDacDiem','id');
    }
}
