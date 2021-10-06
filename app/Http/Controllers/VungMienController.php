<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VungMien;
use App\Models\User;

class VungMienController extends Controller
{
    public function getList($idUser){
        $user = User::find($idUser);
        $vungmien = VungMien::paginate(5);
        return view('admin.vungmien.list',['vungmien'=>$vungmien,'user'=>$user]);
    }
    public function getAdd($idUser){
        $user = User::find($idUser);
        return view('admin.vungmien.add',['user'=>$user]);
    }
    public function postAdd(Request $request, $idUser){
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

        return redirect('admin/vungmien/add/'.$idUser)->with('thongbao','Thêm thành công');

    }
    public function getUpdate($id, $idUser){
        $user = User::find($idUser);
        $vungmien = VungMien::find($id);
        return view('admin.vungmien.update',['vungmien'=>$vungmien, 'user'=>$user]);
    }
    public function postUpdate(Request $request,$id, $idUser){
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
        return redirect('admin/vungmien/update/'.$id.'/'.$idUser)->with('thongbao','Sửa thành công');
    }

    public function getDelete($id, $idUser){
        $vungmien = VungMien::find($id);
        $vungmien->delete();
        return redirect('admin/vungmien/list/'.$idUser)->with('thongbao','Xoá thành công');
    }
}
