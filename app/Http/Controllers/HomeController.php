<?php

namespace App\Http\Controllers;
use App\Models\DiaDiem;
use Illuminate\Http\Request;
use App\Models\VungMien;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    function home(){
        $diadiem = DiaDiem::orderBy('SoLuotXem','DESC')->take(6)->get();
        $vungmien = VungMien::all();
        return view('home.home',['vungmien'=>$vungmien,'DiaDiem'=>$diadiem]);
    }
    function homeUser($id){
        $user = User::find($id);
        $diadiem = DiaDiem::orderBy('SoLuotXem','DESC')->take(6)->get();
        $vungmien = VungMien::all();
        return view('home.home',['vungmien'=>$vungmien,'DiaDiem'=>$diadiem,'user'=>$user]);
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
        $cmt = Comment::where('idDiaDiem',$id)->get();
        $diadiemList= DiaDiem::where('idDacDiem',$diadiem->idDacDiem)->take(3)->get();
        // $diadiemList = DiaDiem::doesntHave('id',$id)->get();
        // $diadiemList = DiaDiem::whereDoesntHave($id, function (Builder $query) {
        //     $query->where('idDacDiem',$diadiem->idDacDiem);
        // })->take(3)->get();
        $diadiem->SoLuotXem = $diadiem->SoLuotXem + 1;
        $diadiem->save();
        return view('home.view',['DiaDiem'=>$diadiem,'vungmien'=>$vungmien,'user'=>$user,'diadiemList'=>$diadiemList,'comment'=>$cmt]);
    }
    function viewUser($id,$tacgia,$idUser){
        $vungmien = VungMien::all();
        $diadiem = DiaDiem::find($id);
        $user = User::where('Ten','like',$tacgia)->first();
        $userLogin = User::find($idUser);
        $diadiemList= DiaDiem::where('idDacDiem',$diadiem->idDacDiem)->take(3)->get();
        $cmt = Comment::where('idDiaDiem',$id)->get();
        // $diadiemList = DiaDiem::doesntHave('id',$id)->get();
        // $diadiemList = DiaDiem::whereDoesntHave($id, function (Builder $query) {
        //     $query->where('idDacDiem',$diadiem->idDacDiem);
        // })->take(3)->get();
        $diadiem->SoLuotXem = $diadiem->SoLuotXem + 1;
        $diadiem->save();
        return view('home.view',['DiaDiem'=>$diadiem,'vungmien'=>$vungmien,'user'=>$user,'diadiemList'=>$diadiemList,'userLogin'=>$userLogin,'comment'=>$cmt]);
    }
    function DacDiemSearch($id){  
        $vungmien = VungMien::all(); 
        $noibat = DiaDiem::where('idDacDiem',$id)->orderBy('SoLuotXem','DESC')->take(3)->get();
        $diadiem = DiaDiem::where('idDacDiem',$id)->paginate(3);
        
        return view('home.dacdiem.search',['noibat'=>$noibat,'vungmien'=>$vungmien,'diadiem'=>$diadiem]);
    }
    function comment(Request $request,$idUser,$idDiaDiem){
        $vungmien = VungMien::all();
        $diadiem = DiaDiem::find($idDiaDiem);
        $user = User::where('Ten','like',$diadiem->TacGia)->first();
        $userLogin = User::find($idUser);
        $diadiemList= DiaDiem::where('idDacDiem',$diadiem->idDacDiem)->take(3)->get();
        $cmt = Comment::where('idDiaDiem',$idDiaDiem)->get();
        $comment = new Comment();
        $comment->idUser = $idUser;
        $comment->idDiaDiem = $idDiaDiem;
        $comment->NoiDung = $request->cmt;
        if($request->hasFile('hinhanh')){
            $file = $request->file('hinhanh');
            $tail = $file->getClientOriginalExtension();
            if($tail != 'jpg' && $tail != 'png' && $tail !='jpeg'){
                return view('home.view')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/comment/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }

            $file->move("upload/comment",$hinh);
           $comment->HinhAnh = $hinh;
        }else{
            $comment->HinhAnh = "";
        }
        $comment->save();
        return view('home.view',['DiaDiem'=>$diadiem,'vungmien'=>$vungmien,'user'=>$user,'diadiemList'=>$diadiemList,'userLogin'=>$userLogin,'comment'=>$cmt]);
    }
}
