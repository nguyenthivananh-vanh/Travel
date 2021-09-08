<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VungMien;
use App\Models\DacDiem;

class AjaxController extends Controller
{
    public function getDacDiem($idvm){
        $dacdiem  = DacDiem::where('idVungMien',$idvm)->get();
        foreach($dacdiem as $dd)
        {
            echo "<option value='".$dd->id."'>".$dd->Ten."</option>";
        }
    }
}
