<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\User\UserServiceInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService=$userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users=$this->userService->searchAndPaginate('name',$request->get('search'));
        return view('admincp.adminpages.home',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.adminpages.user.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->get('password')!=$request->get('password_confirmation')){
            return back()->with('notification'.'ERROR:Confirm password does not match');
        }

        $data=$request->all();
        $data['password']=bcrypt($request->get('password'));
        if ($request->hasFile('image')){
            $data['avatar']=Common::uploadFile($request->file('image'),'img/user');
        }
        $user=$this->userService->create($data);
        return redirect('admin/user/'.$user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admincp.adminpages.user.show',compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admincp.adminpages.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        // Xử lí mật khẩu
        if ($request->get('password') != null){
            if ($request->get('password') != $request->get('password_confirmtion')) {
                return back()->with('notification', 'Lỗi: Mật khẩu và xác nhận mật khẩu không trùng khớp');
            }
                    $data['password']=bcrypt($request->get('password'));
    }
        else{
            unset($data['password']);
        }
        // Xử lí anh
        if ($request->hasFile('image')){
            // Thêm file mới
            $data ['avatar']=Common::uploadFile($request->file('image'),'img/user');
            // Xóa ảnh cũ
            $file_name_old=$request->get('image_old');
            if ($file_name_old!=''){
                unlink('img/user'.$file_name_old);
            }
        }
        // Cập nhật dữ liệu
        $this->userService->update($data,$user->id);
        return redirect('admin/user/'.$user->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->userService->delete($user->id);
        // Xóa file
        $file_name=$user->avatar;
        if ($file_name!=''){
            unlink('img/user/'.$file_name);
        }
        return redirect('admin/user');
    }
}
