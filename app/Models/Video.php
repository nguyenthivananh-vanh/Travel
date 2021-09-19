<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = "video";
    public function diadiem(){
       return $this->belongsTo('App\Models\DiaDiem','idDiaDiem','id');
    }
 
}
