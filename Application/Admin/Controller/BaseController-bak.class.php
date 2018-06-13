<?php
namespace Admin\Controller;
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

        //获取上一次访问的地址
        $redirect_url = $_SERVER['HTTP_REFERER'];
        session('redirect_url', $redirect_url);

        //检测会话是否过期
        $now = time();
        $expire = session('expire');
        if (is_null($expire)) {
            $expire = 0;
        }
        if ($now > $expire) {
            session_destroy();
            session('redirect_url', $redirect_url);
            $url = U('auth/login');
            redirect($url);
            exit;
        }

        //检测是否登录
        $user_id = session('_admin_user_id');
        if (empty($user_id)) {
            session('redirect_url', $_SERVER['REQUEST_URI']);
            $url = U('auth/login');
            redirect($url);
        }
        $img = M('admin')->field('headimg')->where("id=$user_id")->find();

        $img = $img['headimg'];
        if(empty($img)){
            $img = 1;
        }
      
        $this->assign('headimg1',$img);

        //获取菜单
        $menu = $this->buildMenu();
        $this->assign("menu_html", $menu);
        $this->qx();
        $this->assign("csm", CONTROLLER_NAME);
    }
    /*
     * 判断是否有权限
     * */
    private function qx(){
        $model = M("adinm_role_priv");
        $id=session('_admin_role_id');
        $data=$model->where('roleid = '.$id)->select();
        foreach ($data as $dd){
            $data=$dd['controller'];
            $a=$dd['action'];
        }
        $data=unserialize($data);
        if ($data['0']==''){
            echo '<h1>你没有任何权限</h1>';
            exit;
        }
        foreach ($data as $d) {
            if($d==CONTROLLER_NAME){
                $aa='ok';
            }
        }
        if ($aa!=='ok'){
            $a=unserialize($a);
            $c=$data['0'];
            $menu = C("MENU");
            dump($menu[$c]['children']);
            if ($menu[$c]['children']){
                $c=$data['1'];
            }
            $b=$c.'/'.$a['0'];
            $url=U($b);
            echo '<script>';
            echo 'alert("你没有权限访问");';
            echo 'self.location ="'.$url.'"';
            echo '</script>';
            exit;
        }

    }

    /**
     * 获取属性值
     * @param unknown $property
     * @param string $default
     */
    public function getVar($property, $default = null) {
        if (isset($this->$property)) {
            return $this->$property;
        }
        return $default;
    }

    /**
     * 空操作
     */
    public function _empty(){
        header('Content-type:text/html;charset=utf-8');
        echo '输入了没有的方法!';
    }

    /**
     * 设置属性值
     * @param unknown $property
     * @param string $value
     * @return mixed $previous value
     */
    public function setVar($property, $value = null) {
        $previous = isset($this->$property) ? $this->$property : null;
        $this->$property = $value;
        return $previous;
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

    /**
     * 获取城市信息（省市区三级联动）
     */
    public function getCity() {
        $model = M("region");
        $data = $model->select();
        $this->responseJSON($data);
    }

    /**
     * 返回JSON字符
     * @param $data
     */
    private function responseJSON($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * 构建菜单
     */
    protected function buildMenu() {
        $menu = C("MENU");
        $li = '';
        $model = M("adinm_role_priv");
        $id=session('_admin_role_id');
	
        $data=$model->where('roleid = '.$id)->select();
        foreach ($data as $dd){
            $data=$dd['controller'];
        }
        $data=unserialize($data);
        foreach ($menu as $k => $item) {
            //检查权限
            foreach ($data as $d){
                if ($item['c'] == $d){
                    $child_menu = $this->getMenuItemChildren($item);
                    $li .= '<li id="'.$d.'" class="pd_Q">';
                    if ($item['children']) {
                        $li .= '<a href="'.$this->getMenuItemLink($item).'"><i class="'.$item['icon'].'"></i> <span>'.$item['title'].'</span><i class="fa fa-angle-left pull-right"></i></a>';
                    } else {
                        $li .= '<a href="'.$this->getMenuItemLink($item).'"><i class="'.$item['icon'].'"></i> <span>'.$item['title'].'</span></a>';
                    }
                    $li .= $child_menu;
                    $li .= '</li>';
                }else{}
            }

        }
        return $li;
    }

    /**
     * 获取子菜单项
     * @param $parent
     */
    protected function getMenuItemChildren($parent) {
        $html = '';
        $children = $parent['children'];
        $model = M("adinm_role_priv");
        $id=session('_admin_role_id');

        $data=$model->where('roleid = '.$id)->select();
        foreach ($data as $dd){
            $data=$dd['controller'];
        }
        $data=unserialize($data);
        if ($children) {
            $html = '<ul class="treeview-menu">';
            foreach ($children as $k => $item) {
                foreach ($data as $d) {
                    if ($item['c'] == $d) {
                        $html .= '<li id="'.$d.'" class="pd_Q">';
                        $html .= '<a href="' . $this->getMenuItemLink($item) . '"><i class="fa fa-circle-o"></i> <span>' . $item['title'] . '</span></a>';
                        $html .= '</li>';
                    }
                }
            }
            $html .= '</ul>';
        }
        return $html;
    }
    /**
     * 获取菜单连接
     * @param unknown $item
     * @return string
     */
    protected function getMenuItemLink($item) {
        $m = $item['m'];
        $c = $item['c'];
        $a = $item['a'];
        $route = $m . '/' . $c . '/' . $a;
        return U($route);
    }
    /**
     * 检测客户端是否是移动端
     */
    public function isMobile() {
        //导入平台检测类
        import("Common.Vendor.Mobile_Detect", APP_PATH, '.php');
        $detect = new \Mobile_Detect();
        return $detect->isMobile();     
    }

    /**
     * 获取用户信息
     */
    public function getUser() {
        $user = array(
            'id' => '',
            'name' => '',
            'role_id' => '',
            'last_ip' => '',
            'last_time' => '',
            'realname' => ''
        );
        return $user;
    }
    /*
 * 获取
 */

    public function getUserid() {

        $id = session('_admin_user_id');
        $sql =M('course');
        $data=$sql->where("id=$id")->select();
        $user=$data[0];
        return $user;
    }
}
