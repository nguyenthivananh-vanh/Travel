<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getList(){       
        return view('admin.comment.list');
    }
}
