<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private  $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService=$userService;
    }

    public function login(){
        return view('pages.account.login');
    }
    public function checkLogin(Request $request){
        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
            'level'=>Constant::user_level_client,
        ];
        $remember=$request->remember;

        if (Auth::attempt($credentials,$remember)){
            return redirect('');
        }
        else
            return back()->with('notification','Lỗi: Email hoặc mật khẩu sai !');

    }
    public function logout(){
        Auth::logout();
        return back();
    }
    public function register(){
        return view('pages.account.register');
    }
    public function postRegister(Request $request){
        if ($request->password !=$request->password_confirmation){
            return back()->with('notification','Lỗi: mật khẩu và xác nhận lại mật kẩu không trùng khớp');
        }
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'level'=>2,
        ];
        $this->userService->create($data);

        return redirect('account/login')->with('notification','Bạn đã đăng kí thành công! Hãy đăng nhập');
    }
}
