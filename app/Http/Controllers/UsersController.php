<?php

namespace App\Http\Controllers;

//uuse App\User;
use App\Http\Repositories\UserRepository;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * 用户存储库的实现。
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * 创建新的控制器实例。
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }
    
    public function index(){
        $list = $this->users->get_arr();
        var_dump($list);exit;
        return "<br />test page 123"; 
    }

    /**
     * 显示指定用户的 profile。
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->users->find($id);

        return view('user.profile', ['user' => $user]);
    }
}