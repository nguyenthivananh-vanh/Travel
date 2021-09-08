<?php

namespace App\Http\Controllers;
use App\Models\DiaDiem;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function getList(){
        $diadiem = DiaDiem::orderBy('SoLuotXem','DESC')->paginate(3);
        return view('admin.thongke.list',['DiaDiem'=>$diadiem]);
    }
}
