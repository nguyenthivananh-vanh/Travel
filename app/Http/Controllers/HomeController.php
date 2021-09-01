<?php

namespace App\Http\Controllers;
use App\Models\DiaDiem;
use Illuminate\Http\Request;
use App\Models\VungMien;
class HomeController extends Controller
{
    function home(){
        $vungmien = VungMien::all();
        return view('home.home',['vungmien'=>$vungmien]);
    }
    function search(Request $request){
        $vungmien = VungMien::all();
        $key = $request->search;
        $diadiem = DiaDiem::where('TieuDe','like',"%$key%")->orwhere('TomTat','like',"%$key%")->orwhere('NoiDung','like',"%$key%")->take(30)->paginate(10);
        return view('home.search',['diadiem'=>$diadiem,'key'=>$key,'vungmien'=>$vungmien]);
    }
}
