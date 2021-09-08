<?php

namespace App\Http\Controllers;
use App\Models\DiaDiem;
use Illuminate\Http\Request;
use App\Models\VungMien;
use App\Models\DacDiem;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    function home(){
        $diadiem = DiaDiem::orderBy('SoLuotXem','DESC')->where('TrangThai',1)->take(6)->get();
        $vungmien = VungMien::all();
        return view('home.home',['vungmien'=>$vungmien,'DiaDiem'=>$diadiem]);
    }
    function homeUser($id){
        $user = User::find($id);
        $diadiem = DiaDiem::orderBy('SoLuotXem','DESC')->where('TrangThai',1)->take(6)->get();
        $vungmien = VungMien::all();
        return view('home.home',['vungmien'=>$vungmien,'DiaDiem'=>$diadiem,'user'=>$user]);
    }
    function search(Request $request){
        $vungmien = VungMien::all();
        $key = $request->search;
        $diadiem = DiaDiem::where('TieuDe','like',"%$key%")->orwhere('TomTat','like',"%$key%")->orwhere('NoiDung','like',"%$key%")->take(30)->paginate(10);
        return view('home.search',['DiaDiem'=>$diadiem,'key'=>$key,'vungmien'=>$vungmien]);
    }
    function searchUser(Request $request,$id){
        $vungmien = VungMien::all();
        $key = $request->search;
        $user = User::find($id);
        $diadiem = DiaDiem::where('TieuDe','like',"%$key%")->orwhere('TomTat','like',"%$key%")->orwhere('NoiDung','like',"%$key%")->take(30)->paginate(10);
        return view('home.search',['DiaDiem'=>$diadiem,'key'=>$key,'vungmien'=>$vungmien,'user'=>$user]);
    }
   
    function DacDiemSearch($id){  
        $vungmien = VungMien::all(); 
        $noibat = DiaDiem::where('idDacDiem',$id)->orderBy('SoLuotXem','DESC')->take(3)->get();
        $diadiem = DiaDiem::where('idDacDiem',$id)->paginate(3);
        
        return view('home.dacdiem.search',['noibat'=>$noibat,'vungmien'=>$vungmien,'diadiem'=>$diadiem]);
    }
    function DacDiemSearchUser($id,$idUser){  
        $vungmien = VungMien::all(); 
        $noibat = DiaDiem::where('idDacDiem',$id)->orderBy('SoLuotXem','DESC')->take(3)->get();
        $diadiem = DiaDiem::where('idDacDiem',$id)->paginate(3);
        $user = User::find($idUser);
        
        return view('home.dacdiem.search',['noibat'=>$noibat,'vungmien'=>$vungmien,'diadiem'=>$diadiem,'user'=>$user]);
    }
    function view($id,$tacgia){
        $vungmien = VungMien::all();
        $diadiem = DiaDiem::find($id);
        $userAuthor = User::where('Ten','like',$tacgia)->first();
        $cmt = Comment::where('idDiaDiem',$id)->get();
        $diadiemList= DiaDiem::where('idDacDiem',$diadiem->idDacDiem)->take(3)->get();
        // $diadiemList = DiaDiem::doesntHave('id',$id)->get();
        // $diadiemList = DiaDiem::whereDoesntHave($id, function (Builder $query) {
        //     $query->where('idDacDiem',$diadiem->idDacDiem);
        // })->take(3)->get();
        $diadiem->SoLuotXem = $diadiem->SoLuotXem + 1;
        $diadiem->save();
        return view('home.view',['DiaDiem'=>$diadiem,'vungmien'=>$vungmien,'userAuthor'=>$userAuthor,'diadiemList'=>$diadiemList,'comment'=>$cmt]);
    }
    function viewUser($id,$tacgia,$idUser){
        $vungmien = VungMien::all();
        $diadiem = DiaDiem::find($id);
        $userAuthor = User::where('Ten','like',$tacgia)->first();
        $user = User::find($idUser);
        $diadiemList= DiaDiem::where('idDacDiem',$diadiem->idDacDiem)->take(3)->get();
        $cmt = Comment::where('idDiaDiem',$id)->get();
        // $diadiemList = DiaDiem::doesntHave('id',$id)->get();
        // $diadiemList = DiaDiem::whereDoesntHave($id, function (Builder $query) {
        //     $query->where('idDacDiem',$diadiem->idDacDiem);
        // })->take(3)->get();
        $diadiem->SoLuotXem = $diadiem->SoLuotXem + 1;
        $diadiem->save();
        return view('home.view',['DiaDiem'=>$diadiem,'vungmien'=>$vungmien,'user'=>$user,'diadiemList'=>$diadiemList,'userAuthor'=>$userAuthor,'comment'=>$cmt]);
    }
    
    function comment(Request $request,$idUser,$idDiaDiem){
        $diadiem = DiaDiem::find($idDiaDiem);
        $user = User::find($idUser);
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
        return redirect('home/view/'.$idDiaDiem.'/'.$diadiem->TacGia.'/'.$idUser);
    }

    public function commentDelete($idcmt,$idDiaDiem,$tacgia,$idUser){
        $cmt = Comment::find($idcmt);
        $cmt->delete();
        return redirect('home/view/'.$idDiaDiem.'/'.$tacgia.'/'.$idUser);
    }

    // viết bài
    public function getReply($id){
        $vungmien = VungMien::all();
        $dacdiem = DacDiem::all();
        $user = User::find($id);
        return view('home.reply', ['vungmien' => $vungmien,'dacdiem' => $dacdiem,'user'=>$user]);
    }
    public function postReply(Request $request,$id){
        $this->validate($request,
            [
                'DacDiem' => 'required',
                'tieude' => 'required|unique:DiaDiem,TieuDe|min:3',
                'tomtat' => 'required',
                'hinhanh' => 'required',
                'noidung' => 'required',
            ],
            [
                'DacDiem.required' => 'Bạn chưa chọn đặc điểm',
                'tieude.required' => 'Bạn chưa nhập tiêu đề',
                'tieude.min' => 'Tiêu đề phải có độ dài ít nhất 3 ký tự',
                'tieude.unique' => 'Tiêu đề đã tồn tại',
                'tomtat.required' => 'Bạn chưa nhập tóm tắt',
                'hinhanh.required' => 'Bạn cần nhập ảnh chính cho bài viết',
                'noidung.required' => 'Bạn chưa nhập nội dung',
            ]);
        $diadiem = new DiaDiem;
        $diadiem->TieuDe = $request->tieude;
        $diadiem->TieuDeKhongDau = changeTitle($request->tieude);
        $diadiem->TomTat = $request->tomtat;
        $diadiem->NoiDung = $request->noidung;
        $diadiem->TacGia = $request->tacgia;

        $file = $request->file('hinhanh');
        $tail = $file->getClientOriginalExtension();
        if ($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg') {
            return redirect('home/reply')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
        }
        $name = $file->getClientOriginalName();
        $hinh = Str::random(4) . "_" . $name;
        while (file_exists("upload/diadiem/" . $hinh)) {
            $hinh = Str::random(4) . "_" . $name;
        }
        $file->move("upload/diadiem", $hinh);
        $diadiem->HinhAnh = $hinh;

        $diadiem->NoiBat = 0;
        $diadiem->SoLuotXem = 0;
        $diadiem->TrangThai = 0;       
        $diadiem->idDacDiem = $request->DacDiem;
        $diadiem->save();
        return redirect('home/home/'.$id)->with('thongbao', 'Bài viết của bạn đang được chờ xét duyệt');
    }
}
