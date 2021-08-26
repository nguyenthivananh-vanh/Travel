<?php

namespace App\Http\Controllers;
use App\Models\DiaDiem;
use Illuminate\Http\Request;

class DiaDiemController extends Controller
{
    public function getList(){       
        $diadiem = DiaDiem::all();
        return view('admin.diadiem.list',['diadiem'=>$diadiem]);
    }
}
