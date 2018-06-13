<?php
namespace Member\Controller;
use Member\Controller\BaseController;
/**
 * 专业课
 * Created by PhpStorm.
 * User: CLF
 * Date: 2016/12/13
 * Time: 9:48
 */
class SpecializedController extends BaseController{

    public function index(){
        $type = I('get.type','','trim');
        if(empty($type)){
            $type = 1;
        }
        if($type == 'low'){
            $type = 1;
        }
        if($type == 'middle'){
            $type = 2;
        }
        if($type == 'high'){
            $type = 3;
        }
        $this->assign('page_title','专业课培训');
        $userid = session('user_id');
        //学时
        $_hour = M('member')->field('hour,grade,level,profession')->where("id = $userid")->find();
        $hour = $_hour['hour'];
        if (is_null($hour)) {
            $hour = 0;
        }
        //已完成课时
        $this->assign('num_period',$hour);
        //总课时
        $period = M('setting')->field("setting_value")->where("setting_key='all_class_time'")->find();
        $this->assign('sum_period',$period['setting_value']);
        //成绩
        $year =  date('Y',time());
        $grade = M('grade')->field('grade')->where("memberid=$userid and year=$year")->find();
        $grade = $grade['grade'];
        if(is_null($grade) || empty($grade)){
            $grade = '未考试';
        }
        $this->assign('grade',$grade);
        //会员等级
        $this->assign('level',$_hour['level']);
        $this->assign('type',$type);
        //拉取视频信息
        $profession_id = $_hour['profession'];

        $count = M('course')
            ->field('id,title,type,period')
            ->where("specialty = $profession_id and grade = $type-1 and audit ='checked' and status='1'")
            ->count();
        //分页显示
        $page = C('PAGE_SIZE');
        $Page = new \Think\Page($count,$page);// 实例化分页类 传入总记录数和每页显示的记录数(25)

        $list = M('course')->field('id,title,type,period')
            ->where("specialty = $profession_id and grade = $type-1 and audit ='checked' and status='1'")
            ->order('add_time')->limit($Page->firstRow.','.$Page->listRows)
            ->select();
        $log = M('member_log');
        foreach ($list as $value){
            $id = $value['id'];
            $data3[] =$log->field('end,progress')->where("member_id = $userid and video_id = $id")->find();
        }
        $this->assign('data3',$data3);
        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');
        $show       = $Page->show();// 分页显示输出
        $this->assign("data",$list);
        $this->assign('page',$show);
        //视频个数
        //初级
        $num1 = M('course')->where("specialty = $profession_id and grade =0 and audit ='checked'")->count();
        $num2 = M('course')->where("specialty = $profession_id and grade =1 and audit ='checked'")->count();
        $num3 = M('course')->where("specialty = $profession_id and grade =2 and audit ='checked'")->count();
        $this->assign('num1',$num1);
        $this->assign('num2',$num2);
        $this->assign('num3',$num3);
        $this->display();
    }

    /**
     * 播放视频页面
     */
    public function play(){
        $id = I('get.id','','trim');
        $this->assign('page_title','视频播放');
        $url = U('Specialized/index');
        if(empty($id)){
            $this->error('缺少参数',$url);
        }

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
            $_data['add_time'] = time();
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

        $data = M('member_log')->field('end')->where("member_id=$user_id and video_id=$vido_id")->find();
        $data = $data['end'];
        if($data != 1){
            //增加学时
            $period = M('course')->field("period")->where("id = $vido_id")->find();
            $period = $period['period'];
            $hour = M('member')->field('hour')->where("id = $user_id")->find();
            $_hour = $period+$hour['hour'];
            $_data['hour'] = $_hour;
            M('member')->where("id=$user_id")->save($_data);
            $_data['end'] = 1;
            M('member_log')->where("member_id=$user_id and video_id=$vido_id")->save($_data);
        }
    }
}