<?php

namespace App\Http\Controllers;
use App\Models\DiaDiem;
use Illuminate\Http\Request;
use App\Models\VungMien;
use App\Models\User;
class HomeController extends Controller
{
    function home(){
        $diadiem = DiaDiem::orderBy('SoLuotXem','DESC')->take(3)->get();
        $vungmien = VungMien::all();
        return view('home.home',['vungmien'=>$vungmien,'DiaDiem'=>$diadiem]);
    }
    function search(Request $request){
        $vungmien = VungMien::all();
        $key = $request->search;
        $diadiem = DiaDiem::where('TieuDe','like',"%$key%")->orwhere('TomTat','like',"%$key%")->orwhere('NoiDung','like',"%$key%")->take(30)->paginate(10);
        return view('home.search',['DiaDiem'=>$diadiem,'key'=>$key,'vungmien'=>$vungmien]);
    }
   
    function view($id,$tacgia){
        $vungmien = VungMien::all();
        $diadiem = DiaDiem::find($id);
        $user = User::where('Ten','like',$tacgia)->first();
        $diadiemList= DiaDiem::where('idDacDiem',$diadiem->idDacDiem)->take(3)->get();
        // $diadiemList = DiaDiem::doesntHave('id',$id)->get();
        // $diadiemList = DiaDiem::whereDoesntHave($id, function (Builder $query) {
        //     $query->where('idDacDiem',$diadiem->idDacDiem);
        // })->take(3)->get();
        $diadiem->SoLuotXem = $diadiem->SoLuotXem + 1;
        $diadiem->save();
        return view('home.view',['DiaDiem'=>$diadiem,'vungmien'=>$vungmien,'user'=>$user,'diadiemList'=>$diadiemList]);
    }
    function DacDiemSearch($id){  
        $vungmien = VungMien::all(); 
        $noibat = DiaDiem::where('idDacDiem',$id)->orderBy('SoLuotXem','DESC')->take(3)->get();
        $diadiem = DiaDiem::where('idDacDiem',$id)->paginate(3);
        
        return view('home.dacdiem.search',['noibat'=>$noibat,'vungmien'=>$vungmien,'diadiem'=>$diadiem]);
    }
}
