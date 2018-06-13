<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;

/**
 * 网站设置控制器
 * Class IndexController
 * @package Admin\Controller
 * @author xxx@qq.com
 * @date 2016-12-13
 */
class SetController extends BaseController {
    public function index(){
        $this->assign("page_title", "网站设置");
        $setting = M('setting');



        $domain_name=isset($_GET['domain_name'])?$_GET['domain_name']:'';
        $site_name=isset($_GET['site_name'])?$_GET['site_name']:'';
        $site_keywords=isset($_GET['site_keywords'])?$_GET['site_keywords']:'';
        $site_description=isset($_GET['site_description'])?$_GET['site_description']:'';
        $site_status=isset($_GET['site_status'])?$_GET['site_status']:'';
        $close_reason=isset($_GET['close_reason'])?$_GET['close_reason']:'';
        if($domain_name!=='' || $site_name!=='' || $site_keywords!=='' || $site_status!=='' || $close_reason!=='' || $site_description!==''){
            $message=array(
                '1'=>array(
                    'setting_value' => $domain_name,
                ),
                '2'=>array(
                    'setting_value' => $site_name,
                ),
                '3'=>array(
                    'setting_value' => $site_keywords,
                ),
                '4'=>array(
                    'setting_value' => $site_description,
                ),
                '5'=>array(
                    'setting_value' => $site_status,
                ),
                '6'=>array(
                    'setting_value' => $close_reason,
                ),
            );
            foreach ($message as $e=>$m){
                $result = $setting->where("id=".$e)->save($message[$e]);
            }
            echo json_encode("修改成功");

            exit;
        }

        $tbl_setting = $setting->limit(0, 6)->select();
        foreach ($tbl_setting as $s){
            $this->assign("set".$s['id'], $s);
        }
        $this->assign("user", $tbl_setting);
        $this->display();
    }
   
}