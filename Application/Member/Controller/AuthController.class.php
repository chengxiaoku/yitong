<?php
namespace Member\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/13
 * Time: 14:07
 */
class AuthController extends Controller{


    /**
     * 初始化函数
     * (non-PHPdoc)
     * @see Controller::_initialize()
     */
    protected function _initialize() {
        define('ASSETS', './Public/assets/');
        $site_name = C("SITE_NAME");
        $this->assign('site_title', $site_name);
    }

    public function login(){
        if (IS_POST) {
            $username = I('post.username','','trim');
            $password = I('post.password','','trim');
            $verify = I('post.verify','','trim');

            if(empty($username)){
                $this->assign('error', '用户名不能为空');
                $this->display();
                exit;
            }
            if(empty($password)){
                $this->assign('error', '密码不能为空');
                $this->display();
                exit;
            }
            if(empty($verify)){
                $this->assign('error','验证码不能为空');
                $this->display();
                exit;
            }

            //检测验证码
            $verifyObject = new \Think\Verify();
            if (!$verifyObject->check($verify, 'user_login')) {
                $this->assign('error', '输入验证码有误');
                $this->display();
                exit;
            }
            //验证用户名密码
            $data = D('User')->sel($username,$password);
            if($data){
                $this->assign('error',$data);
                $this->display();
                exit;
            }
            $start = time();
            $session_expire = C('SESSION_EXPIRE');
            session("expire", $start + $session_expire);
            $ref = U('index/index');

            redirect($ref);

        } else {
            if($this->is_login()){

                $url =  U('index/index');
                redirect($url);
            }
            $this->display('login');
        }

    }

    /**
     * 验证登录
     */
    public function is_login(){
        $user_id = session('user_id');
        return empty($user_id) ? false : true;
    }
    
    /**
     *安全退出
     */
    public function logout(){
        //清除会话
        session(NULL);
        $url = U('auth/login');
        redirect($url);
    }
    /**
     * 验证码信息
     */
    public function verify(){
        ob_clean();
        //import("ORG.Util.Think.Image");
        $verify = new \Think\Verify();
        $verify->codeSet = '0123456789';
        $verify->imageW = 130;
        $verify->imageH = 35;
        $verify->fontSize = 18;
        $verify->length = 4;
        $verify->entry('user_login');
    }
}