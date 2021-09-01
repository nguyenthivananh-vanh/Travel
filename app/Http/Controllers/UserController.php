<?php

namespace App\Http\Controllers;
use App\Models\DiaDiem;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getList(){
        $user = User::paginate(5);
        return view('admin.user.list',['User'=>$user]);
    }

    public function getAdd(){
        return view('admin.user.add');
    }
    public function getLevel($id){
        $user = User::find($id);
        return view('admin.user.level',['user'=>$user]);
    }

    public function postAdd(Request $request){
        $this->validate($request,
        [
            'ten'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'pass'=>'required|min:6|max:20',
            'confirm'=>'required|same:pass',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên người dùng',
            'ten.min'=>'Ten người dùng phải có ít nhất 3 kí tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=> 'Bạn phải nhập đúng định dạng email',
            'email.unique'=> 'Email đã tồn tại',
            'pass.required'=>'Bạn chưa nhập mật khẩu',
            'pass.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
            'pass.max'=>'Mật khẩu chỉ được tối đa 20 kí tự',
            'confirm.required'=>'Bạn chưa nhập lại mật khẩu',
            'confirm.same'=>'Mật khẩu nhập lại chưa khớp'
        ]);

        $user = new User;
        $user->Ten = $request->ten;
        $user->email = $request->email;
        $user->password= bcrypt($request->pass);
        $user->PhanQuyen = $request->phanquyen;
        if($request->hasFile('hinhanh')){
            $file = $request->file('hinhanh');
            $tail = $file->getClientOriginalExtension();
            if($tail != 'jpg' && $tail != 'png' && $tail !='jpeg'){
                return redirect('admin/user/add')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/users/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }

            $file->move("upload/user",$hinh);
            $user->Avatar = $hinh;
        }else{
            $user->Avatar = "";
        }

        $user->save();
        return redirect('admin/user/add')->with('thongbao','Thêm thành công');
    }
    public function postLevel(Request $request,$id){
        $user = User::find($id);
        $user->PhanQuyen = $request->phanquyen;

        $user->save();
        return redirect('admin/user/level/'.$id)->with('thongbao','Đã thay đổi quyền');
    }


    public function getDelete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/list')->with('thongbao','Xoá thành công');
    }


    public function postdangnhap(Request $request){

        $phanquyen = DB::table('users')->where('email',$request->email)->value('PhanQuyen');
        if (strcasecmp($phanquyen,'1')==0){
            if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                $diadiem = DiaDiem::paginate(3);
                return view('admin.diadiem.list',['DiaDiem'=>$diadiem])->with('thongbao','Đăng nhập thành công');;
            }else{
                return view('login')->with('thongbao','Đăng nhập thất bại');
            }
        }else{
            if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return "Trang chủ của user";
            }else{
                return view('login')->with('thongbao','Đăng nhập thất bại');
            }
        }

    }

    public function postdangky(Request $request){
        $user = new User();
        $user->Ten =$request->name;
        $user->email =$request->email;
        $user->password = bcrypt($request->password);
        $user->PhanQuyen = defined('0');
        $user->save();
        return redirect('login')->with('thongbao','Đăng kí thành công');
    }

    public function getUpdate($id){
        $user = User::find($id);
        return view('admin.user.update',['user'=>$user]);
    }

    public function postUpdate(Request $request,$id){
        $this->validate($request,
        [
            'ten'=>'required|min:3',
            'email'=>'required|email',
            'pass'=>'required|min:6|max:20',
            'confirm'=>'required|same:pass',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên người dùng',
            'ten.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=> 'Bạn phải nhập đúng định dạng email',
            'pass.required'=>'Bạn chưa nhập mật khẩu',
            'pass.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
            'pass.max'=>'Mật khẩu chỉ được tối đa 20 kí tự',
            'confirm.required'=>'Bạn chưa nhập lại mật khẩu',
            'confirm.same'=>'Mật khẩu nhập lại chưa khớp'
        ]);
        $user = User::find($id);
        $user->Ten =$request->name;
        $user->email =$request->email;
        $user->password = bcrypt($request->password);
        $user->PhanQuyen = defined('0');
        if($request->hasFile('hinhanh')){
            $file = $request->file('hinhanh');
            $tail = $file->getClientOriginalExtension();
            if($tail != 'jpg' && $tail != 'png' && $tail !='jpeg'){
                return redirect('admin/user/update')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/users/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }

            $file->move("upload/users",$hinh);
            $user->Avatar = $hinh;
        }else{
            $user->Avatar = "";
        }
        $user->save();
        return redirect('admin/user/update/'.$id)->with('thongbao','Cập nhật thành công');
    }
}
