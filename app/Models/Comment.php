<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   protected $table = "comment";
   public function diadiem(){
      return $this->belongsTo('App\Models\DiaDiem','idDiaDiem','id');
   }

   public function user(){
      return $this->belongsTo('App\Models\User','idUser','id');
   }
}
