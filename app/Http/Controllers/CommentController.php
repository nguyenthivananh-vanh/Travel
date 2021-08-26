<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getList(){
        $comment = Comment::all();
        return view('admin.comment.list',['comment'=>$comment]);
    }
}
