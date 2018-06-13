<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
/**
 * 管理员设置
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/14
 * Time: 20:02
 */
class AdminController extends BaseController{

    /**
     *管理员主页面
     */
    public function index(){
        $this->assign('page_title','管理员管理');
        $admin = M("admin");
        $page = C('PAGE_SIZE');
        $count = $admin->count();
         //= $admin->table(' as a, as b')->where('a.roleid = b.id')

        $Page = new \Think\Page($count,$page);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $list = $admin->order("addtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();;
        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');
        $show       = $Page->show();// 分页显示输出
        $arr =array();
        foreach ($list as $val){
            if(is_array($val)){
                $id = $val['roleid'];
                if(!empty($id)){
                    $data = M("admin_role")->field("name")->where("id = $id")->find();
                    if(!is_null($data)){
                        $arr[] = $data['name'];
                    }else{
                        $arr[] = '';
                    }
                }else{
                    $arr[] ='';
                }
            }
        }
        $this->assign('arr',$arr);
        $this->assign("data",$list);
        $this->assign('page',$show);

        $this->display();
    }


       public function admin_kai(){
           //调用每页显数量
           //获取搜索内容

            $this->assign("page_title","管理员管理");
            $page_size = C('PAGE_SIZE');
            $keyword = $_POST['search'];
            $keyword = trim($keyword);
            if ($keyword != null) {
               session('member_search_key', $keyword);
            }
            $keyword = empty($keyword) ? session('member_search_key') : $keyword;
            $sql = M("admin");
            $arr['username'] = array('like',"%$keyword%");
            $count = $sql->where($arr)->count();
            $Page = new \Think\Page($count,$page_size);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $list = $sql->where($arr)->limit($Page->firstRow.','.$Page->listRows)->select();
            $Page->setConfig('next','下一页');
            $Page->setConfig('prev','上一页');
            $show       = $Page->show();// 分页显示输出
            // 分页显示输出
           $arr =array();
           foreach ($list as $val){
               if(is_array($val)){
                   $id = $val['roleid'];
                   if(!empty($id)){
                       $data = M("admin_role")->field("name")->where("id = $id")->find();
                       if(!is_null($data)){
                           $arr[] = $data['name'];
                       }else{
                           $arr[] = '';
                       }
                   }else{
                       $arr[] ='';
                   }
               }
           }
           $this->assign('arr',$arr);
            $this->assign("data",$list);
            $this->assign('page',$show);
            $this->display('index');

        }



    /**
     * 批量删除所有管理员
     */
    public function delall(){
        $id = I('get.id','','trim');
        $url = U('admin/index');
        if(empty($id)){
            $this->error('缺少参数!',$url);
        }
        $id = trim($id,',');
        $link = M('admin')->delete($id);
        if ($link) {
            $this->success('删除成功!',$url);
        } else {
            $this->error('删除失败!',$url);
        }
    }

    /**
     * 添加管理员
     */
    public function add(){
        $this->assign('page_title','添加管理员');
        //查询 状态开启的 角色
        $data = M('admin_role')->field('id,name')->where("disabled = '1'")->select();
        $this->assign('data',$data);
        $this->display();
    }

    /**
     *添加管理员入库
     */
    public function add_sql(){
        $user = isset($_POST['user'])? $_POST['user']:'';
        $paw = isset($_POST['paw'])? $_POST['paw']:'';
        $paw1 = isset($_POST['paw1'])? $_POST['paw1']:'';
        $name = isset($_POST['name'])? $_POST['name']:'';
        $role = isset($_POST['role'])? $_POST['role']:'';
        if(empty($user) || empty($paw) ||empty($paw1) ||empty($name) ||empty($role)){
            $this->error("非法请求",U('admin/add'));
            exit();
        }
        if($paw != $paw1){
            $this->error("密码错误",U('admin/add'));
            exit();
        }
        $use_mes_data = M('admin')->field('username')->select();
        foreach ($use_mes_data as $value){
            if($user == $value['username']){
                $this->error('用户名重复，请勿重复添加!',U('admin/add'));
            }
        }
        //加密密码
        $paw = md5($paw);
        //获取本地时间
        $time = date('Y-m-d h:i:s',time());
        //获取IP
        $reIP=$_SERVER["REMOTE_ADDR"];

        $data['username']=$user;
        $data['password']=$paw;
        $data['roleid']=$role;
        $data['lastip']=$reIP;
        $data['addtime']=$time;
        $data['realname']=$name;
        $data['headimg']=I('post.img');
        $link = M("admin")->add($data);
        $url =U('admin/index');
        if ($link) {
            $this->success("数据添加成功", $url);
            exit();
        } else {
            $this->error("数据添加失败",$url);
            exit();
        }
    }

    /**
     *编辑管理员
     */
    public function update(){
        if(IS_GET){
            $id = I('get.id','','trim');
            $url = U('admin/index');
            if(empty($id)){
                $this->error('缺少参数',$url);
                exit;
            }
            $this->assign('page_title','修改管理员');

            //查询 状态开启的 角色
            $data = M('admin_role')->field('id,name')->where("disabled = '1'")->select();
            $this->assign('data',$data);
            $user_data = M('admin')->select($id);
            $this->assign('user_data',$user_data[0]);
            $this->display();
        }else{
            $user_id = I('post.user_id','','trim');
            $user = I('post.user','','trim');
            $paw = I('post.paw','','trim');
            $paw1 = I('post.paw1','','trim');
            $name = I('post.name','','trim');
            $role = I('post.role','','trim');
            $admin = M('admin');

            $_da = $admin->field('id,password')->where("username='$user'")->find();
            $url = U('admin/index');
            if(!is_null($_da)){
                if($_da['id']!=$user_id){
                    $this->error('用户名已存在',$url);
                    exit;
                }
            }
            $_paw = '';
            if(empty($paw) && empty($paw1)){
                $_paw = $_da['password'];
            }else{
                if($paw != $paw1){
                    $this->error('密码输入不正确',$url);
                    exit;
                }else{
                    $_paw = md5($paw);
                }
            }
            $reIP=$_SERVER["REMOTE_ADDR"];
            //获取本地时间
            $time = date('Y-m-d h:i:s',time());
            $data['id'] = $user_id;
            $data['username']=$user;
            $data['password']=$_paw;
            $data['roleid']=$role;
            $data['lastip']=$reIP;
            $data['addtime']=$time;
            $data['realname']=$name;
            $link = M('admin')->save($data);
            if($link){
                $this->success('信息修改成功',U('admin/index'));
            }else{
                $this->error('信息修改失败',U('admin/index'));
            }
        }

    }
}