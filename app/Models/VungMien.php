<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VungMien extends Model
{
    protected $table = "vungmien";
   

    public function dacdiem(){
        return $this->hasMany('App\Models\DacDiem','idVungMien','id');
    }

    public function diadiem(){
        return $this->hasManyThrough('App\Models\DiaDiem','App\DacDiem','idVungMien','idDacDiem','id');
    }
}
