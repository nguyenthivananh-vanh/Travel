<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VungMien;

class VungMienController extends Controller
{
    public function getList(){
        $vungmien = VungMien::paginate(5);
        return view('admin.vungmien.list',['vungmien'=>$vungmien]);
    }
    public function getAdd(){
        return view('admin.vungmien.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
        [
            'ten'=>'required|unique:VungMien|min:3|max:100'
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên vùng miền',
            'ten.unique'=>'Tên vùng miền đã tồn tại',
            'ten.min'=> 'Tên thể loại phải có độ dài từ 3 cho đến 100 kí tự',
            'ten.max'=> 'Tên thể loại phải có độ dài từ 3 cho đến 100 kí tự',
        ]);
        $vungmien = new VungMien;
        $vungmien->Ten = $request->ten;
        $vungmien->TenKhongDau = changeTitle($request->ten);
        $vungmien->save();
        return redirect('admin/vungmien/add')->with('thongbao','Thêm thành công');

    }
    public function getUpdate($id){
        $vungmien = VungMien::find($id);
        return view('admin.vungmien.update',['vungmien'=>$vungmien]);
    }
    public function postUpdate(Request $request,$id){
        $this->validate($request,
        [
            'ten'=>'required|unique:VungMien|min:3|max:100'
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên vùng miền',
            'ten.unique'=>'Tên vùng miền đã tồn tại',
            'ten.min'=> 'Tên thể loại phải có độ dài từ 3 cho đến 100 kí tự',
            'ten.max'=> 'Tên thể loại phải có độ dài từ 3 cho đến 100 kí tự',
        ]);
        $vungmien = VungMien::find($id);
        $vungmien->Ten = $request->ten;
        $vungmien->TenKhongDau = changeTitle($request->ten);
        $vungmien->save();
        return redirect('admin/vungmien/update/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getDelete($id){
        $vungmien = VungMien::find($id);
        $vungmien->delete();
        return redirect('admin/vungmien/list')->with('thongbao','Xoá thành công');
    }
}
