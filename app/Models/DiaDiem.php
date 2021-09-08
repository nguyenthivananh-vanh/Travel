<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaDiem extends Model
{
    protected $table = "diadiem";

    public function dacdiem(){
        return $this->belongsTo('App\Models\DacDiem','idDacDiem','id');
    }

    public function comment(){
        return $this->hasMany('App\Models\Comment','idDiaDiem','id');
    }
}
