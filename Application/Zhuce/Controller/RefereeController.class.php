<?php
namespace Zhuce\Controller;
use Zhuce\Controller\BaseController;

/**
 * 用户推广页面
 * Created by PhpStorm.
 * User: hdj
 * Date: 2016/11/22
 * Time: 11:26
 */
class RefereeController extends BaseController {
    /**
     * 控制器初始化
     */
    public function _initialize() {
        //定义资源目录
        define('ASSETS', './Public/assets/');
    }

    /**
     * 注册页
     */
    public function index() {
        if($_POST){
            $zc = C('zhicheng');
            $this->assign('zc',$zc);
            $this->yz('name','用户名不能为空');
            $this->yz('identity','身份证不能为空');
            $this->yz('password','密码不能为空');
            $this->yz('sex','性别不能为空');
            $this->yz('nation','民族不能为空');
            $this->yz('email','邮箱不能为空');
            $this->yz('img','身份证照片不能为空');
            if(I("post.password") != I("post.next_password")){
                $this->assign('error','两次密码不一样');
                $this->display();
                exit;
            }
            //入库
            $data['name'] = I('post.name');
            $identity = I('post.identity');
            $data['identity'] = I('post.identity');
            $pas = I('post.password');
            $data['password'] = md5($pas);
            $data['sex'] = I('post.sex');
            $data['nation'] = I("post.nation");
            $em = I('post.email');
            $data['email'] = I('post.email');
            $data['card'] = I("post.img");
            $data['titles'] = I("post.titles");
            $data['thumb'] = I("post.headimg");
            $da = M("member")->where("identity='$identity'")->find();
            if(!empty($da)){
                $this->assign('error','身份证号已存在');
                $this->display();
                exit;
            }
            $_da = M("member")->where("email='$em'")->find();
            if(!empty($_da)){
                $this->assign('error','邮箱已存在');
                $this->display();
                exit;
            }
            $link = M('member')->add($data);
            if($link){
                $this->success('注册成功，等待管理员通过',"./member.php?m=member&c=auth&a=login",5);
            }else{
                $this->error('注册失败',"./member.php?m=member&c=auth&a=login");
            }
        }else{
            $zc = C('zhicheng');
            $this->assign('zc',$zc);
            $this->display();
        }


    }
    public function yz($name,$mess){
            $name = I("post.$name",'','trim');
            if(empty($name)){
                $this->assign('error',$mess);
                $this->display();
                exit;
        }
    }


}