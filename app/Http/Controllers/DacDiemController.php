<?php

namespace App\Http\Controllers;

use App\Models\DacDiem;
use App\Models\VungMien;
use Illuminate\Http\Request;

class DacDiemController extends Controller
{
    public function getList()
    {
        $dacdiem = DacDiem::paginate(5);
        return view('admin.dacdiem.list', ['dacdiem' => $dacdiem]);
    }

    public function getAdd()
    {
        $vungmien = VungMien::all();
        return view('admin.dacdiem.add', ['vungmien' => $vungmien]);
    }

    public function postAdd(Request $request)
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
        return redirect('admin/dacdiem/add')->with('thongbao', 'Thêm thành công');

    }

    public function getUpdate($id)
    {
        $vungmien = VungMien::all();
        $dacdiem = DacDiem::find($id);
        return view('admin.dacdiem.update', ['vungmien' => $vungmien], ['dacdiem' => $dacdiem]);
    }

    public function postUpdate(Request $request, $id)
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
        return redirect('admin/dacdiem/update/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getDelete($id)
    {
        $dacdiem = DacDiem::find($id);
        $dacdiem->delete();
        return redirect('admin/dacdiem/list')->with('thongbao', 'Xoá thành công');
    }

    public function search(Request $request)
    {
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
        return view('admin.dacdiem.list', ['dacdiem' => $dacdiem]);
    }
}
