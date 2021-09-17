<?php

namespace App\Http\Controllers;

use App\Models\DiaDiem;
use App\Models\VungMien;
use App\Models\DacDiem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiaDiemController extends Controller
{
    function __construct(){
        $userAdmin = User::where('Ten','admin');
        view()->share('userAdmin',$userAdmin);
    }
    public function getList()
    {
        $diadiem = DiaDiem::where('TrangThai',1)->paginate(3);
        return view('admin.diadiem.list', ['DiaDiem' => $diadiem]);
    }


    public function getListDuyet()
    {
        $diadiem = DiaDiem::where('TrangThai',0)->paginate(3);
        return view('admin.diadiem.listDuyet', ['DiaDiem' => $diadiem]);
    }

    public function getAdd()
    {
        $vungmien = VungMien::all();
        $dacdiem = DacDiem::all();
        return view('admin.diadiem.add', ['vungmien' => $vungmien], ['dacdiem' => $dacdiem]);
    }

    public function postAdd(Request $request)
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

        $file = $request->file('hinhanh');
        $tail = $file->getClientOriginalExtension();
        if ($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg') {
            return redirect('admin/diadiem/add')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
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
        $diadiem->idDacDiem = $request->DacDiem;
        $diadiem->TrangThai = 1;
        $diadiem->save();
        return redirect('admin/diadiem/add')->with('thongbao', 'Thêm thành công');
    }

    public function getUpdate($id)
    {
        $vungmien = VungMien::all();
        $dacdiem = DacDiem::all();
        $diadiem = DiaDiem::find($id);
        return view('admin.diadiem.update', ['diadiem' => $diadiem, 'vungmien' => $vungmien, 'dacdiem' => $dacdiem]);
    }

    public function postUpdate(Request $request, $id)
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
        $diadiem->TrangThai = $request->duyet;
        $diadiem->idDacDiem = $request->DacDiem;

        if($request->hasFile('hinhanh')){
            $file = $request->file('hinhanh');
            $tail = $file->getClientOriginalExtension();
            if($tail != 'jpg' && $tail != 'png' && $tail !='jpeg'){
                return redirect('admin/user/update')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
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
            return redirect('admin/diadiem/update/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getDelete($id)
    {
        $diadiem = DiaDiem::find($id);
        $diadiem->delete();
        return redirect('admin/diadiem/duyetbai')->with('thongbao', 'Xoá thành công');
    }

    //Tìm kiếm
    public function search(Request $request)
    {
        $key = $request->search;
        return redirect('admin/diadiem/showSearch/'.$key);
    }
    public function showSearch($key)
    {
        $dd = DiaDiem::where('TieuDe', 'like', "%$key%")->orwhere('TieuDeKhongDau', 'like', "%$key%")->orwhere('TomTat', 'like', "%$key%")->paginate(3);
        return view('admin.diadiem.list', ['DiaDiem' => $dd]);
    }

    public function view($id,$tacgia){
        $vungmien = VungMien::all();
        $diadiem = DiaDiem::find($id);
        $user = User::where('Ten','like',$tacgia)->first();
        $diadiem->save();
        return view('admin.diadiem.view',['DiaDiem'=>$diadiem,'vungmien'=>$vungmien,'user'=>$user]);
    }

    public function duyet($id){
        $diadiem = DiaDiem::find($id);
        $diadiem->TrangThai = 1;
        $diadiem->save();
        return redirect('admin/diadiem/duyetbai');
    }
}
