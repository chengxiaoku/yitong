<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;

/**
 * 角色管理控制器
 * Class IndexController
 * @package Admin\Controller
 * @author xxx@qq.com
 * @date 2016-12-13
 */
class RoleController extends BaseController {
    public function index(){
        $this->assign("page_title", "角色管理");

        $member = M('admin_role');
        //每页显示条数
        $page_size = C("PAGE_SIZE");
        //获取当前页码
        $page_now=ceil(isset($_GET['page'])?$_GET['page']:'1');
        $sour=isset($_GET['sour'])?$_GET['sour']:'';
        if($sour!==''){
            $tbl_member=$member->order('id DESC')->where('name like \'%'.$sour.'%\'')->select();
            $all_size = count($tbl_member);
            if($all_size==0){
                $this->assign("no", "占时没有数据");
            }
            //总页数
            $page=ceil($all_size/$page_size);

            //判断页码正确性
            if($page_now<=1){
                $page_now=1;
            }
            if($page_now>=$page){
                $page_now=$page;
            }


            $star=($page_now-1)*$page_size;
            $tbl_member = array_slice($tbl_member, $star, $page_size);
        }else{
            //总数据数
            $all_size = $member->count();
            //总页数
            $page=ceil($all_size/$page_size);

            //判断页码正确性
            if($page_now<=1){
                $page_now=1;
            }
            if($page_now>=$page){
                $page_now=$page;
            }

            if($all_size==0){
                $this->assign("no", "占时没有数据");
            }
            $star=($page_now-1)*$page_size;
            $tbl_member = $member->order('id DESC')->limit($star, $page_size)->select();
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
            if ($sour!==''){
                //分页
                for ($i = 1; $i <= $page; $i++) {
                    $new[]='<li id="'.$i.'" class="paginate_button"><a tabindex="0" data-dt-idx="0" aria-controls="example2" href="'.U($ur).'&sour='.$sour.'&page='.$i.'" style="width: 34px;">'.$i.'</a></li>';
                }
                //传递数据
                $this->assign("prev", '<a tabindex="0" data-dt-idx="0" aria-controls="example2" href="'.U($ur).'&sour='.$sour.'&page=' . $page_prev . '">上一页</a>');
                $this->assign("allpage", $new);
                $this->assign("next", '<a tabindex="0" data-dt-idx="7" aria-controls="example2" href="'.U($ur).'&sour='.$sour.'&page=' . $page_next . '">下一页</a>');
            }else{
                //分页
                for ($i = 1; $i <= $page; $i++) {
                    $new[]='<li id="'.$i.'" class="paginate_button"><a tabindex="0" data-dt-idx="0" aria-controls="example2" href="'.U($ur).'&page='.$i.'" style="width: 34px;">'.$i.'</a></li>';
                }
                //传递数据
                $this->assign("prev", '<a tabindex="0" data-dt-idx="0" aria-controls="example2" href="'.U($ur).'&page=' . $page_prev . '">上一页</a>');
                $this->assign("allpage", $new);
                $this->assign("next", '<a tabindex="0" data-dt-idx="7" aria-controls="example2" href="'.U($ur).'&page=' . $page_next . '">下一页</a>');
            }
            }
        //传递当前页码
        $this->assign("page", $page_now);

        $this->assign("all_page", $page);
        $wid=34*$page-$page+1;
        $this->assign("wid",$wid);
        if($page>=5){
            $wid2=34*5-5;
            $this->assign("wid2",$wid2);
        }else{
            $wid2=34*$page-5;
            $this->assign("wid2",$wid2);
        }

        $this->assign("user", $tbl_member);
        $this->display();
    }

    public function add(){
        $this->assign("page_title", "添加角色");
        $name=isset($_GET['name'])?$_GET['name']:'';
        $fee_status=isset($_GET['fee_status'])?$_GET['fee_status']:'0';
        $description=isset($_GET['description'])?$_GET['description']:'';
        if($name!==''){
            $member = M('admin_role');
            $message = array(
                'name' => $name,
                'description' => $description,
                'disabled' => $fee_status
            );
            $result = $member->add($message);
            //判断数据是否删除
            if (!$result) {
                echo json_encode("添加失败");
            } else {
                echo json_encode("添加成功");
            }
            exit;
        }

        $this->display();
    }
    public function del(){
        $id=isset($_GET['id'])?$_GET['id']:'';
        if($id==''){
            exit;
        }
        $member = M('admin_role');
        $data['id'] = array('in', $id);
        $result = $member->where($data)->delete();//删除所选数据
        //判断数据是否删除
        if (!$result) {
            echo json_encode("删除失败");
        } else {
            echo json_encode("删除成功");
        }
    }
    public function quanxian(){
        $id = isset($_GET['id'])?$_GET['id']:'';
        $sj = isset($_GET['sj'])?$_GET['sj']:'';
        $priv = M('adinm_role_priv');
        $tbl_priv=$priv->where('roleid = '.$id)->select();
        if ($sj!==''){
            if ($id==''){
                echo json_encode("id为空");
                exit;
            }
            if($sj=='no'){
                $sj='';
            }
            $arr = explode(",",$sj );
            $arra=array();
            foreach ($arr as $a){
                $arra[] = explode("|",$a );
            }
            $m=array();
            $c=array();
            $a=array();
            foreach ($arra as $aa){
                if($aa['2']==''){
                    $aa['2']='index';
                }
                $m[]=$aa['0'];
                $c[]=$aa['1'];
                $a[]=$aa['2'];
            }
            $m = serialize($m);
            $c = serialize($c);
            $a = serialize($a);
            $ok=array(
                'roleid' => $id,
                'module' => $m,
                'controller' => $c,
                'action' => $a
            );
            $idd=$tbl_priv['0']['id'];
            if ($tbl_priv['0']['id']){
                $result = $priv->where("id=$idd")->save($ok);
            }else{
                $result = $priv->add($ok);
            }
            if (!$result) {
                echo json_encode("修改失败");
            } else {
                echo json_encode("修改成功");
            }
            exit;
        }else{
            if ($id==''){
                $this->display();
                exit;
            }

            foreach ($tbl_priv as $p){
                $all_size = count(unserialize($p['controller']));
                $this->assign("o",unserialize($p['controller']));
            }
            if (!$all_size){
                $all_size=0;
            }
            $this->assign("cc",$all_size);
        }

        $menus = C("MENU");
        $this->assign("menu", $menus);
        
        $this->assign("id", $id);
        $this->assign("page_title", "权限设置");

        $this->display();
    }
    public function change(){
        $page=isset($_GET['page'])?$_GET['page']:'';
        $id=isset($_GET['id'])?$_GET['id']:'';
        $name_new=isset($_GET['name'])?$_GET['name']:'';
        $fee_status_new=isset($_GET['fee_status'])?$_GET['fee_status']:'0';
        $description_new=isset($_GET['description'])?$_GET['description']:'';

        $member = M('admin_role');
        $tf_member = $member->where("id=%d", array($id))->select();
        foreach ($tf_member as $m) {
            $name=$m['name'];
            $fee_status=$m['disabled'];
            $description=$m['description'];
        }
        if($name_new!=='' && $fee_status_new!=='' && $description_new!==''){
            if($name_new==$name && $fee_status_new==$fee_status && $description_new==$description){}else{
                $message = array(
                    'name' => $name_new,
                    'description' => $description_new,
                    'disabled' => $fee_status_new
                );
                $result = $member->where("id=$id")->save($message);
                //判断数据是否删除
                if (!$result) {
                    echo json_encode("修改失败");
                } else {
                    echo json_encode("修改成功");
                }
                exit;
            }
        }

        $this->assign("page", $page);

        $this->assign("id", $id);
        $this->assign("name", $name);
        $this->assign("fee_status", $fee_status);
        $this->assign("description", $description);
        $this->display();
    }
}