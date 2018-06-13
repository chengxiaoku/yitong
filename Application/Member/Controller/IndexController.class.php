<?php
namespace Member\Controller;
use Member\Controller\BaseController;

/**
 *
 * Class IndexController
 * @package Admin\Controller
 * @author yln@qq.com
 * @date 2016-11-11
 */
class IndexController extends BaseController {

    public function index(){
        $this->assign('page_title','个人信息');
        $user_id =session('user_id');
        //获取姓名
        $user_name = M('member')->find($user_id);

        $_da = M('specialty')->field('name')->find($user_name['profession']);
        $this->assign('sp_name',$_da['name']);
        $le = $user_name['level'];

        //等级
        if($le == '0'){
            $le = '初级';
        }elseif($le == '1'){
            $le = '中级';
        }elseif($le == '2'){
            $le = '高级';
        }
        $this->assign('le',$le);
        //性别
        $sex = $user_name['sex'];
        if($sex =='female'){
            $sex = '女';
        }elseif($sex =='male'){
            $sex = '男';
        }
        $this->assign('sex',$sex);
        $this->assign('user_name',$user_name);
        $ti = $user_name['titles'];
        if(is_null($ti)){
            $ti = 0;
        }

        $this->assign('ti',$ti);


        $educational = C('educational');
        $this->assign('educational' , $educational);


        $zhicheng = C('zhicheng');
        $this->assign('zhicheng' , $zhicheng);

        $this->display();

    }
    //入库
    public function safe(){
        if(IS_POST){

            $id = I('post.id','','trim');
            $nation = isset($_POST['nation']) ? trim($_POST['nation']) : "" ;
            $email = isset($_POST['email']) ? trim($_POST['email']) : "" ;
            $zhicheng = isset($_POST['zhicheng']) ? trim($_POST['zhicheng']) : "" ;
            $phone = isset($_POST['phone']) ? trim($_POST['phone']) : "" ;
            $educational = isset($_POST['educational']) ? trim($_POST['educational']) : "" ;
            $school = isset($_POST['school']) ? trim($_POST['school']) : "" ;
            $profession = isset($_POST['profession']) ? trim($_POST['profession']) : "" ;
            $graduation_date = isset($_POST['graduation_date']) ? trim($_POST['graduation_date']) : "" ;
            $duty = isset($_POST['duty']) ? trim($_POST['duty']) : "" ;
            $thumb   = isset($_POST['thumb']) ? trim($_POST['thumb']) : "" ;


            $datas = array(
                'nation' => $nation,
                'email' => $email,
                'titles' => $zhicheng,
                'phone' => $phone,
                'educational' => $educational,
                'school' => $school,
       
                'graduation_date' => $graduation_date,
                'duty' => $duty,
                'thumb' => $thumb,
            );
    
            $member = M("member");
            $result = $member->where("id=$id")->save($datas);
            if(!$result){
                $this->success("未修改",U('index/index'));
            }else{
                $this->success("保存成功",U('index/index'));
            }

        }






    }
}