<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MonAn extends Model
{
    protected $table = "monan";
    public function diadiem(){
       return $this->belongsTo('App\Models\DiaDiem','idDiaDiem','id');
    }
}
