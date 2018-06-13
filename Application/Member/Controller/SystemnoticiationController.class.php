<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/14
 * Time: 11:16
 */
namespace Member\Controller;
use Member\Controller\BaseController;
use Think\Page;

header("Content-Type: text/html; charset=utf-8");
class SystemnoticiationController extends BaseController{
    public function index(){
        $this->assign("page_title","系统通知");

        $user_id = session('user_id');
        $page_size = C('PAGE_SIZE');

        $sql = M("notice");
        $count = $sql->where("`user_id` IS NULL or `user_id` = $user_id ")->count();
        $Page = new \Think\Page($count,$page_size);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->rollPage = 5;
        $list = $sql->where("`user_id` IS NULL or `user_id` = $user_id")->order('add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');
        $show       = $Page->show();// 分页显示输出

        $this->assign("data",$list);
        $this->assign('page',$show);
        $this->display();
    }

    public function tankuang()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $admin = M('notice');
        $tbl_admin=$admin->where("id=%d", array($id))->select();
        echo json_encode($tbl_admin);
    }


    public function sel(){
        $this->assign("page_title","系统通知");
        $page_size = C('PAGE_SIZE');

        $user_id = session('user_id');
        $keyword = $_POST['search'];
        //分页时保持查询条件
        $keyword = trim($keyword);
        if ($keyword != null) {
            session('member_search_key', $keyword);
        }
       $keyword = isset($keyword) ? session('member_search_key') : $keyword;

        $sql = M("notice");
        $count = $sql->where("`title` like '%$keyword%' and (`user_id` IS NULL or `user_id` = $user_id)")->count();
        $Page = new \Think\Page($count,$page_size);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $list = $sql->where("`title` like '%$keyword%' and (`user_id` IS NULL or `user_id` = $user_id)")->order('add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');
        $show       = $Page->show();// 分页显示输出

        $this->assign("data",$list);
        $this->assign('page',$show);
        $this->display(index);
    }

}