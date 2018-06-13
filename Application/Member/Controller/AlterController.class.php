<?php
namespace Member\Controller;
use Member\Controller\BaseController;

/**
 *
 * Class IndexController
 * @package Admin\Controller
 * @author xxx@qq.com
 * @date 2016-11-11
 */
class AlterController extends BaseController {

    public function index(){
        $id=session('user_id');
        $member = M('member');
        $tbl_member=$member->where('id = '.$id)->select();
        $pd=isset($_GET['pd'])?$_GET['pd']:'';
        $pd1=isset($_GET['pd1'])?$_GET['pd1']:'';
        $pd2=isset($_GET['pd2'])?$_GET['pd2']:'';
        if ($pd1!=='' && $pd2!=='' && $pd!==''){
            if (md5($pd)!==$tbl_member['0']['password']){
                echo json_encode('原密码错误');
                exit();
            }
            if ($pd2==$pd1){
                $pd1_md=md5($pd1);
                $pd2_md=md5($pd2);
                if ($pd1_md==$tbl_member['0']['password']){
                    echo json_encode('和原密码一样');
                    exit;
                }elseif($pd1<6){
                    echo json_encode('密码长度不能小于6');
                    exit;
                }elseif ($pd2_md==$pd1_md){
                    $pd_ok = array(
                        'password' => $pd1_md
                    );
                    $result = $member->where("id=$id")->save($pd_ok);
                    if($result){
                        echo json_encode('修改密码成功');
                    }else{
                        echo json_encode('修改密码失败');
                    }
                }else{
                    echo json_encode('您输入的两次密码不一致');
                    exit();
                }
            }else{
                echo json_encode('您输入的两次密码不一致');
                exit();
            }
            
            exit;
        }

        $this->assign('page_title','修改密码');
        $this->display();
    }
}