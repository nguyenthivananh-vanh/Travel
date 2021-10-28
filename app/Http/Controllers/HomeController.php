<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use App\Models\DiaDiem;
use Illuminate\Http\Request;
use App\Models\VungMien;
use App\Models\DacDiem;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;
use App\Models\Video;
use App\Models\MonAn;
use DB;

class HomeController extends Controller
{
    function home()
    {
        $noibat = DiaDiem::where('TrangThai',1)->orderBy('SoLuotXem', 'DESC')->take(6)->get();
        $diadiem = DiaDiem::where('TrangThai',1)->orderBy('id', 'DESC')->take(6)->get();
        $vungmien = VungMien::all();
        return view('home.home', ['vungmien' => $vungmien, 'noibat' => $noibat, 'DiaDiem' => $diadiem]);
    }

    function homeUser($id)
    {
        $user = User::find($id);
        $noibat = DiaDiem::where('TrangThai',1)->orderBy('SoLuotXem', 'DESC')->take(6)->get();
        $diadiem = DiaDiem::where('TrangThai',1)->orderBy('id', 'DESC')->take(6)->get();
        $vungmien = VungMien::all();
        return view('home.home', ['vungmien' => $vungmien, 'noibat' => $noibat, 'DiaDiem' => $diadiem, 'user' => $user]);
    }

    // tìm kiếm
    public function search(Request $request)
    {
        $key = $request->search;
        return redirect('home/showSearch/'.$key);
    }
    function showSearch( $key)
    {
        $vungmien = VungMien::all();
        $diadiem = DiaDiem::where('TieuDe', 'like', "%$key%")->orwhere('tinh', 'like', "%$key%")->where('TrangThai',1)->paginate(6);
        $monan = MonAn::where('tinh', 'like', "%$key%")->orderBy('SoLuotXem', 'DESC')->take(3)->get();
        return view('home.search', ['diadiem' => $diadiem, 'key' => $key, 'vungmien' => $vungmien, 'MonAn' => $monan]);
    }

   
    public function searchUser(Request $request, $id)
    {
        $key = $request->search;
        return redirect('home/showSearchUser/'.$key .'/'.$id);
    }
    public function showSearchUser($key, $id)
    {
        $vungmien = VungMien::all();
        $user = User::find($id);
        $diadiem = DiaDiem::where('TieuDe', 'like', "%$key%")->orwhere('tinh', 'like', "%$key%")->where('TrangThai',1)->paginate(6);
        $monan = MonAn::where('tinh', 'like', "%$key%")->orderBy('SoLuotXem', 'DESC')->take(3)->get();
        return view('home.search', ['diadiem' => $diadiem, 'key' => $key, 'vungmien' => $vungmien, 'user' => $user, 'MonAn' => $monan]);
    }

    function DacDiemSearch($id)
    {
        $vungmien = VungMien::all();
        $noibat = DiaDiem::where('idDacDiem', $id)->where('TrangThai',1)->orderBy('SoLuotXem', 'DESC')->take(6)->get();
        $diadiem = DiaDiem::where('idDacDiem', $id)->where('TrangThai',1)->orderBy('id', 'DESC')->paginate(3);

        return view('home.dacdiem.search', ['noibat' => $noibat, 'vungmien' => $vungmien, 'diadiem' => $diadiem]);
    }

    function DacDiemSearchUser($id, $idUser)
    {
        $vungmien = VungMien::all();
        $noibat = DiaDiem::where('idDacDiem', $id)->where('TrangThai',1)->orderBy('SoLuotXem', 'DESC')->take(6)->get();
        $diadiem = DiaDiem::where('idDacDiem', $id)->where('TrangThai',1)->orderBy('id', 'DESC')->paginate(3);
        $user = User::find($idUser);

        return view('home.dacdiem.search', ['noibat' => $noibat, 'vungmien' => $vungmien, 'diadiem' => $diadiem, 'user' => $user]);
    }

    // trang chi tiết
    function view($id, $tacgia)
    {
        $cookie_name = $id;
        $cookie_value = "1";
        if (isset($_COOKIE[$cookie_name])) {
            $vungmien = VungMien::all();
            $diadiem = DiaDiem::find($id);
            $userAuthor = User::where('Ten', 'like', $tacgia)->first();
            $cmt = Comment::where('idDiaDiem', $id)->get();
            $diadiemList = DiaDiem::where('idDacDiem', $diadiem->idDacDiem)->where('TrangThai',1)->where('id','<>',$id)->inRandomOrder()->take(5)->get();
            $noibat = DiaDiem::orderBy('SoLuotXem', 'DESC')->where('TrangThai',1)->take(30)->get();
            $video = Video::where('idDiaDiem', $id)->first();
            $monan = MonAn::where('idDiaDiem', $id)->get();
            $idMonAn = array();
            foreach($monan as $row){
                $idMonAn[]= $row->id;
            }           
            $monanTinh = MonAn::where('tinh', 'like', $diadiem->tinh)->whereNotIn('id',$idMonAn)->take(10)->get();
            if (isset($video) || isset($monan) || isset($monanTinh)) {
                return view('home.detail-post', ['DiaDiem' => $diadiem, 'vungmien' => $vungmien, 'diadiemList' => $diadiemList, 'userAuthor' => $userAuthor, 'comment' => $cmt, 'noibat' => $noibat, 'video' => $video, 'monan' => $monan, 'monanTinh' => $monanTinh]);
            } else {
                return view('home.detail-post', ['DiaDiem' => $diadiem, 'vungmien' => $vungmien, 'userAuthor' => $userAuthor, 'diadiemList' => $diadiemList, 'comment' => $cmt, 'noibat' => $noibat]);
            }
        } else {
            setcookie($cookie_name, $cookie_value, time() + 600);
            $vungmien = VungMien::all();
            $diadiem = DiaDiem::find($id);
            $userAuthor = User::where('Ten', 'like', $tacgia)->first();
            $cmt = Comment::where('idDiaDiem', $id)->get();
            $diadiemList = DiaDiem::where('idDacDiem', $diadiem->idDacDiem)->where('TrangThai',1)->where('id','<>',$id)->inRandomOrder()->take(5)->get();
            $noibat = DiaDiem::orderBy('SoLuotXem', 'DESC')->where('TrangThai',1)->take(30)->get();
            $video = Video::where('idDiaDiem', $id)->first();
            $monan = MonAn::where('idDiaDiem', $id)->get();
            $idMonAn = array();
            foreach($monan as $row){
                $idMonAn[]= $row->id;
            } 
            $monanTinh = MonAn::where('tinh', 'like', $diadiem->tinh)->whereNotIn('id',$idMonAn)->take(10)->get();
            $diadiem->SoLuotXem = $diadiem->SoLuotXem + 1;
            $diadiem->save();
            // dd($monanTinh);
            if (isset($video) || isset($monan) || isset($monanTinh)) {
                return view('home.detail-post', ['DiaDiem' => $diadiem, 'vungmien' => $vungmien, 'diadiemList' => $diadiemList, 'userAuthor' => $userAuthor, 'comment' => $cmt, 'noibat' => $noibat, 'video' => $video, 'monan' => $monan, 'monanTinh' => $monanTinh]);
            } else {
                return view('home.detail-post', ['DiaDiem' => $diadiem, 'vungmien' => $vungmien, 'userAuthor' => $userAuthor, 'diadiemList' => $diadiemList, 'comment' => $cmt, 'noibat' => $noibat]);
            }
        }

    }

    function viewUser($id, $tacgia, $idUser)
    {
        $cookie_name = $id.$idUser;
        $cookie_value = "1";
        if (isset($_COOKIE[$cookie_name])) {
            $vungmien = VungMien::all();
            $diadiem = DiaDiem::find($id);
            $userAuthor = User::where('Ten', 'like', $tacgia)->first();
            $user = User::find($idUser);
            $diadiemList = DiaDiem::where('idDacDiem', $diadiem->idDacDiem)->where('TrangThai',1)->where('id','<>',$id)->inRandomOrder()->take(5)->get();
            $cmt = Comment::where('idDiaDiem', $id)->orderBy('id', 'DESC')->get();
            $noibat = DiaDiem::orderBy('SoLuotXem', 'DESC')->where('TrangThai',1)->take(30)->get();
            $video = Video::where('idDiaDiem', $id)->first();
            $monan = MonAn::where('idDiaDiem', $id)->get();
            $idMonAn = array();
            foreach($monan as $row){
                $idMonAn[]= $row->id;
            } 
            $monanTinh = MonAn::where('tinh', 'like', $diadiem->tinh)->whereNotIn('id',$idMonAn)->get();
            if (isset($video) || isset($monan) || isset($monanTinh)) {
                return view('home.detail-post', ['DiaDiem' => $diadiem, 'user' => $user, 'vungmien' => $vungmien, 'diadiemList' => $diadiemList, 'userAuthor' => $userAuthor, 'comment' => $cmt, 'noibat' => $noibat, 'video' => $video, 'monan' => $monan, 'monanTinh' => $monanTinh]);
            } else {
                return view('home.detail-post', ['DiaDiem' => $diadiem, 'user' => $user, 'vungmien' => $vungmien, 'userAuthor' => $userAuthor, 'diadiemList' => $diadiemList, 'comment' => $cmt, 'noibat' => $noibat]);
            }
        } else {
            setcookie($cookie_name, $cookie_value, time() + 600);
            $vungmien = VungMien::all();
            $diadiem = DiaDiem::find($id);
            $userAuthor = User::where('Ten', 'like', $tacgia)->first();
            $user = User::find($idUser);
            $diadiemList = DiaDiem::where('idDacDiem', $diadiem->idDacDiem)->where('TrangThai',1)->where('id','<>',$id)->inRandomOrder()->take(5)->get();
            $cmt = Comment::where('idDiaDiem', $id)->orderBy('id', 'DESC')->get();
            $noibat = DiaDiem::orderBy('SoLuotXem', 'DESC')->where('TrangThai',1)->take(30)->get();
            $video = Video::where('idDiaDiem', $id)->first();
            $monan = MonAn::where('idDiaDiem', $id)->get();
            $idMonAn = array();
            foreach($monan as $row){
                $idMonAn[]= $row->id;
            } 
            $monanTinh = MonAn::where('tinh', 'like', $diadiem->tinh)->whereNotIn('id',$idMonAn)->get();
            $diadiem->SoLuotXem = $diadiem->SoLuotXem + 1;
            $diadiem->save();
            if (isset($video) || isset($monan) || isset($monanTinh)) {
                return view('home.detail-post', ['DiaDiem' => $diadiem, 'user' => $user, 'vungmien' => $vungmien, 'diadiemList' => $diadiemList, 'userAuthor' => $userAuthor, 'comment' => $cmt, 'noibat' => $noibat, 'video' => $video, 'monan' => $monan, 'monanTinh' => $monanTinh]);
            } else {
                return view('home.detail-post', ['DiaDiem' => $diadiem, 'user' => $user, 'vungmien' => $vungmien, 'userAuthor' => $userAuthor, 'diadiemList' => $diadiemList, 'comment' => $cmt, 'noibat' => $noibat]);
            }
        }

    }

    // chi tiết món ăn
    function viewMonAn($id, $idDiaDiem)
    {
        $cookie_name = $id . $idDiaDiem;
        $cookie_value = "1";
        if (isset($_COOKIE[$cookie_name])) {
            $diadiem = DiaDiem::find($idDiaDiem);
            $monan = MonAn::find($id);
            return view('home.viewMonAn', ['diadiem' => $diadiem, 'monan' => $monan]);
        } else {
            setcookie($cookie_name, $cookie_value, time() + 600);
            $diadiem = DiaDiem::find($idDiaDiem);
            $monan = MonAn::find($id);
            $monanTinh = MonAn::where('tinh', 'like', $diadiem->tinh)->get();
            $monan->SoLuotXem = $monan->SoLuotXem + 1;
            $monan->save();
            return view('home.viewMonAn', ['diadiem' => $diadiem, 'monan' => $monan, 'monanTinh' => $monanTinh]);
        }
    }

    function viewMonAnUser($id, $idDiaDiem, $idUser)
    {
        $cookie_name = $id . $idDiaDiem;
        $cookie_value = "1";
        if (isset($_COOKIE[$cookie_name])) {
            $user = User::find($idUser);
            $diadiem = DiaDiem::find($idDiaDiem);
            $monan = MonAn::find($id);
            $monanTinh = MonAn::where('tinh', 'like', $diadiem->tinh)->get();
            return view('home.viewMonAn', ['diadiem' => $diadiem, 'monan' => $monan, 'monanTinh' => $monanTinh, 'user' => $user]);
        } else {
            setcookie($cookie_name, $cookie_value, time() + 600);
            $user = User::find($idUser);
            $diadiem = DiaDiem::find($idDiaDiem);
            $monan = MonAn::find($id);
            $monanTinh = MonAn::where('tinh', 'like', $diadiem->tinh)->get();
            $monan->SoLuotXem = $monan->SoLuotXem + 1;
            $monan->save();
            return view('home.viewMonAn', ['diadiem' => $diadiem, 'monan' => $monan, 'monanTinh' => $monanTinh, 'user' => $user]);
        }
    }

    // bình luận
    function comment(Request $request, $idUser, $idDiaDiem)
    {
        $diadiem = DiaDiem::find($idDiaDiem);
        $user = User::find($idUser);
        $comment = new Comment();
        $comment->idUser = $idUser;
        $comment->idDiaDiem = $idDiaDiem;
        $comment->NoiDung = $request->cmt;
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $tail = $file->getClientOriginalExtension();
            if ($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg') {
                return view('home.detail-post')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4) . "_" . $name;
            while (file_exists("upload/comment/" . $hinh)) {
                $hinh = Str::random(4) . "_" . $name;
            }

            $file->move("upload/comment", $hinh);
            $comment->HinhAnh = $hinh;
        } else {
            $comment->HinhAnh = "";
        }
        $comment->save();
        return redirect('home/view/' . $idDiaDiem . '/' . $diadiem->TacGia . '/' . $idUser)->with('thongbao', 'Đã đăng bình luận');
    }

    public function commentDelete($idcmt, $idDiaDiem, $tacgia, $idUser)
    {
        $cmt = Comment::find($idcmt);
        if(file_exists($cmt->HinhAnh)){
            unlink("upload/comment/" . $cmt->HinhAnh);
        }
        $cmt->delete();
        return redirect('home/view/' . $idDiaDiem . '/' . $tacgia . '/' . $idUser)->with('thongbao', 'Đã xoá bình luận');
    }

    // viết bài
    public function getReply($id)
    {
        $vungmien = VungMien::all();
        $dacdiem = DacDiem::all();
        $user = User::find($id);
        return view('home.reply', ['vungmien' => $vungmien, 'dacdiem' => $dacdiem, 'user' => $user]);
    }

    public function postReply(Request $request, $id)
    {
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
        $diadiem->tinh = $request->tinh;

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
        $diadiem->SoLuotXem = 0;
        if ($id == 1) {
            $diadiem->TrangThai = 1;
        } else {
            $diadiem->TrangThai = 0;
        }

        $diadiem->idDacDiem = $request->DacDiem;
        $diadiem->save();
        $idDiaDiem = $diadiem->id;
        return redirect('home/notify/' . $id . '/' . $idDiaDiem);
    }

    // notify
    public function getNotify($id, $idDiaDiem)
    {
        $diadiem = DiaDiem::find($idDiaDiem);
        return view('home.notify', ['id' => $id, 'idDiaDiem' => $idDiaDiem, 'diadiem' => $diadiem]);
    }

    //add  video

    public function getVideo($id, $idDiaDiem)
    {
        return view('home.postVideo', ['id' => $id, 'idDiaDiem' => $idDiaDiem]);
    }

    public function postVideo(Request $request, $id, $idDiaDiem)
    {
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
        return redirect('home/notify/' . $id . '/' . $idDiaDiem);
    }

    // add món ăn

    public function getCulinary($id, $idDiaDiem)
    {
        return view('home.postCulinary', ['id' => $id, 'idDiaDiem' => $idDiaDiem]);
    }

    public function postCulinary(Request $request, $id, $idDiaDiem)
    {
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
        $monan->tinh = $request->tinh;

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
        return redirect('home/notify/' . $id . '/' . $idDiaDiem); 
    }
    // xoá bài
    // public function getDeleteView($id,$tacgia,$idUser){
    //     return view('home.deleteView',['id'=>$id,'tacgia'=>$tacgia,'idUser'=>$idUser]);
    // }
    public function getAcceptDelete($id, $tacgia, $idUser)
    {
        $diadiem = DiaDiem::find($id);
        $comment = Comment::where('idDiaDiem', $id)->first();
        $monan = MonAn::where('idDiaDiem', $id)->first();
        $video = Video::where('idDiaDiem', $id)->first();

        if (isset($comment)) {
            if (isset($comment->HinhAnh)) {
                unlink("upload/comment/" . $comment->HinhAnh);
                $comment->delete();
            }else{
                $comment->delete();
            }
        }

        if (isset($monan)) {
            unlink("upload/monan/" . $monan->HinhAnh);
            $monan->delete();
        }
        if (isset($video)) {
            unlink("upload/video/" . $video->video);
            $video->delete();
        }
        unlink("upload/diadiem/" . $diadiem->HinhAnh);
        $diadiem->delete();
        return redirect('home/home/' . $idUser);
    }
    // public function getBackView($id,$tacgia,$idUser){
    //     return redirect('home/view/'.$id.'/'.$tacgia.'/'.$idUser);
    // }
    // sửa bài
    public function notifyUpdate($id, $tacgia, $idUser)
    {
        return view('home.notifyUpdate', ['id' => $id, 'tacgia' => $tacgia, 'idUser' => $idUser]);
    }

    public function getUpdateView($id, $tacgia, $idUser)
    {
        $vungmien = VungMien::all();
        $dacdiem = DacDiem::all();
        $diadiem = DiaDiem::find($id);
        return view('home.updateView', ['id' => $id, 'tacgia' => $tacgia, 'idUser' => $idUser, 'diadiem' => $diadiem, 'dacdiem' => $dacdiem, 'vungmien' => $vungmien]);
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


        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $tail = $file->getClientOriginalExtension();
            if ($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg') {
                return view('home.updateView')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4) . "_" . $name;
            while (file_exists("upload/diadiem/" . $hinh)) {
                $hinh = Str::random(4) . "_" . $name;
            }

            $file->move("upload/diadiem", $hinh);
            $diadiem->HinhAnh = $hinh;
        } else {
            $diadiem->HinhAnh = $diadiem->HinhAnh;
        }

        $diadiem->save();
        return redirect('home/view/' . $id . '/' . $tacgia . '/' . $idUser)->with('thongbao', 'Sửa thành công');

    }

    // update món ăn
    public function getUpdateCulinary($id, $tacgia, $idUser)
    {
        $monan = MonAn::where('idDiaDiem', $id)->get();
        return view('home.listMonAn', ['id' => $id, 'tacgia' => $tacgia, 'idUser' => $idUser, 'monan' => $monan]);
    }

    public function showFormUpdate($id, $tacgia, $idUser, $idMonAn)
    {
        $monan = MonAn::find($idMonAn);
        return view('home.updateCulinary', ['id' => $id, 'tacgia' => $tacgia, 'idUser' => $idUser, 'MonAn' => $monan]);
    }

    public function postUpdateCulinary(Request $request, $id, $tacgia, $idUser, $idMonAn)
    {
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
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $tail = $file->getClientOriginalExtension();
            if ($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg') {
                return view('home.updateCulinary')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4) . "_" . $name;
            while (file_exists("upload/monan/" . $hinh)) {
                $hinh = Str::random(4) . "_" . $name;
            }

            $file->move("upload/monan", $hinh);
            $monan->HinhAnh = $hinh;
        } else {
            $monan->HinhAnh = $monan->HinhAnh;
        }
        $monan->save();
        return redirect('home/view/' . $id . '/' . $tacgia . '/' . $idUser)->with('thongbao', 'Sửa thành công');

    }

    // update Video
    public function getUpdateVideo($id, $tacgia, $idUser, $idVideo)
    {
        $video = Video::find($idVideo);
        return view('home.updateVideo', ['id' => $id, 'tacgia' => $tacgia, 'idUser' => $idUser, 'video' => $video]);
    }

    public function postUpdateVideo(Request $request, $id, $tacgia, $idUser, $idVideo)
    {
        $this->validate($request,
            [
                'tieude' => 'required|min:3',
            ],
            [
                'tieude.required' => 'Bạn chưa nhập tiêu đề',
                'tieude.min' => 'Tiêu đề phải có độ dài ít nhất 3 ký tự',

            ]);
        $video = Video::find($idVideo);
        $video->TieuDe = $request->tieude;
        $video->TieuDeKhongDau = changeTitle($request->tieude);
        $video->Mota = $request->mota;

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $tail = $file->getClientOriginalExtension();

            $name = $file->getClientOriginalName();
            $vid = Str::random(4) . "_" . $name;
            while (file_exists("upload/video/" . $vid)) {
                $vid = Str::random(4) . "_" . $name;
            }

            $file->move("upload/video", $vid);
            $video->video = $vid;
        } else {
            $video->video = $video->video;
        }
        $video->save();
        return redirect('home/view/' . $id . '/' . $tacgia . '/' . $idUser)->with('thongbao', 'Sửa thành công');

    }

}
