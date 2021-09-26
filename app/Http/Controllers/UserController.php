<?php

namespace App\Http\Controllers;

use App\Models\DiaDiem;
use App\Models\VungMien;
use App\Models\User;
use App\Models\Otp;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\Captcha;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function getList()
    {
        $user = User::paginate(5);
        return view('admin.user.list', ['User' => $user]);
    }

    public function getAdd()
    {
        return view('admin.user.add');
    }

    public function getLevel($id)
    {
        $user = User::find($id);
        return view('admin.user.level', ['user' => $user]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'ten' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'pass' => 'required|min:6|max:20',
                'confirm' => 'required|same:pass',
            ],
            [
                'ten.required' => 'Bạn chưa nhập tên người dùng',
                'ten.min' => 'Ten người dùng phải có ít nhất 3 kí tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn phải nhập đúng định dạng email',
                'email.unique' => 'Email đã tồn tại',
                'pass.required' => 'Bạn chưa nhập mật khẩu',
                'pass.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
                'pass.max' => 'Mật khẩu chỉ được tối đa 20 kí tự',
                'confirm.required' => 'Bạn chưa nhập lại mật khẩu',
                'confirm.same' => 'Mật khẩu nhập lại chưa khớp'
            ]);

        $user = new User;
        $user->Ten = $request->ten;
        $user->email = $request->email;
        $user->password = bcrypt($request->pass);
        $user->PhanQuyen = $request->phanquyen;
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $tail = $file->getClientOriginalExtension();
            if ($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg') {
                return redirect('admin/user/add')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4) . "_" . $name;
            while (file_exists("upload/users/" . $hinh)) {
                $hinh = Str::random(4) . "_" . $name;
            }

            $file->move("upload/users", $hinh);
            $user->Avatar = $hinh;
        } else {
            $user->Avatar = "";
        }

        $user->save();
        return redirect('admin/user/add')->with('thongbao', 'Thêm thành công');
    }

    public function postLevel(Request $request, $id)
    {
        $user = User::find($id);
        $user->PhanQuyen = $request->phanquyen;

        $user->save();
        return redirect('admin/user/level/' . $id)->with('thongbao', 'Đã thay đổi quyền');
    }


    public function getDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/list')->with('thongbao', 'Xoá thành công');
    }

    // dăng nhập
    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required',
                'password' => 'required|min:6|max:20',
                'g-recaptcha-response' => new Captcha(),
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
                'password.max' => 'Mật khẩu chỉ được tối đa 20 kí tự',
            ]);
        $user = User::where('email', $request->email)->first();
        $diadiem = DiaDiem::orderBy('SoLuotXem', 'DESC')->take(6)->get();
        $vungmien = VungMien::all();
        $phanquyen = User::where('email', $request->email)->value("PhanQuyen");
        if (strcasecmp($phanquyen, '1') == 0) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('home/home/' . $user->id);
            } else {
                return redirect('login')->with('thongbao', 'Mật khẩu hoặc tên tài khoản không đúng');
            }
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('home/home/' . $user->id);
            } else {
                return redirect('login')->with('thongbao', 'Mật khẩu hoặc tên tài khoản không đúng');
            }
        }

    }

    // Đăng ký
    public function getRegister()
    {
        return view('signup');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request,
            [
                'ten' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'pass' => 'required|min:6|max:20',
                'confirm' => 'required|same:pass',
            ],
            [
                'ten.required' => 'Bạn chưa nhập tên người dùng',
                'ten.min' => 'Ten người dùng phải có ít nhất 3 kí tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn phải nhập đúng định dạng email',
                'email.unique' => 'Email đã tồn tại',
                'pass.required' => 'Bạn chưa nhập mật khẩu',
                'pass.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
                'pass.max' => 'Mật khẩu chỉ được tối đa 20 kí tự',
                'confirm.required' => 'Bạn chưa nhập lại mật khẩu',
                'confirm.same' => 'Mật khẩu nhập lại chưa khớp'
            ]);
        $user = new User();
        $user->Ten = $request->ten;
        $user->email = $request->email;
        $user->password = bcrypt($request->pass);
        $user->PhanQuyen = defined('0');
        $user->save();
        return redirect('login')->with('thongbao', 'Đăng kí thành công');
    }

    // Quản lý tài khoản
    public function getUpdate($id)
    {
        $user = User::find($id);
        return view('admin.user.update', ['user' => $user]);
    }

    public function postUpdate(Request $request, $id)
    {
        $this->validate($request,
            [
                'ten' => 'required|min:3',
                'email' => 'required|email',
                'pass' => 'required|min:6',
                'confirm' => 'required|same:pass',
            ],
            [
                'ten.required' => 'Bạn chưa nhập tên người dùng',
                'ten.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn phải nhập đúng định dạng email',
                'pass.required' => 'Bạn chưa nhập mật khẩu',
                'pass.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
                'confirm.required' => 'Bạn chưa nhập lại mật khẩu',
                'confirm.same' => 'Mật khẩu nhập lại chưa khớp'
            ]);
        $user = User::find($id);
        $user->Ten = $request->ten;
        $user->email = $request->email;
        $user->PhanQuyen = defined('0');
        if ($user->password !== $request->pass) {
            $user->password = bcrypt($request->pass);
        }

        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $tail = $file->getClientOriginalExtension();
            if ($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg') {
                return redirect('admin/user/update')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4) . "_" . $name;
            while (file_exists("upload/users/" . $hinh)) {
                $hinh = Str::random(4) . "_" . $name;
            }

            $file->move("upload/users", $hinh);
            $user->Avatar = $hinh;
        } else {
            $user->Avatar = $user->Avatar;
        }
        $user->save();
        return redirect('home/home/' . $id)->with('thongbao', 'Cập nhật thành công');
    }

    //Tìm kiếm

    public function search(Request $request)
    {
        $key = $request->search;
        return redirect('admin/user/showSearch/' . $key);
    }

    public function showSearch($key)
    {
        $diadiem = DiaDiem::all();
        $user = User::where('Ten', 'like', "%$key%")->orwhere('email', 'like', "%$key%")->paginate(5);
        return view('admin.user.list', ['User' => $user]);
    }

    public function getForgotPassWord()
    {
        return view('forgotPassWord');
    }

    public function postForgotPassWord(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (isset($user)) {
            $otp = new Otp();
            $otp_code = rand(0, 999999);
            $otp->otp_code = $otp_code;
            $otp->email = $request->email;
            $otp->TrangThai = 0;
            $otp->request = 0;
            $otp->end = time() + 1000;
            $otp->save();
            //SendMail
            $data = [
                'otp'=>$otp_code
            ];
            Mail::send('admin.user.email',$data,function ($message) use ($request){
                $message->from('longbadboy2002@gmail.com','MyVietNam')->to($request->email,'OTP')->subject('Mã OTP');
            });
            return redirect('http://127.0.0.1:8000/otp');
        } else {
            return redirect('forgotPassWord')->with('thongbao', 'Email không tồn tại');
        }
    }

    public function getOTP()
    {
        return view('admin.user.updatePass');
    }

    public function postOTP(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:6',
                'password1' => 'required|same:password',
                'otp' => 'required',
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn phải nhập đúng định dạng email',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
                'password1.required' => 'Bạn chưa nhập lại mật khẩu',
                'password1.same' => 'Mật khẩu nhập lại chưa khớp',
                'otp.required' => 'Bạn chưa nhập email'
            ]);

        $otp = Otp::where('email', $request->email)->orderBy('id', 'DESC')->first();
        $user = User::where('email', $request->email)->first();
        if ($otp->request < 4) {
            if ($otp->end > time()) {
                if ($otp->otp_code == $request->otp) {
                    if ($otp->TrangThai != 1) {
                        $otp->TrangThai = 1;
                        $user->password = bcrypt($request->password);
                        $user->save();
                        $otp->save();
                        return redirect('login')->with('thongbao', 'Xin mời bạn đăng nhập lại');
                    } else {
                        return redirect('otp')->with('thongbao', 'OTP đã được sử dụng');
                    }
                } else {
                    $otp->request = $otp->request + 1;
                    $otp->save();
                    return redirect('otp')->with('thongbao', 'Mã OTP không chính xác');
                }
            } else {
                $otp->TrangThai = 1;
                $otp->request = $otp->request + 1;
                $otp->save();
                return redirect('otp')->with('thongbao', 'Mã gửi OTP quá 5 phút');
            }
        } else {
            $otp->TrangThai = 1;
            $otp->request = $otp->request + 1;
            $otp->save();
            return redirect('otp')->with('thongbao', 'Mã OTP nhập quá số lần quy định');
        }
    }
    // return redirect('otp')->with('thongbao','Bạn OTP không chính xác');

}
