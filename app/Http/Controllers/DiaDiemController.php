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
    
    public function getList($idUser)
    {
        $diadiem = DiaDiem::where('TrangThai',1)->paginate(3);
        $user = User::find($idUser);
        return view('admin.diadiem.list', ['DiaDiem' => $diadiem,'user'=>$user]);
    }


    public function getListDuyet($idUser)
    {
        $diadiem = DiaDiem::where('TrangThai',0)->paginate(3);
        $user = User::find($idUser);
        return view('admin.diadiem.listDuyet', ['DiaDiem' => $diadiem,'user'=>$user]);
    }

    public function getAdd($idUser)
    {
        $user = User::find($idUser);
        $vungmien = VungMien::all();
        $dacdiem = DacDiem::all();
        return view('admin.diadiem.add', ['vungmien' => $vungmien], ['dacdiem' => $dacdiem,'user'=> $user]);
    }

    public function postAdd(Request $request, $idUser)
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
            return redirect('admin/diadiem/add/'.$idUser)->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
        }
        $name = $file->getClientOriginalName();
        $hinh = Str::random(4) . "_" . $name;
        while (file_exists("upload/diadiem/" . $hinh)) {
            $hinh = Str::random(4) . "_" . $name;
        }
        $file->move("upload/diadiem", $hinh);
        $diadiem->HinhAnh = $hinh;

        $diadiem->SoLuotXem = 0;
        $diadiem->idDacDiem = $request->DacDiem;
        $diadiem->TrangThai = 1;
        $diadiem->save();
        return redirect('admin/diadiem/list/'.$idUser)->with('thongbao', 'Thêm thành công');
    }
// update
    public function getUpdate($id,$idUser)
    {
        $user = User::find($idUser);
        $vungmien = VungMien::all();
        $dacdiem = DacDiem::all();
        $diadiem = DiaDiem::find($id);
        return view('admin.diadiem.update', ['diadiem' => $diadiem, 'vungmien' => $vungmien, 'dacdiem' => $dacdiem,'user'=> $user]);
    }

    public function postUpdate(Request $request, $id, $idUser)
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
        if(isset($request->tinh)){
            $diadiem->tinh = $request->tinh;
        }else{
            $diadiem->tinh = $diadiem->tinh;
        }
        

        if($request->hasFile('hinhanh')){
            $file = $request->file('hinhanh');
            $tail = $file->getClientOriginalExtension();
            if($tail != 'jpg' && $tail != 'png' && $tail !='jpeg'){
                return redirect('admin/user/update/' . $id .'/' .$idUser)->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
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
            return redirect('admin/diadiem/list/' .$idUser)->with('thongbao', 'Sửa thành công');
    }

    public function getDelete($id, $idUser)
    {
        $diadiem = DiaDiem::find($id);
        unlink("upload/diadiem/".$diadiem->HinhAnh);
        $diadiem->delete();
        // $diadiem1 = DiaDiem::where('TrangThai',1)->paginate(3);
        return redirect('admin/diadiem/list/'.$idUser,)->with('thongbao', 'Xoá thành công');
    }

    //Tìm kiếm
    public function search(Request $request, $idUser)
    {
        $key = $request->search;
        return redirect('admin/diadiem/showSearch/'.$key .'/'.$idUser);
    }
    public function showSearch($key, $idUser)
    {
        $user = User::find($idUser);
        $dd = DiaDiem::where('TieuDe', 'like', "%$key%")->orwhere('TieuDeKhongDau', 'like', "%$key%")
            ->orwhere('TomTat', 'like', "%$key%")->orwhere('tinh', 'like', "%$key%")->paginate(3);
        return view('admin.diadiem.list', ['DiaDiem' => $dd,'user'=>$user]);
    }

    public function view($id,$tacgia,$idUser){
        $vungmien = VungMien::all();
        $diadiem = DiaDiem::find($id);
        $userAuthor = User::where('Ten','like',$tacgia)->first();
        $user = User::find($idUser);
        $diadiem->save();
        return view('admin.diadiem.view',['DiaDiem'=>$diadiem,'vungmien'=>$vungmien,'user'=>$user,'userAuthor'=>$userAuthor]);
    }

    public function duyet($id, $idUser){
        $diadiem = DiaDiem::find($id);
        $diadiem->TrangThai = 1;
        $diadiem->save();
        return redirect('admin/diadiem/duyetbai/' .$idUser);
    }
}
