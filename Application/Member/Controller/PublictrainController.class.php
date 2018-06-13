<?php
namespace Member\Controller;
use Member\Controller\BaseController;

/**
 * 个人公需课
 * Created by PhpStorm.
 * @User: LT
 * @Date: 2016/12/14
 */
header("Content-Type: text/html; charset=utf-8");
class PublictrainController extends BaseController {

    //视频管理页
    public function index(){
        //获取用户id
        $userid = session('user_id');
        //获取公需课
        $course_db = M('course');
        $course_date = array(
            'type' => '1',
            'audit' => 'checked',
            'status' => '1',
        );
        
        //公需课表的信息
        $course_message = $course_db->where($course_date)->select();
        //赋值给前台播放地址
        $this->assign("course_message", $course_message);
        $log = M('member_log');
        foreach ($course_message as $value){
            $id = $value['id'];
            $data3[] =$log->field('end')->where("member_id = $userid and video_id = $id")->find();
        }
        $this->assign('data3',$data3);
        $this->assign("page_title", "公需课培训");
        $this->display();
    }

    //公需课视频管理页
    public function video(){
        $id = trim(isset($_GET['id']) ? $_GET['id'] : "");
        $course_db = M("course");
        $course_message = $course_db->where("id=$id")->find();
        $course_title = $course_message['title'];
        $this->assign("page_title", $course_title);
        $this->assign("course_message", $course_message);
        

        $data = M('course')->field('title,video_url,id')->find($id);
        $this->assign('data',$data);
        //定位用户看到哪里
        $user_id = session('user_id');
        $vo_data = M('member_log')->field('progress')->where("member_id=$user_id and video_id=$id")->find();
        if(is_null($vo_data)){
            $vo_data = 0;
        }else{
            $vo_data = $vo_data['progress'];
        }
        $this->assign('time',$vo_data);


        $video_data = M('member_log')->field('end')->where("member_id=$user_id and video_id=$id")->find();
        $end= $video_data['end'];
        if(is_null($video_data)){
            $end = 0;
        }else{
            $end= $video_data['end'];
        }
        $this->assign('end',$end);


        $this->display();
    }

    /**
     * 视频观看记录日志
     */
    public function log(){
        $vido_id = I('post.vido_id');
        $time = I("post.time");
        $time = (int)$time;
        $user_id = session('user_id');
        $log = M('member_log');
        $data = $log->where("member_id=$user_id and video_id=$vido_id")->find();

        if(empty($data)){
            //新增视频日志
            $_data['member_id'] = $user_id;
            $_data['video_id'] = $vido_id;
            $_data['progress'] = $time;
            $_data['add_time'] = date("Y-m-d H:i:s", time());
            $log->data($_data)->add();
        }else{
            $_data['progress'] = $time;
            $log->where("member_id=$user_id and video_id=$vido_id")->save($_data);
        }
    }

    /**
     * 视频播放完毕事件
     */
    public function end(){
        $vido_id = I("post.vido_id");
        $user_id = session('user_id');
        $_data['end'] = 1;
        M('member_log')->where("member_id=$user_id and video_id=$vido_id")->save($_data);
    }
}