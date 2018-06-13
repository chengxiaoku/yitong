<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
/**
 * 控制面板控制器
 * Class IndexController
 * @package Admin\Controller
 * @author FFY
 * @date 2016-11-11
 */
class IndexController extends BaseController {

    public function index(){

        //筛选数据
        $obj = M('member');
        $count = $obj->count();// 查询满足要求的总记录数
        $num = C("PAGE_SIZE");//调用每页显数量
        $Page = new Page($count, $num );// 实例化分页类 传入总记录数和每页显示的记录数(5)
        $data = $obj->limit($Page->firstRow . ',' . $Page->listRows)->order('add_time DESC')->select();//数据集
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $show = $Page->show();// 分页显示输出
        $course = M('specialty');
        $category = M('course');
        $notice = M('notice');
        $course = $course->count();
        $category = $category->count();
        $notice = $notice->count();
        $this->assign('data', $data);// 赋值数据集
        $this->assign('page', $show);// 赋值
        $this->assign('member', $count);// 赋值输出
        $this->assign('course', $course);
        $this->assign('category', $category);
        $this->assign('notice', $notice);
        //页面标题
        $this->assign("page_title", "控制面板");
        $this->display("");
    }

  
}