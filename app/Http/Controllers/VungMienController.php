<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VungMien;

class VungMienController extends Controller
{
    public function getList(){
        $vungmien = VungMien::all();
        return view('admin.vungmien.list',['vungmien'=>$vungmien]);
    }
}
