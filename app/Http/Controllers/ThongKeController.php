<?php

namespace App\Http\Controllers;
use App\Models\DiaDiem;
use App\Models\User;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function getList($idUser){
        $user = User::find($idUser);
        $diadiem = DiaDiem::orderBy('SoLuotXem','DESC')->paginate(3);
        return view('admin.thongke.list',['DiaDiem'=>$diadiem,'user'=>$user]);
    }
}
