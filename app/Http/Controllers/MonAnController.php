<?php

namespace App\Http\Controllers;

use App\Models\DiaDiem;
use App\Models\MonAn;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MonAnController extends Controller
{
    public function getList()
    {
        $diadiem = DiaDiem::all();
        $monan = MonAn::paginate(3);
        return view('admin.monan.list', ['MonAn' => $monan, 'DiaDiem' => $diadiem]);
    }

    public function getAdd()
    {
        $diadiem = DiaDiem::all();
        return view('admin.monan.add', ['DiaDiem' => $diadiem]);
    }

    public function postAdd(Request $request)
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
        return view('admin.monan.add', ['DiaDiem' => $diadiem])->with('thongbao', 'Thêm thành công');
    }

    public function getDelete($id)
    {
        $monan = MonAn::find($id);
        unlink("upload/monan/".$monan->HinhAnh);
        $monan->delete();
        return redirect('admin/monan/list')->with('thongbao', 'Xoá thành công');
    }

    public function getUpdate($id){
        $monan = MonAn::find($id);
        $dd = DiaDiem::all();
        return view('admin/monan/update', ['MonAn'=>$monan,'DiaDiem'=>$dd]);
    }

    public function postUpdate($id, Request $request){
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
                return redirect('admin/user/update')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
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
        return redirect('admin/monan/update/' . $id)->with('thongbao', 'Sửa thành công');
    }
    public function search(Request $request)
    {
        $key = $request->search;
        return redirect('admin/monan/showSearch/'.$key);
    }
    public function showSearch($key)
    {
        $monan = MonAn::where('TenMonAn', 'like', "%$key%")->orwhere('MoTa', 'like', "%$key%")->take(30)->paginate(5);
        return view('admin.diadiem.list', ['MonAn' => $monan]);
    }

    // public function postSearch(Request $request){
    //     $key = $request->search;
    //     $ketqua = MonAn::where('TenMonAn', 'like', "%$key%")->orwhere('MoTa', 'like', "%$key%")->take(30)->paginate(5);
    //     return view('admin/monan/list',['MonAn'=>$ketqua]);
    // }

    // public function getListDuyet(){
    //     $monan = MonAn::where('TrangThai',0)->paginate(3);
    //     $diadiem = DiaDiem::all();
    //     return view('admin.monan.listDuyet', ['MonAn' => $monan, 'DiaDiem' => $diadiem]);
    // }

    // public function getDuyet($id){
    //     $monan = MonAn::find($id);
    //     $monan->TrangThai = 1;
    //     $monan->save();
    //     return redirect('admin/monan/duyetbai');
    // }
}
