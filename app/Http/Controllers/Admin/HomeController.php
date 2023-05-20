<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getLogin(){
        return view('admincp.login');
    }
    public function postLogin(Request $request){
        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
            'level'=>[Constant::user_level_admin,Constant::user_level_host],//Tai khoan cap do host hoac admin
        ];
        $remember=$request->remember;
        if (Auth::attempt($credentials,$remember)){
            return redirect()->intended('admin'); //Mac dinn trang chu
        }
        else
            return back()->with('notification','Lỗi: Email hoặc mật khẩu sai !');

    }
    public function logout(){
        Auth::logout();
        return redirect('admin/login');
    }

}
