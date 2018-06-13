<?php
namespace Member\Controller;
use Member\Controller\BaseController;

/**
 * Created by PhpStorm.
 * @User: LT
 * @Date: 2016/12/14
 */
header("Content-Type: text/html; charset=utf-8");
class XitongController extends BaseController {

    //视频管理页
    public function index(){
        $this->assign("page_title", "系统通知");

        $ur='xitong/index';

        $notice = M('notice');
        //每页显示条数
        $page_size = C("PAGE_SIZE");
        //获取当前页码
        $page_now=ceil(isset($_GET['page'])?$_GET['page']:'1');

        //总数据数
        $all_size = $notice->count();
        if($all_size==0){
            $this->assign("no", "占时没有数据");
        }
        $star=($page_now-1)*$page_size;
        $tbl_notice = $notice->limit($star, $page_size)->select();

        //总页数
        $page=ceil($all_size/$page_size);

        //判断页码正确性
        if($page_now<=1){
            $page_now=1;
        }
        if($page_now>=$page){
            $page_now=$page;
        }

        if ($page<=1){

        }else{
            //上下页
            $page_prev=$page_now-1;
            $page_next=$page_now+1;
            if ($page_prev<=1){
                $page_prev=1;
            }
            if ($page_next>=$page){
                $page_next=$page;
            }
            //分页
            for ($i = 1; $i <= $page; $i++) {
                $new[]='<li id="'.$i.'" class="paginate_button"><a tabindex="0" data-dt-idx="0" aria-controls="example2" href="'.U($ur).'&page='.$i.'" style="width: 34px;">'.$i.'</a></li>';
            }
            //传递数据
            $this->assign("prev", '<a tabindex="0" data-dt-idx="0" aria-controls="example2" href="'.U($ur).'&page=' . $page_prev . '">上一页</a>');
            $this->assign("allpage", $new);
            $this->assign("next", '<a tabindex="0" data-dt-idx="7" aria-controls="example2" href="'.U($ur).'&page=' . $page_next . '">下一页</a>');

        }
        //传递当前页码
        $this->assign("page", $page_now);


        $this->assign("user", $tbl_notice);
        $this->display();
    }

    public function tankuang()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $admin = M('admin');
        $tbl_admin=$admin->where("id=%d", array($id))->select();
        echo json_encode($tbl_admin);
    }

}