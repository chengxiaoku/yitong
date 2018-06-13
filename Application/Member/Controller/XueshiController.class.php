<?php
namespace Member\Controller;
use Member\Controller\BaseController;

/**
 * 控制面板控制器
 * Class IndexController
 * @package Admin\Controller
 * @author xxx@qq.com
 * @date 2016-11-11
 */
class XueshiController extends BaseController {
    
    public function index(){
        $id = session('user_id');
        $data = M()->table('tbl_member as a,tbl_specialty as b,tbl_grade as c')
            ->field('b.name,a.sex,a.thumb,a.identity,a.hour,a.add_time,c.grade')
            ->where("a.profession = b.id and a.id=$id and c.memberid=a.id and c.year='$year'")
            ->find();
        //学员名称
        $name = M('member')->field('name')->find($id);
        $this->assign('name',$name['name']);
        $this->assign('data',$data);
        $this->display();
    }
}