<?php

namespace App\Http\Controllers;

use App\Models\DiaDiem;
use App\Models\MonAn;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MonAnController extends Controller
{
    public function getList($idUser)
    {
        $user = User::find($idUser);      
        $monan = MonAn::orderBy('id','DESC')->paginate(3);
        $diadiem = DiaDiem::all();
        return view('admin.monan.list', ['MonAn' => $monan, 'DiaDiem' => $diadiem,'user'=>$user]);
    }

    public function getAdd($idUser)
    {
        $user = User::find($idUser);
        $diadiem = DiaDiem::all();
        return view('admin.monan.add', ['DiaDiem' => $diadiem,'user'=>$user]);
    }

    public function postAdd(Request $request, $idUser)
    {
        $this->validate($request,
            [
                'tenmonan' => 'required',
                'mota' => 'required',
                'hinhanh' => 'required',
                'iddd' => 'required',
            ],
            [
                'tenmonan.required' => 'Bạn chưa nhập tên món ăn',
                'mota.required' => 'Bạn chưa nhập mô tả',
                'hinhanh.unique' => 'Bạn chưa chọn hình ảnh',
                'iddd.required' => 'Bạn chưa nhập địa điểm',

            ]);
        $diadiem = DiaDiem::all();
        $monan = new MonAn();
        $monan->TenMonAn = $request->tenmonan;
        $monan->TieuDe = $request->tieude;
        $monan->Mota = $request->mota;
        $monan->idDiaDiem = $request->iddd;
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
        return redirect('admin/monan/list/'.$idUser)->with('thongbao', 'Thêm thành công');
    }

    public function getDelete($id, $idUser)
    {
        $monan = MonAn::find($id);
        unlink("upload/monan/".$monan->HinhAnh);
        $monan->delete();
        return redirect('admin/monan/list/'.$idUser)->with('thongbao', 'Xoá thành công');
    }

    public function getUpdate($id, $idUser){
        $user = User::find($idUser);
        $monan = MonAn::find($id);
        $dd = DiaDiem::all();
        return view('admin.monan.update', ['MonAn'=>$monan,'DiaDiem'=>$dd,'user'=>$user]);
    }

    public function postUpdate($id, Request $request, $idUser){
        $this->validate($request,
            [
                'tenmonan' => 'required',
                'mota' => 'required',
                'tieude' => 'required',
                'iddd' => 'required',
            ],
            [
                'tenmonan.required' => 'Bạn chưa nhập tên món ăn',
                'mota.required' => 'Bạn chưa nhập mô tả',
                'tieude.required' => 'Bạn chưa nhập tiêu đề',
                'iddd.required' => 'Bạn chưa nhập id đặc điểm',
            ]);

        $monan = MonAn::find($id);
        $monan->TenMonAn = $request->tenmonan;
        $monan->TieuDe = $request->tieude;
        $monan->MoTa = $request->mota;
        $monan->tinh = $request->tinh;

        $monan->idDiaDiem = $request->iddd;
        if($request->hasFile('hinhanh')){
            $file = $request->file('hinhanh');
            $tail = $file->getClientOriginalExtension();
            if($tail != 'jpg' && $tail != 'png' && $tail !='jpeg'){
                return redirect('admin/monan/update/' . $id.'/'.$idUser)->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
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
        return redirect('admin/monan/list/'.$idUser)->with('thongbao', 'Sửa thành công');
    }
    public function search(Request $request, $idUser)
    {
        $key = $request->search;
        return redirect('admin/monan/showSearch/'.$key.'/'.$idUser);
    }
    public function showSearch($key, $idUser)
    {
        $user = User::find($idUser);
        $diadiem = DiaDiem::all();
        $monan = MonAn::where('TenMonAn', 'like', "%$key%")->orwhere('MoTa', 'like', "%$key%")->take(30)->paginate(5);
        return view('admin.monan.list', ['MonAn' => $monan,'user'=>$user,'DiaDiem'=>$diadiem]);
    }

    public function view($id, $idUser){
        $user = User::find($idUser);
       $monan = MonAn::find($id);
        return view('admin.monan.view',['monan'=>$monan,'user'=>$user]);
    }
}
