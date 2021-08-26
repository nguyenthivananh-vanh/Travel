<?php

namespace App\Http\Controllers;
use App\Models\DacDiem;
use App\Models\VungMien;
use Illuminate\Http\Request;

class DacDiemController extends Controller
{
    public function getList(){
        $dacdiem = DacDiem::all();
        return view('admin.dacdiem.list',['dacdiem'=>$dacdiem]);
    }
}
