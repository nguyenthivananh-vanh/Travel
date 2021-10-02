<?php

namespace App\Http\Controllers;
use App\Models\DiaDiem;
use Illuminate\Http\Request;
use App\Models\VungMien;
use App\Models\DacDiem;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;
use App\Models\Video;
use App\Models\MonAn;
class HomeController extends Controller
{
    function home(){
        $noibat = DiaDiem::orderBy('SoLuotXem','DESC')->take(6)->get();
        $diadiem = DiaDiem::orderBy('id','DESC')->take(6)->get();
        $vungmien = VungMien::all();
        return view('home.home',['vungmien'=>$vungmien,'noibat'=>$noibat,'DiaDiem'=>$diadiem]);
    }
    function homeUser($id){
        $user = User::find($id);
        $noibat = DiaDiem::orderBy('SoLuotXem','DESC')->take(6)->get();
        $diadiem = DiaDiem::orderBy('id','DESC')->take(6)->get();
        $vungmien = VungMien::all();
        return view('home.home',['vungmien'=>$vungmien,'noibat'=>$noibat,'DiaDiem'=>$diadiem ,'user'=>$user]);
    }
    // tìm kiếm
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
        $noibat = DiaDiem::where('idDacDiem',$id)->orderBy('SoLuotXem','DESC')->take(6)->get();
        $diadiem = DiaDiem::where('idDacDiem',$id)->orderBy('id','DESC')->paginate(3);

        return view('home.dacdiem.search',['noibat'=>$noibat,'vungmien'=>$vungmien,'diadiem'=>$diadiem]);
    }
    function DacDiemSearchUser($id,$idUser){
        $vungmien = VungMien::all();
        $noibat = DiaDiem::where('idDacDiem',$id)->orderBy('SoLuotXem','DESC')->take(6)->get();
        $diadiem = DiaDiem::where('idDacDiem',$id)->orderBy('id','DESC')->paginate(3);
        $user = User::find($idUser);

        return view('home.dacdiem.search',['noibat'=>$noibat,'vungmien'=>$vungmien,'diadiem'=>$diadiem,'user'=>$user]);
    }
    // trang chi tiết
    function view($id,$tacgia){
        $vungmien = VungMien::all();
        $diadiem = DiaDiem::find($id);
        $userAuthor = User::where('Ten','like',$tacgia)->first();
        $cmt = Comment::where('idDiaDiem',$id)->get();
        $diadiemList= DiaDiem::where('idDacDiem',$diadiem->idDacDiem)->take(5)->get();
        $user = User::all();
        $noibat = DiaDiem::orderBy('SoLuotXem','DESC')->take(5)->get();
        $video = Video::where('idDiaDiem',$id)->first();
        $diadiem->SoLuotXem = $diadiem->SoLuotXem + 1;
        $diadiem->save();
        if(isset($video)){
            return view('home.detail-post',['DiaDiem'=>$diadiem,'vungmien'=>$vungmien,'userAuthor'=>$userAuthor,'diadiemList'=>$diadiemList,'comment'=>$cmt,'noibat'=>$noibat,'video'=>$video]);
        }else{
            return view('home.detail-post',['DiaDiem'=>$diadiem,'vungmien'=>$vungmien,'userAuthor'=>$userAuthor,'diadiemList'=>$diadiemList,'comment'=>$cmt,'noibat'=>$noibat]);
        }
       
    }
    function viewUser($id,$tacgia,$idUser){
        $vungmien = VungMien::all();
        $diadiem = DiaDiem::find($id);
        $userAuthor = User::where('Ten','like',$tacgia)->first();
        $user = User::find($idUser);
        $diadiemList= DiaDiem::where('idDacDiem',$diadiem->idDacDiem)->inRandomOrder()->take(5)->get();
        $cmt = Comment::where('idDiaDiem',$id)->orderBy('id','DESC')->get();
        $noibat = DiaDiem::orderBy('SoLuotXem','DESC')->take(30)->get();
        $video = Video::where('idDiaDiem',$id)->first();
        $monan = MonAn::where('idDiaDiem',$id)->get();
        // $diadiemList = DiaDiem::doesntHave('id',$id)->get();
        // $diadiemList = DiaDiem::whereDoesntHave($id, function (Builder $query) {
        //     $query->where('idDacDiem',$diadiem->idDacDiem);
        // })->take(3)->get();
        $diadiem->SoLuotXem = $diadiem->SoLuotXem + 1;
        $diadiem->save();
        
        if(isset($video)){
            return view('home.detail-post',['DiaDiem'=>$diadiem,'vungmien'=>$vungmien,'user'=>$user,'diadiemList'=>$diadiemList,'userAuthor'=>$userAuthor,'comment'=>$cmt,'noibat'=>$noibat,'video'=>$video]);
        }else if(isset($monan)){
            return view('home.detail-post',['DiaDiem'=>$diadiem,'vungmien'=>$vungmien,'user'=>$user,'diadiemList'=>$diadiemList,'userAuthor'=>$userAuthor,'comment'=>$cmt,'noibat'=>$noibat,'monan'=>$monan]);
        }else if(isset($video) && isset($monan)){
            return view('home.detail-post',['DiaDiem'=>$diadiem,'vungmien'=>$vungmien,'user'=>$user,'diadiemList'=>$diadiemList,'userAuthor'=>$userAuthor,'comment'=>$cmt,'noibat'=>$noibat,'video'=>$video,'monan'=>$monan]);
        }else{
            return view('home.detail-post',['DiaDiem'=>$diadiem,'vungmien'=>$vungmien,'user'=>$user,'diadiemList'=>$diadiemList,'userAuthor'=>$userAuthor,'comment'=>$cmt,'noibat'=>$noibat]);
        }
        
    }
    // chi tiết món ăn
    function viewMonAn($id,$idDiaDiem){
        $diadiem = DiaDiem::find($idDiaDiem);
        $monan = MonAn::find($id);
        return view('home.viewMonAn',['diadiem'=>$diadiem,'monan'=>$monan]);
        
    }
    // bình luận
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
                return view('home.detail-post')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
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
        return redirect('home/view/'.$idDiaDiem.'/'.$diadiem->TacGia.'/'.$idUser)->with('thongbao', 'Đã đăng bình luận');
    }

    public function commentDelete($idcmt,$idDiaDiem,$tacgia,$idUser){
        $cmt = Comment::find($idcmt);
        $cmt->delete();
        return redirect('home/view/'.$idDiaDiem.'/'.$tacgia.'/'.$idUser)->with('thongbao', 'Đã xoá bình luận');
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
        if($id == 1){
            $diadiem->TrangThai = 1;
        }else{
            $diadiem->TrangThai = 0;
        }

        $diadiem->idDacDiem = $request->DacDiem;
        $diadiem->save();
        $idDiaDiem = $diadiem->id;
        return redirect('home/culinary/'.$id.'/'.$idDiaDiem);
    }
    // xoá bài
    // public function getDeleteView($id,$tacgia,$idUser){
    //     return view('home.deleteView',['id'=>$id,'tacgia'=>$tacgia,'idUser'=>$idUser]);
    // }
    public function getAcceptDelete($id,$tacgia,$idUser){
        $diadiem = DiaDiem::find($id);
        $comment = Comment::where('idDiaDiem',$id)->first();
        $monan = MonAn::where('idDiaDiem',$id)->first();
        $video = Video::where('idDiaDiem',$id)->first();
        if(isset($comment)){
            $comment->delete();
        }
        if(isset($monan)){
            $monan->delete();
        }
        if(isset($video)){
            $video->delete();
        }
        $diadiem ->delete();
        return redirect('home/home/'.$idUser);
    }
    // public function getBackView($id,$tacgia,$idUser){
    //     return redirect('home/view/'.$id.'/'.$tacgia.'/'.$idUser);
    // }
    // sửa bài
    public function notifyUpdate($id,$tacgia,$idUser){
        return view('home.notifyUpdate',['id'=>$id,'tacgia'=>$tacgia,'idUser'=>$idUser]);
    }
    public function getUpdateView($id,$tacgia,$idUser){
        $vungmien = VungMien::all();
        $dacdiem = DacDiem::all();
        $diadiem = DiaDiem::find($id);
        return view('home.updateView',['id'=>$id,'tacgia'=>$tacgia,'idUser'=>$idUser,'diadiem'=>$diadiem,'dacdiem' => $dacdiem, 'vungmien' => $vungmien]);
    }
    public function postUpdateView(Request $request, $id, $tacgia, $idUser)
    {
        $this->validate($request,
            [
                'DacDiem' => 'required',
                'tieude' => 'required|min:3',
                'tomtat' => 'required',
                'noidung' => 'required',
            ],
            [
                'DacDiem.required' => 'Bạn chưa chọn đặc điểm',
                'tieude.required' => 'Bạn chưa nhập tiêu đề',
                'tieude.min' => 'Tiêu đề phải có độ dài ít nhất 3 ký tự',
                'tomtat.required' => 'Bạn chưa nhập tóm tắt',
                'noidung.required' => 'Bạn chưa nhập nội dung',
            ]);

        $diadiem = DiaDiem::find($id);
        $diadiem->TieuDe = $request->tieude;
        $diadiem->TieuDeKhongDau = changeTitle($request->tieude);
        $diadiem->TomTat = $request->tomtat;
        $diadiem->NoiDung = $request->noidung;
        $diadiem->TacGia = $request->tacgia;
        $diadiem->TrangThai = 1;
        $diadiem->idDacDiem = $request->DacDiem;


        if($request->hasFile('hinhanh')){
            $file = $request->file('hinhanh');
            $tail = $file->getClientOriginalExtension();
            if($tail != 'jpg' && $tail != 'png' && $tail !='jpeg'){
                return view('home.updateView')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/diadiem/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }

            $file->move("upload/diadiem",$hinh);
            $diadiem->HinhAnh = $hinh;
        }else{
            $diadiem->HinhAnh = $diadiem->HinhAnh;
        }

        $diadiem->save();
        return redirect('home/view/'.$id.'/'.$tacgia.'/'.$idUser)->with('thongbao', 'Sửa thành công');

    }
    // update món ăn
    public function getUpdateCulinary($id,$tacgia,$idUser){
        $monan = MonAn::where('idDiaDiem',$id)->get();
        return view('home.listMonAn',['id'=>$id,'tacgia'=>$tacgia,'idUser'=>$idUser,'monan'=>$monan]);
    }
    public function showFormUpdate($id,$tacgia,$idUser,$idMonAn){
        $monan = MonAn::find($idMonAn);
        return view('home.updateCulinary',['id'=>$id,'tacgia'=>$tacgia,'idUser'=>$idUser,'MonAn'=>$monan]);
    }
    public function postUpdateCulinary(Request $request, $id,$tacgia,$idUser,$idMonAn){
        $this->validate($request,
            [
                'tenmonan' => 'required',
                'mota' => 'required',
                'tieude' => 'required',
            ],
            [
                'tenmonan.required' => 'Bạn chưa nhập tên món ăn',
                'mota.required' => 'Bạn chưa nhập mô tả',
                'tieude.required' => 'Bạn chưa nhập tiêu đề',
            ]);

        $monan = MonAn::find($idMonAn);
        $monan->TenMonAn = $request->tenmonan;
        $monan->TieuDe = $request->tieude;
        $monan->MoTa = $request->mota;
      
        $monan->idDiaDiem = $id;
        if($request->hasFile('hinhanh')){
            $file = $request->file('hinhanh');
            $tail = $file->getClientOriginalExtension();
            if($tail != 'jpg' && $tail != 'png' && $tail !='jpeg'){
                return view('home.updateCulinary')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/monan/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }

            $file->move("upload/monan",$hinh);
            $monan->HinhAnh = $hinh;
        }else{
            $monan->HinhAnh = $monan->HinhAnh;
        }
        $monan->save();
        return redirect('home/view/'.$id.'/'.$tacgia.'/'.$idUser)->with('thongbao', 'Sửa thành công');

    }

    // update Video
    public function getUpdateVideo($id,$tacgia,$idUser){
        $video = Video::where('idDiaDiem',$id)->first();
        return view('home.updateVideo',['id'=>$id,'tacgia'=>$tacgia,'idUser'=>$idUser,'video'=>$video]);
    }
    public function postUpdateVideo(Request $request, $id,$tacgia,$idUser,$idVideo){
        $this->validate($request,
            [
                'tieude' => 'required|unique:DiaDiem,TieuDe|min:3',
            
            ],
            [
                'tieude.required' => 'Bạn chưa nhập tiêu đề',
                'tieude.min' => 'Tiêu đề phải có độ dài ít nhất 3 ký tự',
                'tieude.unique' => 'Tiêu đề đã tồn tại',
            
            ]);
        $video = Video::find($idVideo);
        $video->TieuDe = $request->tieude;
        $video->TieuDeKhongDau = changeTitle($request->tieude);
        $video->Mota = $request->mota;
        
        if($request->hasFile('video')){
            $file = $request->file('video');
            $tail = $file->getClientOriginalExtension();
           
            $name = $file->getClientOriginalName();
            $vid = Str::random(4)."_".$name;
            while(file_exists("upload/video/".$vid)){
                $vid = Str::random(4)."_".$name;
            }

            $file->move("upload/video",$vid);
            $video->video = $vid;
        }else{
            $video->video = $video->video;
        }
        $video->save();
        return redirect('home/view/'.$id.'/'.$tacgia.'/'.$idUser)->with('thongbao', 'Sửa thành công');

    }
    // món ăn
    public function notifyVideo($id,$idDiaDiem){
        return view('home.notifyVideo',['id'=>$id,'idDiaDiem'=>$idDiaDiem]);
    }
    public function getVideo($id,$idDiaDiem){
        return view('home.postVideo',['id'=>$id,'idDiaDiem'=>$idDiaDiem]);
    }
    public function postVideo(Request $request, $id, $idDiaDiem){
        $this->validate($request,
            [
                'tieude' => 'required|unique:DiaDiem,TieuDe|min:3',
                'video' => 'required',
            ],
            [            
                'tieude.required' => 'Bạn chưa nhập tiêu đề',
                'tieude.min' => 'Tiêu đề phải có độ dài ít nhất 3 ký tự',
                'tieude.unique' => 'Tiêu đề đã tồn tại',
                'video.required' => 'Bạn cần chọn video tải lên',
            ]);

        $video = new Video;
        $video->TieuDe = $request->tieude;
        $video->TieuDeKhongDau = changeTitle($request->tieude);
        $video->Mota = $request->mota;

        $file = $request->file('video');
        $tail = $file->getClientOriginalExtension();
       
        $name = $file->getClientOriginalName();
        $vid = Str::random(4) . "_" . $name;
        while (file_exists("upload/video/" . $vid)) {
            $vid = Str::random(4) . "_" . $name;
        }
        $file->move("upload/video", $vid);
        $video->video = $vid;
        $video->idDiaDiem = $idDiaDiem;
        $video->save();
        return redirect('home/home/'.$id)->with('thongbao','Bài viết của bạn đang được chờ xét duyệt');
    }

    // video
    public function notifyCulinary($id,$idDiaDiem){
        return view('home.notifyCulinary',['id'=>$id,'idDiaDiem'=>$idDiaDiem]);
    }
    public function getCulinary($id,$idDiaDiem){
        return view('home.postCulinary',['id'=>$id,'idDiaDiem'=>$idDiaDiem]);
    }
    public function postCulinary(Request $request, $id, $idDiaDiem){
        $this->validate($request,
            [
                'tenmonan' => 'required',
                'mota' => 'required',
                'hinhanh' => 'required',
            ],
            [
                'tenmonan.required' => 'Bạn chưa nhập tên món ăn',
                'mota.required' => 'Bạn chưa nhập mô tả',
                'hinhanh.unique' => 'Bạn chưa chọn hình ảnh',

            ]);
        
        $monan = new MonAn();
        $monan->TenMonAn = $request->tenmonan;
        $monan->TieuDe = $request->tieude;
        $monan->Mota = $request->mota;
        $monan->idDiaDiem = $idDiaDiem;
       

        $file = $request->file('hinhanh');
        $tail = $file->getClientOriginalExtension();
        if ($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg') {
            return redirect('admin/monan/add')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
        }
        $name = $file->getClientOriginalName();
        $hinh = Str::random(4) . "_" . $name;
        while (file_exists("upload/monan/" . $hinh)) {
            $hinh = Str::random(4) . "_" . $name;
        }
        $file->move("upload/monan", $hinh);
        $monan->HinhAnh = $hinh;
        $monan->save();
        return redirect('home/video/'.$id.'/'.$idDiaDiem);
    }
    
}
