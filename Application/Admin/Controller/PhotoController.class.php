<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;

/**
 * Class IndexController
 * @package Admin\Controller
 * @author xxx@qq.com
 * @date 2016-11-11
 */
class PhotoController extends BaseController {

    public function index(){
        $data = M('member')->order('add_time DESC')->select();
        $this->assign('userinfo',$data);
        $this->assign('page_title','照片审核');
        $this->display();
        $id = session('user_id');
    }
    public function reviewed() {
        $ids = I('post.ids');
        if ($ids) {
            foreach ($ids as $val) {
                $rs = M('member')->where("id = $val")->save(array("status"=>1));
            }
        }
        $id = I('get.id');
        if ($id) {
            $status = I('get.zt');
            $rs = M('member')->where("id = $id")->save(array("status"=>$status));
        }
        if ($rs) {
            $this->success("审核成功");
        } else {
            $this->error("审核失败");
        }
    }
    public function failed() {
        $ids = I('post.ids');
        foreach ($ids as $val) {
           $rs = M('member')->where("id = $val")->save(array("status"=>0));
        }
        if ($rs) {
            $this->success("审核成功");
        } else {
            $this->error("审核失败");
        }

    }
}