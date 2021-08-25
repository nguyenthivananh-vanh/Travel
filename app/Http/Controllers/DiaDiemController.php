<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiaDiemController extends Controller
{
    public function getList(){       
        return view('admin.diadiem.list');
    }
}
