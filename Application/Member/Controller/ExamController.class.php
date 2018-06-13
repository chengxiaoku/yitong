<?php
namespace Member\Controller;
use Member\Controller\BaseController;
/**
 * Created by PhpStorm.
 * User: FFY
 * Date: 2016/12/13
 * Time: 9:48
 */
class ExamController extends BaseController{

    /**
     *试卷页面显示
     */
    public function index(){
        $data = C('QUSETION');
        $this->assign('data',$data);
        $this->display();
    }
    public function fuck(){
        $data = C('QUSETION');
        $this->assign('data',$data);
        $this->display();
    }

    /**
     * 分数统计
     */
    public function test(){
        //总成绩
        $sum = 0;
        //单选
        $arr_new = array();
        for ($i = 1; $i<=25;$i++){
            $arr_new[] = $_POST[$i.'1'];
        }
        $data = C('QUSETION');
        $j = 0;
        foreach ($data['Single Choice'] as $value){
            if($value['answer'] == $arr_new[$j]){
                $sum +=2;
            }
            $j++;
        }
        //对错
        $arr_new1=array();
        for ($i = 1; $i<=10;$i++){
            $arr_new1[] = $_POST[$i.'2'];
        }
        $w = 0;
        foreach ($data['true-false'] as $val){
            if($val['answer'] == $arr_new1[$w]){
                $sum +=2;
            }
            $w++;
        }
        //多选题
        $arr_new2 = array();
        for($i=1;$i<=10;$i++){
            $arr_new2[] = $_POST[$i.'3'];
        }
        $arr_new3 = array();
        foreach ($data['multiple choice'] as $val){
            $arr_new3[] = $val['answer'];
        }
        for($i = 0;$i<10;$i++){
            $str1 = '';
            $str2 = '';
            foreach ($arr_new2[$i] as $val){
                $str1 .=$val.',';
            }
            foreach ($arr_new3[$i] as $val){
                $str2 .=$val.',';
            }
            if($str1 == $str2){
                $sum += 3;
            }
        }
        $PASS_GRADE = C('PASS_GRADE');
        $user_id = session('user_id');
        $grade = M("grade");
        $time=date("Y",time());
        $_data['memberid'] =$user_id;
        $_data['_logic'] = 'AND';
        $_data['year'] =$time;
        $member_date = $grade->where($_data)->select();


        if(empty($member_date)){

            //添加成绩
            $data = array(
                'memberid' => $user_id,
                'grade' => $sum,
                'year' =>date("Y",time()),
                'time' =>date("Y-m-d H:i:s",time())
            );
            $result=$grade->add($data);
                if($result){
                    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                    if($sum<$PASS_GRADE){
                        $this->error("试卷提交成,您的成绩是：".$sum."分；请重新考试！");
                    }else{
                        $this->success("试卷提交成,您的成绩是：".$sum."分；", "member.php?m=Member&c=Xueshi&a=index",5);
                    }
                } else {
                    //错误页面的默认跳转页面是返回前一页，通常不需要设置
                    $this->error('试卷提交失败');
                }
        }else{
            $score = $member_date['grade'];
            $id=$member_date['0']['id'];
            if($sum>$score){
                //存成绩
                $data = array(
                    'memberid' => $user_id,
                    'grade' => $sum,
                    "year" =>date("Y",time()),
                    "time" =>date("Y-m-d H:i:s",time())
                );
                $result=$grade->where("id=$id")->save($data);
                if($result){
                    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                    if($sum<$PASS_GRADE){
                        $this->error("试卷提交成,您的成绩是：".$sum."分；请重新考试！");
                    }else{
                        $this->success("试卷提交成,您的成绩是：".$sum."分；", "member.php?m=Member&c=Xueshi&a=index");
                    }
                } else {
                    //错误页面的默认跳转页面是返回前一页，通常不需要设置
                    $this->error('试卷提交失败');
                }
            }else{
                $this->error("试卷提交成,您当前的成绩是：".$sum."分");
                return true ;
            }
        }
    }
    }