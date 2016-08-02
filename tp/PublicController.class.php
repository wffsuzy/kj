<?php
/**
 * Created by PhpStorm.
 * User: maozeshuai
 * Time: 16-7-5 下午2:07
 */

namespace PackManager\Controller;

use Think\Controller;

class PublicController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        if(session('admin_info')){
            $this->redirect('game/index');
        }

        if(IS_POST){
            $username = I('post.username','','trim');
            $password = I('post.password','','trim');
            if(!$username || !$password){
                ajax_return(0,'用户名密码不得为空');
            }
            if(!$info = M('admin')->where(array('admin_name'=>$username))->find()){
                ajax_return(0,'用户名不存在');
            }

            if($info['password'] != md5($password)){
                ajax_return(0,'密码错误');
            }
            session('admin_info',$info);
            ajax_return(1,'success',U('Game/index'));
        }

        $this->display();
    }

    public function logout(){
        session('admin_info',null);
        $this->redirect('login');
    }


}