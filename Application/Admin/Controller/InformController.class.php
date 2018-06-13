<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Model;


/**
 * 专业管理控制器
 * Class InformController
 * @package Admin\Controller
 * @author xxx@qq.com
 * @date 2016-12-13
 */
class InformController extends BaseController {
    public function index(){
        $this->assign("page_title","通知管理");

        $page_size = C('PAGE_SIZE');
        $sql = M("notice");
        $count = $sql->count();
        $Page = new \Think\Page($count,$page_size);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $list = $sql->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');
        $show       = $Page->show();// 分页显示输出



        $this->assign("data",$list);
        $this->assign('page',$show);
        $this->display();


    }

    public function inform_add(){
        $this->assign("page_title","添加");
        if(IS_POST){

             $add_time=$_POST['add_time'];
            if(!$add_time){
                $add_time = date('Y-m-d H:i:s',time());
            }
            $sql = M("notice");
            $data['title'] = $_POST['name1'];
            $data['add_time'] = $add_time;
            $data['content'] = $_POST['content'];
            $data['status'] = $_POST['status'];


            $rs = $sql->add($data);
            if ($rs){
                $this->success("添加成功", U('inform/index'));
                return false;
            }
        }
        $this->display();
    }

    public function inform_del(){
        $id = I('get.id');
        $sql = M("notice");
        $data['id'] = array('in', $id);
        $sr = $sql->where($data)->delete();
        if ($sr){
            $this->success("删除成功", U('inform/index'));
        }
    }

    public function inform_edit(){
        if (IS_POST){
            $now_time = date('Y-m-d H:i:s',time());

            $sql = M("notice");

            $data = array();
            $id =  $_POST['id'];
            $data['title'] = $_POST['name'];
            $data['add_time'] = $_POST['add_time'];
            $data['content'] = $_POST['content'];
            $data['status'] = $_POST['status'];

            $jiuname = $_POST['name'];

            $rs = $sql->where("id=$id")->save($data);
            if ($rs==false){
                $error = $sql->getError();
                $this->error("修改失败:$error");
            }else{
                $this->success("修改成功", U('inform/index'));
            }
        }else {
            $this->assign("page_title","修改");

            $id = I('get.id');
            $sql = M("notice");
            $rs = $sql->where('id='.$id)->find();
            $this->assign("rs",$rs);

            $this->display();
        }


    }

    public function inform_sel(){
        $this->assign("page_title","通知管理");
        $page_size = C('PAGE_SIZE');
        $sql = M("notice");
        $keyword = $_POST['search'];
        $keyword = trim($keyword);
        if ($keyword != null) {
            session('member_search_key', $keyword);
        }
        $keyword = empty($keyword) ? session('member_search_key') : $keyword;
        $arr['title'] = array('like',"%$keyword%");
        $count = $sql->where($arr)->count();
        $Page = new \Think\Page($count,$page_size);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $list = $sql->where($arr)->order('add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');
        $show       = $Page->show();// 分页显示输出



        $this->assign("data",$list);
        $this->assign('page',$show);
        $this->display(index);

    }
}