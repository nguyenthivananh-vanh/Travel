<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VungMien;
class HomeController extends Controller
{
    function home(){
        $vungmien = VungMien::all();
        return view('home.home',['vungmien'=>$vungmien]);
    }
}
