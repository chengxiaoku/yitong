<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Model;


/**
 * 专业管理控制器
 * Class ProfessionController
 * @package Admin\Controller
 * @author xxx@qq.com
 * @date 2016-12-13
 */
class ProfessionController extends BaseController {
    public function index(){
        $this->assign("page_title","专业管理");

        $page_size = C('PAGE_SIZE');
        $sql = M("specialty");
        $count = $sql->count();
        $Page = new \Think\Page($count,$page_size);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $list = $sql->order('add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $Page->rollPage = 5;
        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');
        $show = $Page->show();// 分页显示输出

        
        $arr = C('VIDEO_GRADE');
        $i = 0;
        $arr_new = array();
        foreach ($arr as $vl){
            $arr_new[$i] = $vl;
            $i++;
        }
        $this->assign('level',$arr_new);
        $this->assign("data",$list);
        $this->assign('page',$show);
        $this->display();


    }

    //添加专业
    public function profession_add(){
        $this->assign("page_title","添加专业");
        if(IS_POST){
            $now_time = date('Y-m-d H:i:s',time());

            $sql = M("specialty");
            $data['name'] = $_POST['name'];
            $jiuname = $_POST['name'];

            $data['level'] = $_POST['level'];
            $data['status'] = $_POST['status'];
            $data['period'] = $_POST['period'];
            $data['content'] = $_POST['content'];
            $data['add_time'] = $now_time;

            //后台验证
            if ($_POST['name'] = null){
                $error = $sql->getError();
                $this->error("添加失败:专业名称不能为空$error");
            }
            if ($_POST['content'] = null){
                $error = $sql->getError();
                $this->error("添加失败:专业描述不能为空$error");
            }
            if (!is_numeric($_POST['period'])){
                $error = $sql->getError();
                $this->error("添加失败:学时只能是数字$error");
            }

            //验证专业名称是否已存在
            $yanzheng = $sql->where("name = '$jiuname'")->select();
            if ($yanzheng){
                $error = $sql->getError();
                $this->error("专业名称已经被占用:$error");
            }
            $rs = $sql->add($data);
            if ($rs){
                $this->success("添加成功", U('profession/index'));
            }else{
                $error = $sql->getError();
                $this->error("添加失败:$error");
            }
        }else {
            $level = C('VIDEO_GRADE');
            $this->assign("level","$level");
            
            
            $this->display();
        }
    }
    
    //删除
    public function profession_del(){
        $id = I('get.id');
        $sql = M("specialty");
        $map['id'] = array('in',$id);
        $sr = $sql->where($map)->delete();
        if ($sr){
            $this->success("删除成功", U('profession/index'));
        }else{
            $error = $sql->getError();
            $this->error("删除失败:$error");
        }
    }

//    修改
    public function profession_edit(){
        if (IS_POST){
            $now_time = date('Y-m-d H:i:s',time());

            $sql = M("specialty");

//            获取修改时提交的数据
            $data = array();
            $id =  $_POST['id'];
            $data['name'] = $_POST['name'];
            $data['level'] = $_POST['level'];
            $data['status'] = $_POST['status'];
            $data['period'] = $_POST['period'];
            $data['content'] = $_POST['content'];
            $data['add_time'] = $now_time;

//            验证专业名称是否已存在
            $jiuname = $_POST['name'];
            $yanzheng = $sql->where("name='$jiuname' and id != $id")->select();

            if ($yanzheng){
                $error = $sql->getError();
                $this->error("专业名称已经被占用:$error");
            }

            $rs = $sql->where("id=$id")->save($data);
            if ($rs==false){
                $error = $sql->getError();
                $this->error("修改失败:$error");
            }else{
                $this->success("修改成功", U('profession/index'));
            }
        }else {
            $this->assign("page_title","修改专业");

//            打开修改页面时显示原来数据
            $id = I('get.id');
            $sql = M("specialty");
            $rs = $sql->where('id='.$id)->find();
            if ($rs == null){
                $error = $sql->getError();
                $this->error("未找到相关数据:$error");
            }
            $this->assign("rs",$rs);

            $this->display();
        }
        

    }

//    模糊查询
    public function profession_sel(){
        $this->assign("page_title","专业管理");
        $page_size = C('PAGE_SIZE');

        $keyword = $_POST['search'];
        $keyword = trim($keyword);
        if ($keyword != null) {
            session('member_search_key', $keyword);
        }
        $keyword = empty($keyword) ? session('member_search_key') : $keyword;

        $sql = M("specialty");
        $map['name'] = array('like',"%{$keyword}%");
        $count = $sql->where($map)->count();
        $Page = new \Think\Page($count,$page_size);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $list = $sql->where($map)->order('add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');
        $show       = $Page->show();// 分页显示输出
        
//        专业等级
        $arr = C('VIDEO_GRADE');
        $i = 0;
        $arr_new = array();
        foreach ($arr as $vl){
            $arr_new[$i] = $vl;
            $i++;
        }
        $this->assign('level',$arr_new);
        


        $this->assign("data",$list);
        $this->assign('page',$show);
        $this->display(index);

    }


}