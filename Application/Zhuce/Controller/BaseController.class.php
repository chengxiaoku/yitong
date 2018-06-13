<?php
namespace Zhuce\Controller;
use Think\Controller;
use Common\Util\UploadHandler;

/**
 * 控制器基类
 * Created by PhpStorm.
 * User: 署名
 * Date: 2016/11/9
 * Time: 21:50
 * Description: 描述
 */
class BaseController extends Controller {

    /**
     * 控制器初始化
     */
    protected function _initialize() {
        //定义资源目录
        define('ASSETS', './Public/assets/');

    }
    
    /**
     * 文件上传-调用TP自带的文件上传类
     * @link http://www.kancloud.cn/manual/thinkphp/1876
     */
    public function upload()
    {
        //$save_path = ROOT_PATH . 'Public/upload/';
        $config = array (
            'maxSize'    =>    1024*1024*200,
            'rootPath'   =>    ROOT_PATH . 'Public/',
            'savePath'   =>    'upload/',
            'saveName'   =>    'uniqid',
            'exts'       =>    array('wmv','mp4', 'mov', 'rmvb', 'avi'),
            'autoSub'    =>    true,
            'subName'    =>    array('date','Ymd'),
        );
        $upload = new \Think\Upload($config);
        //返回数据格式
        $data = array(
            'error' => 0,
            'url' => '',
            'message' => 'aa'
        );

        $data = array(
            'files' => array()
        );


        // 上传文件
        $info  =   $upload->upload();
        if (!$info) {
            $error = $upload->getError();
            $data['error'] = 1;
            $data['message'] = $error;
        } else {
            foreach($info as $file){
                // code here
                $url = $file['savepath'] . $file['savename'];
                $data['files'][] = array(
                    'name' => $file['savename'],
                    'size' => $file['size'],
                    'type' => $file['type'],
                    'url' => $url,
                );
            }
        }
        echo json_encode($data);
    }

    /**
     * 文件上传类-页面使用jquery file upload 插件
     * @see https://github.com/blueimp/jQuery-File-Upload/
     */
    public function jqueryFileUpload()
    {
        $sub_dir = date("Ymd", time());
        $save_path =  ROOT_PATH . 'Public/upload/' . $sub_dir . '/';
        $site_url = C('SITE_URL');
        $upload_url = rtrim($site_url, '/') . '/Public/upload/' . $sub_dir . '/';
        $file_name = generate_random_string(16);
        $options = array(
            'file_name' => $file_name,
            'upload_dir' => $save_path,
            'upload_url' => $upload_url,
            'image_versions' => array(
                'thumbnail' => array('max_width' => 200, 'max_height' => 200)
            )
        );
        new UploadHandler($options);
    }


}
