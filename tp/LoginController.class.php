<?php
/**
 * Created by PhpStorm.
 * User: l
 * Date: 15-7-12
 * Time: 下午7:52
 */

namespace Media\Controller;


use Think\Controller;

class LoginController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->display();
    }

    public function login()
    {
        $username = I('post.username', '', 'trim');
        $password = I('post.password', '', 'trim');

        $result = null;
        if ($username == 'admin' && $password == 'mycsoft@mycsoft123') {
            $result = 'admin';
        }
        if ($result != null) {
            session('admin', $result);
            $this->redirect('Index/index');
        } else {
            $this->error('用户名或密码错误', 'index', 1);
        }
    }

    public function logout()
    {
        session('admin', null);
        $this->redirect('Login/index');
    }
}