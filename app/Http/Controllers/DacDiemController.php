<?php

namespace App\Http\Controllers;

use App\Models\DacDiem;
use App\Models\VungMien;
use App\Models\User;
use Illuminate\Http\Request;

class DacDiemController extends Controller
{
    public function getList($idUser)
    {
        $user = User::find($idUser);
        $dacdiem = DacDiem::paginate(10);
        return view('admin.dacdiem.list', ['dacdiem' => $dacdiem,'user'=>$user]);
    }

    public function getAdd($idUser)
    {
        $user = User::find($idUser);
        $vungmien = VungMien::all();
        return view('admin.dacdiem.add', ['vungmien' => $vungmien,'user'=>$user]);
    }

    public function postAdd(Request $request, $idUser)
    {
        $this->validate($request,
            [
                'ten' => 'required|unique:DacDiem|min:3|max:100'
            ],
            [
                'ten.required' => 'Bạn chưa nhập tên đặc điểm',
                'ten.unique' => 'Tên đặc điểm đã tồn tại',
                'ten.min' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 kí tự',
                'ten.max' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 kí tự',
            ]);
        $dacdiem = new DacDiem;
        $dacdiem->Ten = $request->ten;
        $dacdiem->TenKhongDau = changeTitle($request->ten);
        $dacdiem->idVungMien = $request->VungMien;
        $dacdiem->save();
        return redirect('admin/dacdiem/list/'.$idUser)->with('thongbao', 'Thêm thành công');

    }

    public function getUpdate($id, $idUser)
    {
        $user = User::find($idUser);
        $vungmien = VungMien::all();
        $dacdiem = DacDiem::find($id);
        return view('admin.dacdiem.update', ['vungmien' => $vungmien], ['dacdiem' => $dacdiem,'user'=>$user]);
    }

    public function postUpdate(Request $request, $id, $idUser)
    {
        $this->validate($request,
            [
                'ten' => 'required|min:3|max:100'
            ],
            [
                'ten.required' => 'Bạn chưa nhập tên đặc điểm',
                'ten.min' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 kí tự',
                'ten.max' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 kí tự',
            ]);
        $dacdiem = DacDiem::find($id);
        $dacdiem->Ten = $request->ten;
        $dacdiem->TenKhongDau = changeTitle($request->ten);
        $dacdiem->idVungMien = $request->VungMien;
        $dacdiem->save();
        return redirect('admin/dacdiem/list/' .$idUser)->with('thongbao', 'Sửa thành công');
    }

    public function getDelete($id, $idUser)
    {
        $dacdiem = DacDiem::find($id);
        $dacdiem->delete();
        return redirect('admin/dacdiem/list/'.$idUser)->with('thongbao', 'Xoá thành công');
    }

    public function search(Request $request, $idUser)
    {
        $user = User::find($idUser);
        $key = $request->search;
        if ($key == "Miền Bắc" || $key == "Bắc"){
            $key = "1";
        }else if ($key == "Miền Trung" || $key == "Trung"){
            $key = "2";
        }else if ($key == "Miền Nam" || $key == "Nam"){
            $key = "3";
        }else{
            $key = $key;
        }
        $dacdiem = DacDiem::where('Ten', 'like', "%$key%")->orwhere('TenKhongDau', 'like', "%$key%")->orwhere('idVungMien', 'like', "%$key%")->take(30)->paginate(5);
        return view('admin.dacdiem.list', ['dacdiem' => $dacdiem, 'user'=>$user]);
    }
}
