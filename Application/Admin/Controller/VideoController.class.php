<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;

/**
 * 总后台视频管理控制器
 * Created by PhpStorm.
 * @User: LT
 * @Date: 2016/12/13
 */
header("Content-Type: text/html; charset=utf-8");
class VideoController extends BaseController {
    /*       echo '<pre>';
           print_r($show);
           exit;*/
    //视频管理页
    public function index(){
        if (IS_POST) {
        } else {
            //数据分页
            $course = M('course');
            $count = $course->order("add_time desc")
                ->Field('tbl_course.id,tbl_course.title,tbl_course.description,tbl_admin.username,tbl_course.audit,tbl_course.period,tbl_course.type,tbl_course.grade')
                ->join('tbl_admin ON tbl_course.user_id = tbl_admin.id')
                ->count();
            $page_size = C("PAGE_SIZE");
            $Page = new \Think\Page($count, $page_size);
            $list = $course->order("add_time desc")
                ->Field('tbl_course.id,tbl_course.title,tbl_course.description,tbl_admin.username,tbl_course.audit,tbl_course.period,tbl_course.type,tbl_course.grade')
                ->join('tbl_admin ON tbl_course.user_id = tbl_admin.id')
                ->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $Page->setConfig('next','下一页');
            $Page->setConfig('prev','上一页');
            $show = $Page->show();// 分页显示输出
            $this->assign('list', $list);
            $this->assign('fenye', $show);
            $this->assign("page_title", "视频管理");
            $this->display();
        }
    }

    /*
  *搜索功能
  */
    public function select()
    {
        $course = M('course');
        $val = $_POST['find'];
        $val = trim($val);
        if (!empty($val)) {
            session('member_search_key', $val);
        }
        $val = empty($val) ? session('member_search_key') : $val;
        //搜索该用户子级用户
        $where['title'] = array('like', "%$val%");
        $count = $course->where($where)->count();

        if ($count == 0) {
            //搜索不存在
            $this->assign('sel_exist', '搜索内容不存在');
            $this->assign("page_title", "视频管理");
            $this->display(index);
            exit;
        } else {
            $page_size = C("PAGE_SIZE");
            $Page = new \Think\Page($count, $page_size);
            $list = "SELECT * FROM  tbl_course WHERE title LIKE '%$val%' order by add_time desc  LIMIT $Page->firstRow  ,$Page->listRows ";
            $date = M()->query($list);
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $show = $Page->show();
            $this->assign('list', $date);
            $this->assign('fenye', $show);
            $this->assign("page_title", "视频管理");
            $this->display(index);
        }
    }

    /*
* 审核
*/
    public function audit()
    {
            $db = M('course');
            $id = $_POST['audit_id'];
            $audit = $_POST['audit'];
            $data = array(
                'audit' => $audit,
            );
            $rs = $db->where("id=$id")->save($data);
            if ($rs === false) {
                $error = $db->getError();
                $this->error("审核失败:$error");
            } else {
                $goto = U("admin/video/index");
                $this->success("审核成功", $goto);
            }

    }

    /*
   * 删除操作
   */
    public function del()
    {
        $id = trim(isset($_GET['id']) ? $_GET['id'] : "");
        //判断删除数据的id是否存在
        if (empty($id)) {
            //id不存在
            $this->error("非法操作");
        } else {
                $db = M('course');
                $data['id'] = array('in', $id);
                $rs = $db->where($data)->delete();
                if ($rs) {
                    $goto = U("admin/video/index");
                    $this->success("删除成功", $goto);
                } else {
                    $this->error("删除失败");
                }
        }
    }


    //添加课程视频
    public function add(){
        if (IS_POST) {
            //获取表单提交的信息
            $user = $this->getUserid();
            $user_id = $user['id'];
            $title = $_POST['title'];
            $specialty = $_POST['specialty_id'];
            $duration = $_POST['duration'];
            $period = $_POST['period'];
            $status = $_POST['status'];
            $description = $_POST['description'];
            $video_url = $_POST['video_url'];
            $type = $_POST['type'];
            if ($type == 0){
                $grade = $_POST['video_grade'];
            }elseif ($type == 1){
                $grade = 0;
            }
            if (empty($video_url)){
                $this->error("请添加视频");
            }else{
                $db = M("course");
                $data = array(
                    'title' => $title,
                    'specialty' => $specialty,
                    'grade' => $grade,
                    'duration' => $duration,
                    'user_id' => $user_id,
                    'period' => $period,
                    'status' => $status,
                    'description' => $description,
                    'video_url' => $video_url,
                    'add_time' => date("Y-m-d H:i:s", time()),
                    'audit' => 'pending',
                    'type' => $type,
                );
                $rs = $db->data($data)->add();
                if ($rs) {
                    $goto = U("admin/video/index");
                    $this->success("添加成功", $goto);
                } else {
                    $error = $db->getError();
                    $this->error("添加失败:$error");
                }
            }
        } else {
            $type = I('get.type');
            $this->assign("type", $type);
            $video_grade = C('VIDEO_GRADE');
            $video_grade = array(
                '0'=>$video_grade
            );
            $this->assign("type",$type);
            $this->assign("video_grade",$video_grade);
            $specialty = M('specialty');
            $video_specialty = $specialty->select();
            $this->assign('video_specialty', $video_specialty);
            $this->assign('CAR_BRAND', $video_grade);
            if($type == profession){
                $this->assign("page_title", "添加专业课");
            }else{
                $this->assign("page_title", "添加公需课");
            }
            $this->display();
        }
    }
    
    //修改
    public function edit(){
        if (IS_POST) {
            //获取表单提交的信息
            $id = $_POST['id'];
            $title = $_POST['title'];
            $type = $_POST['video_type'];
            if ($type == 0){
                $specialty = $_POST['specialty_id'];
                $grade = $_POST['video_grade'];
            }elseif ($type == 1){
                $specialty = '';
                $grade = 0;
            }
            $duration = $_POST['duration'];
            $period = $_POST['period'];
            $status = $_POST['status'];
            $description = $_POST['description'];
            $video_url = $_POST['video_url'];
            $db = M("course");
            $data = array(
                'id' => $id,
                'title' => $title,
                'type' => $type,
                'specialty' => $specialty,
                'grade' => $grade,
                'duration' => $duration,
                'period' => $period,
                'status' => $status,
                'description' => $description,
                'video_url' => $video_url,
            );
            $rs = $db->where("id=$id")->save($data);
            if ($rs === false) {
                $error = $db->getError();
                $this->error("修改失败:$error");
            } else {
                $goto = U("admin/video/index");
                $this->success("修改成功", $goto);
            }
        } else {
            //判断修改id是否为空
            $id = trim(isset($_GET['id']) ? $_GET['id'] : "");
            if (empty($id)) {
                $this->error("对不起，没有该修改项");
            } else {
                //获取该课程数据
                $db = M("course");
                $data = $db->where("id=$id")->find();
                //获取该课程等级
                $grade = $data['grade'];
                $type = $data['type'];
                //获取课程等级
                $video_grade = C('VIDEO_GRADE');
                $video_grade = array(
                    '0'=>$video_grade
                );
                //获取所有专业
                $specialty = M('specialty');
                $video_specialty = $specialty->select();
                $this->assign("data", $data);
                $this->assign('grade', $grade);
                $this->assign('type', $type);
                $this->assign("video_grade",$video_grade);
                $this->assign('video_specialty', $video_specialty);
                $this->assign("page_title", "修改课程视频");
                $this->display();
            }
        }
    }
}