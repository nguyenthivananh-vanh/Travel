<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getList(){
        $comment = Comment::paginate(5);
        return view('admin.comment.list',['comment'=>$comment]);
    }
    public function getDelete($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('admin/comment/list')->with('thongbao','Xoá thành công');
    }
}
