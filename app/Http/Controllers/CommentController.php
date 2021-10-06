<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getList($idUser){
        $user = User::find($idUser);
        $comment = Comment::paginate(5);
        return view('admin.comment.list',['comment'=>$comment,'user'=>$user]);
    }
    public function getDelete($id, $idUser){
        $comment = Comment::find($id);
        unlink("upload/comment/".$comment->HinhAnh);
        $comment->delete();
        return redirect('admin/comment/list/'.$idUser)->with('thongbao','Xoá thành công');
    }
    public function search(Request $request,$idUser)
    {
        $key = $request->search;
        return redirect('admin/comment/showSearch/'.$key.'/'.$idUser);
    }
    public function showSearch($key, $idUser)
    {
        $users = User::find($idUser);
        $user = User::where('Ten','like',"%$key%")->first();
        if(isset($user)){
            $comment = Comment::where('idUser',$user->id)->orwhere('NoiDung','like',"%$key%")->orwhere('created_at','like',"%$key%")->paginate(5);
        }else{
            $comment = Comment::where('NoiDung','like',"%$key%")->orwhere('created_at','like',"%$key%")->paginate(5);
        }
       
        return view('admin.comment.list',['comment'=>$comment,'user'=>$users]);
    }
}
