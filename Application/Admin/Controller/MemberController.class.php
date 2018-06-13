<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;

/**
 * 会员管理
 * Created by PhpStorm.
 * User: ybf
 * Date: 2016/12/11
 * Time: 16:42
 */
class MemberController extends BaseController {
    
    public function index(){
        if (IS_POST) {
        } else {
            //数据分页
            $member = M('member');
            $count = $member->count();// 查询满足要求的总记录数
            $num=C("PAGE_SIZE");
            $Page = new page($count, $num);// 实例化分页类 传入总记录数和每页显示的记录数
            $list = $member->limit($Page->firstRow . ',' . $Page->listRows)
                    ->order("add_time DESC")
                    ->select();/*getlastsql*///数据集
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $show = $Page->show();// 分页显示输出
            $sp = M('specialty');
            $arr = array();
            foreach ($list as $val){
                $sp_id = $val['profession'];
                if($sp_id){
                    $sm_data = $sp->field('name')->where("id = $sp_id")->find();
                    $arr[] = $sm_data['name'];
                }else{
                    $arr[] ='';
                }

            }
            $this->assign('arr',$arr);
            $this->assign('list', $list);// 赋值数据集
            $this->assign('fenye', $show);// 赋值分页输出
            $this->assign("page_title", "会员列表");
            $this->display();
        }
    }


    /**
     * 添加会员
     */
    public function add()
    {
        $category = M("member");
        $data = $category->select();
        $this->assign('lists', $data);
        //提交添加
        if (IS_POST) {

            $name = isset($_POST['name']) ? $_POST['name'] : null;//姓名
            $identity = isset($_POST['identity']) ? $_POST['identity'] : null;//身份证
            $password = isset($_POST['password']) ? $_POST['password'] : null;//密码
            $thumb= isset($_POST['thumb']) ? $_POST['thumb'] : null;//上传头像
            $phone = isset($_POST['phone']) ? $_POST['phone'] : null;//手机号码
            $level = isset($_POST['level']) ? $_POST['level'] : null;//用户等级
            $sex = isset($_POST['sex']) ? $_POST['sex'] : null;//性别
            $nation = isset($_POST['nation']) ? $_POST['nation'] : null;//民族
            $email= isset($_POST['email']) ? $_POST['email'] : null;//邮箱
            $educational= isset($_POST['educational']) ? $_POST['educational'] : null;//学历
            $profession = isset($_POST['profession']) ? $_POST['profession'] : null;//专业
            $school = isset($_POST['school']) ? $_POST['school'] : null;//学校
            $graduation_date = isset($_POST['graduation_date']) ? $_POST['graduation_date'] : null;//毕业时间
            $duty = isset($_POST['duty']) ? $_POST['duty'] : null;//行政职务
            $duty_level = isset($_POST['duty_level']) ? $_POST['duty_level'] : null;//现有职称
            $hour= isset($_POST['hour']) ? $_POST['hour'] : null;//总学时
            $graduation= isset($_POST['graduation']) ? $_POST['graduation'] : null;//是否毕业
            $fee = isset($_POST['fee']) ? $_POST['fee'] : null;//学费
            $fee_status = isset($_POST['fee_status']) ? $_POST['fee_status'] : null;//缴费状态
            $training_time = isset($_POST['training_time']) ? $_POST['training_time'] : null;//培训时间
            $courses = isset($_POST['courses']) ? $_POST['courses'] : null;//累计课时
            $status= isset($_POST['status']) ? $_POST['status'] : null;//状态

            $name  = trim($name);//姓名
            $identity = trim($identity);//身份证
            $password = trim($password);//密码
            $thumb = trim($thumb);//上传头像
            $phone = trim($phone);//手机号码
            $level = trim($level);//用户等级
            $sex = trim($sex);//性别
            $nation = trim($nation);//民族
            $email = trim($email);//邮箱
            $educational = trim($educational);//学历
            $profession = trim($profession);//专业
            $school  = trim($school);//学校
            $graduation_date = trim($graduation_date);//毕业时间
            $duty = trim($duty);//行政职务
            $duty_level = trim($duty_level);//现有职称
            $hour = trim($hour);//总学时
            $graduation = trim($graduation);//是否毕业
            $fee = trim($fee);//学费
            $fee_status = trim($fee_status);//缴费状态
            $training_time = trim($training_time);//培训时间
            $courses = trim($courses);//累计课时
            $status = trim($status);//状态
            if (empty($name)) {
                $this->error("内容不能为空");
            }
            $user = $this->getUser();
            $id = $user['id']=1;




            $data = array(
                'name' => $name,//姓名
                'identity' => $identity,//身份证
                'password' => md5($password),//密码
                'thumb' => I("post.headimg"),//个人头像
                'card' => I("post.image"),//个人身份证照片
                'phone' => $phone,//手机号码
                'level' => $level,//用户等级
                "sex" => $sex,//性别
                "nation" => $nation,//民族
                "email" => $email,//邮箱
                "educational" => $educational,//学历
                'profession' => $profession,//专业
                'school' => $school,//学校
                'graduation_date' => $graduation_date,//毕业时间
                'duty' => $duty,//行政职务
                'duty_level' => $duty_level,//现有职称
                'hour'=> $hour,//总学时
                "graduation" => $graduation,//是否毕业
                "fee" => $fee,//学费
                "fee_status" => $fee_status,//缴费状态
                "training_time" => $training_time,//培训时间
                'courses' => $courses,//累计课时
                'status' => $status,//状态
                'add_time'=>date("Y-m-d H:i:s",time())//添加时间
            );

            $news = M("member");

            $test_name = $news->where(array('name' => $name))->find();
            if (empty($test_name)) {
                //检验电话号码是否已经存在
                $test_phone = $news->where(array('phone' => $phone))->find();
                if (empty($test_phone)) {
                    //检验身份证号码是否已经存在
                    $test_identity = $news->where(array('identity' => $identity))->find();
                    if (empty($test_identity)) {
                            if ($result = $news->add($data)) {
                                $data = $news->where("id=$id")->find();

                                $news->where("id=$id")->save($data);
                            }
                    }else{
                        $this->error("该身份证已被注册");
                        exit;
                    }
                }else{
                    $this->error("该电话已被注册");
                    exit;
                }
            }else{
                $this->error("该用户名已被注册");
                exit;
            }




            if (!$result) {
                $this->error("添加失败", U('Member/add'));
            } else {
                $this->success("添加成功", U('Member/index'));
            }
        } else {
            $this->assign("page_title", "添加会员");
            //用户等级
            $grad = C('VIDEO_GRADE');
            $this->assign('grad',$grad);
            //学历
            $_data = C('educational');
            $this->assign('_data',$_data);
            //现有职称
            $duty_level =C('zhicheng');
            $this->assign('duty_level',$duty_level);
            //专业
            $sp = M('specialty')->field('id,name')->select();
            $this->assign('sp',$sp);
            $this->display();
        }
    }


    /**
     * 会员修改
     */
    public function update()
    {
        //提交修改
        if (IS_POST) {
            //从数据库获取数据
            $id = I("post.id");
            if ($id) {
                $news = M("member");
                $data = $news->where("id=$id")->find();
                $this->assign('lists', $data);
            }else{
                $this->error('缺少参数',U('member/index'));
            }

            $identity = isset($_POST['identity']) ? $_POST['identity'] : null;//身份证
            $password = isset($_POST['password']) ? $_POST['password'] : null;//密码
            $thumb= isset($_POST['thumb']) ? $_POST['thumb'] : null;//上传头像
            $phone = isset($_POST['phone']) ? $_POST['phone'] : null;//手机号码
            $level = isset($_POST['level']) ? $_POST['level'] : null;//用户等级
            $sex = isset($_POST['sex']) ? $_POST['sex'] : null;//性别
            $nation = isset($_POST['nation']) ? $_POST['nation'] : null;//民族
            $email= isset($_POST['email']) ? $_POST['email'] : null;//邮箱
            $educational= isset($_POST['educational']) ? $_POST['educational'] : null;//学历
            $profession = isset($_POST['profession']) ? $_POST['profession'] : null;//专业
            $school = isset($_POST['school']) ? $_POST['school'] : null;//学校
            $graduation_date = isset($_POST['graduation_date']) ? $_POST['graduation_date'] : null;//毕业时间
            $duty = isset($_POST['duty']) ? $_POST['duty'] : null;//行政职务
            $duty_level = isset($_POST['duty_level']) ? $_POST['duty_level'] : null;//现有职称
            $hour= isset($_POST['hour']) ? $_POST['hour'] : null;//总学时
            $graduation= isset($_POST['graduation']) ? $_POST['graduation'] : null;//是否毕业
            $fee = isset($_POST['fee']) ? $_POST['fee'] : null;//学费
            $fee_status = isset($_POST['fee_status']) ? $_POST['fee_status'] : null;//缴费状态
            $training_time = isset($_POST['training_time']) ? $_POST['training_time'] : null;//培训时间
            $courses = isset($_POST['courses']) ? $_POST['courses'] : null;//累计课时
            $status= isset($_POST['status']) ? $_POST['status'] : null;//状态


            $identity = trim($identity);//身份证
            $password = trim($password);//密码
            $thumb = trim($thumb);//上传头像
            $phone = trim($phone);//手机号码
            $level = trim($level);//用户等级
            $sex = trim($sex);//性别
            $nation = trim($nation);//民族
            $email = trim($email);//邮箱
            $educational = trim($educational);//学历
            $profession = trim($profession);//专业
            $school  = trim($school);//学校
            $graduation_date = trim($graduation_date);//毕业时间
            $duty = trim($duty);//行政职务
            $duty_level = trim($duty_level);//现有职称
            $hour = trim($hour);//总学时
            $graduation = trim($graduation);//是否毕业
            $fee = trim($fee);//学费
            $fee_status = trim($fee_status);//缴费状态
            $training_time = trim($training_time);//培训时间
            $courses = trim($courses);//累计课时
            $status = trim($status);//状态

            if (empty($id)) {
                $this->error("无标题参数");
            }
            //$find= $news->where("array('id' => $id)")->find();
            $phone_ =  $data['phone'];
            $identity_ =  $data['identity'];
            if ($phone==""){
                $phone=$phone_;
            }
            if ($identity==""){
                $identity=$identity_;
            }
            if(!$graduation_date){
                $graduation_date = '0000-00-00';
            }
            if(!$training_time){
                $training_time = date("Y-m-d H:i:s",time());
            }
            $dat = array(
                'name' => I("post.name1",'','trim'),//姓名
                'identity' => $identity,//身份证
                'password' => md5($password),//密码
                'thumb' => I("post.headimg"),//个人头像
                'card' => I("post.image"),//个人身份证照片
                'phone' => $phone,//手机号码
                'level' => $level,//用户等级
                "sex" => $sex,//性别
                "nation" => $nation,//民族
                "email" => $email,//邮箱
                "educational" => $educational,//学历
                'profession' => $profession,//专业
                'school' => $school,//学校
                'graduation_date' => $graduation_date,//毕业时间
                'duty' => $duty,//行政职务
                'titles' => $duty_level,//现有职称
                'hour'=> $hour,//总学时
                "graduation" => $graduation,//是否毕业
                "fee" => $fee,//学费
                "fee_status" => $fee_status,//缴费状态
                "training_time" => $training_time,//培训时间
                'courses' => $courses,//累计课时
                'status' => $status,//状态
                'add_time'=>date("Y-m-d H:i:s",time())//添加时间
            );

            if ($identity_ != $identity&&$phone_ !=$phone) {
                //检验电话号码是否已经存在
                $news = M("member");
                $test_phone = $news->where(array('phone' => $phone))->find();
                if (empty($test_phone)) {
                    //检验身份证号码是否已经存在
                    $test_identity = $news->where(array('identity' => $identity))->find();
                    if (empty($test_identity)) {
                        $news = M("member");
                        $result = $news->where("id=$id")->save($dat);
                    } else {
                        $this->error("该身份证已被注册");
                        exit;
                    }
                } else {
                    $this->error("该电话已被注册");
                    exit;
                }

            }else{
                $result = $news->where("id=$id")->save($dat);
            }
            if (!$result) {
                $this->error("修改失败", U('Member/update'));
            } else {
                $this->success("修改成功", U('Member/index'));
            }
        } else {
            //从数据库获取数据
            $id = $_GET['id'];
            if ($id) {
                $news = M("member");
                $data = $news->where("id=$id")->find();
                $this->assign('lists', $data);
            }else{
                $this->error('缺少参数',U('member/index'));
            }
            $this->assign("page_title", "修改会员");
            //用户等级
            $grad = C('VIDEO_GRADE');
            $this->assign('grad',$grad);
            //学历
            $_data = C('educational');
            $this->assign('_data',$_data);
            //现有职称
            $duty_level =C('zhicheng');
            $this->assign('duty_level',$duty_level);
            //专业
            $sp = M('specialty')->field('id,name')->select();
            $this->assign('sp',$sp);
            $this->display();
        }


    }


    /**
     * 修改成绩和学时
     */
    public function edit()
    {
        //从数据库获取数据
        $id = $_GET['id'];
        if ($id) {
            $news = M("member");

        }

        //提交修改
        if (IS_POST) {
            $grade = isset($_POST['grade']) ? $_POST['grade'] : null;//成绩
            $hour = isset($_POST['hour']) ? $_POST['hour'] : null;//课时

            $grade  = trim($grade);//成绩
            $hour  = trim($hour);//课时
            $date=array(
                '$grade'=>$grade,
                'hour'=>$hour

            );
        }

        $link= $news->where(" 'id'=$id ")->save($date);
        if ($link) {
            $this->success("修改成功", U('Member/index'));
        } else {
            $this->error("修改失败", U('Member/index'));
        }
    }


    /**
     * 会员详情
     */
    public function detail()
    {
        //从数据库获取数据
        $id = $_GET['id'];
        if ($id) {
            $news = M("member");
            $data = $news->where("id=$id")->find();
            $this->assign('lists', $data);
        }
   
            $this->assign("page_title", "会员详情");
            //用户等级
            $grad = C('VIDEO_GRADE');
            $this->assign('grad',$grad);
            //学历
            $_data = C('educational');
            $this->assign('_data',$_data);
            //现有职称
            $duty_level =C('zhicheng');
            $this->assign('duty_level',$duty_level);
            //专业
            $sp = M('specialty')->field('id,name')->select();
            $this->assign('sp',$sp);
            $this->display();



    }


    /**
     * 删除操作
     */
    public function del()

    {

        $id = trim(isset($_GET['id']) ? $_GET['id'] : "");
        //删除数据
        $obj = M('member');
        $data['id'] = array('in', $id);
        $rs = $obj->where($data)->delete();//删除所选数据
        if ($rs) {
            $this->success("删除成功",U('Member/index'));
        } else {
            $this->error("删除失败",U('Member/del'));
        }

    }




    //批量导出数据(Excel)
    public function excel() {
/*
        //header格式
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:attachment;filename=会员列表.xls");

        // 列标题
        $_id = I("get.id",'','trim');
        if(empty($_id)){
            $this->error('缺少参数!');
            exit;
        }

        $data['id'] = array('in', $_id);
        $data = M("member")->where($data)->select();

        //打印 列名
        $name = iconv("UTF-8", "gb2312","姓名");
        $identity = iconv("UTF-8", "gb2312","身份证");
        $phone = iconv("UTF-8", "gb2312","手机号码");
        $sex = iconv("UTF-8", "gb2312","性别");
        $level = iconv("UTF-8", "gb2312","报考级别");
        $profession = iconv("UTF-8", "gb2312","专业");
        $hour = iconv("UTF-8", "gb2312","已学学时");
        echo   $name."\t";
        echo   $identity."\t";
        echo   $phone."\t";
        echo   $sex."\t";
        echo   $level."\t";
        echo   $profession."\t";
        echo   $hour."\t";
        echo   "\n";

        $sp = M('specialty');
        //主体
        foreach ($data as $key=>$value){
            $sex = $value['sex'];
            $level = $value['level'];
            if($sex =="male"){
                $sex='男';
            }else{
                $sex='女';
            }
            if($level == '0'){
                $level="初级";
            }elseif ($level == '1') {
                $level="中级";
            }elseif ($level == '2'){
                $level="高级";
            }
            $pr = $value['profession'];
            $_da = $sp->field('name')->find($pr);

            echo iconv("utf-8",'gb2312' , $value['name'])."\t";
            echo iconv("utf-8",'gb2312' , '`'.$value['identity'])."\t";
            echo iconv("utf-8",'gb2312' , '`'.$value['phone'])."\t";
            echo iconv("utf-8",'gb2312' , $sex)."\t";
            echo iconv("utf-8",'gb2312' , $level)."\t";
            echo iconv("utf-8",'gb2312' , $_da['name'])."\t";
            echo iconv("utf-8",'gb2312' , $value['hour'])."\t";
            echo "\n";
        }
        exit;
	*/
    }

    
    //搜索操作
    public function sel(){
        //获取搜索内容
        $keyword = I("get.keyword",'','trim');

            //判断搜索内容是否存在
            $tbl_user = M('member');
            $num=C("PAGE_SIZE");

            session('sel_key',$keyword);
            if(empty($keyword)){
                $key = session('sel_key');
            }else{
                $key = $keyword;
            }

            $arr['name'] = array('like',"%$key%");
            $count = $tbl_user->where($arr)->count();// 查询满足要求的总记录数
            $Page = new page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(5)
            $limit=$Page->firstRow . ',' . $Page->listRows;
            $data = $tbl_user->limit($limit)->where($arr)->order('add_time DESC')->select();//数据集
            $this->assign("list",$data);
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $show = $Page->show();// 分页显示输出
            //页面标题
            $this->assign("page_title", "会员搜索");
            $this->assign('data', $data);// 赋值数据集
            $this->assign('fenye', $show);// 赋值分页输出

            //渲染模板
            $this->display();

    }

    /**
     * 修改成绩,学时
     */
    public function save(){
        $id = I("post.id",'','trim');
        $hour = M('member')->field("hour")->where("id=$id")->find();
        $hour = $hour['hour'];
        $time = date("Y",time());
        $grade = M("grade")->field("grade")
            ->where("memberid=$id and year =$time")
            ->find();
        $grade = $grade['grade'];
        if(is_null($hour)){
            $hour=0;
        }
        if(is_null($grade)){
            $grade=0;
        }
        $arr = array($hour,$grade);
        $new_arr = json_encode($arr);
        echo $new_arr;
    }


    /**
     * 发送通知
     */
    public function tz(){
            $title=isset($_GET['bt'])?$_GET['bt']:'';
            $nr=isset($_GET['nr'])?$_GET['nr']:'';
            $id=isset($_GET['id'])?$_GET['id']:'';
            $_id1 = I("get.objid",'','trim');
            if ($id==''){
                echo json_encode("请输入id");
                exit;
            }
            if ($title==''){
                echo json_encode("请输入标题");
                exit;
            }
            if ($nr==''){
                echo json_encode("请输入内容");
                exit;
            }
            $time=date("Y-m-d H:i:s",time());
            $member = M('notice');
            $b_id=session('_admin_user_id');
            $message = array(
                'title' => $title,
                'content' => $nr,
                'add_time' => $time,
                'admin_id' => $b_id,
                'user_id' => $_id1,
                'status' => '1'
            );
            $result = $member->add($message);
            if ($result){
                echo json_encode("发送成功");
            }else{
                echo json_encode("发送失败");
            }
        }



    /**
     * excel操作页面
     */
    public function doexcel(){
        $this->assign("page_title", "批量导入会员数据");
        $this->display();
    }


    /**
     * 批量导出数据(Excel)
     */
    public function excels() {
        import('Common.Vendor.PHPExcel.PHPExcel', APP_PATH, '.php');

        $objPHPExcel = new \PHPExcel();

        //设置文档标题
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '姓名')
            ->setCellValue('B1', '身份证')
            ->setCellValue('C1', '手机号码')
            ->setCellValue('D1', '性别')
            ->setCellValue('E1', '报考级别')
            ->setCellValue('F1', '专业')
            ->setCellValue('G1', '已学学时');

        $id = I('get.id','','trim');
        $data['id'] = array('in',$id );

        $data = M("member")->where($data)->select();
        //主体
        $i=1;
        foreach ($data as $key=>$value){
            $i++;
            $sex = $value['sex'];
            if($sex == 'male'){
                $sex ='男';
            }else{
                $sex ='女';
            }
            $le = $value['level'];
            if($le=='0'){
                $le='初级';
            }elseif($le=='1'){
                $le='中级';
            }else{
                $le='高级';
            }
            $sp = M('specialty')->field('name')->find($value['profession']);
            // 添加数据

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i,$value['name'] )
                ->setCellValue('B'.$i, '`'.$value['identity'])
                ->setCellValue('C'.$i, '`'.$value['phone'])
                ->setCellValue('D'.$i, $sex)
                ->setCellValue('E'.$i, $le)
                ->setCellValue('F'.$i,$sp['name'] )
                ->setCellValue('G'.$i,  $value['hour']);
        }

        //设置尺寸
        $objPHPExcel->setActiveSheetIndex(0)
            ->getColumnDimension("A")
            //->setWidth(25);
            ->setAutoSize(true);

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('学员信息');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="学员信息.xls"');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    
    /**
     * 数据修改 入库
     */
    public function save_sql(){
        $hour  = $_POST['hour'];
        $grade  = $_POST['grade'];
        $time = date("Y",time());
        $id  = $_POST['id'];
        $member_db = M('member');
        $dat = array(
            'hour' => $hour,
        );
        $member_edit = $member_db->where("id=$id")->save($dat);

        $grade_db = M('grade');
        $grade_sel = $grade_db->where("memberid=$id")->find();
        $grade_year = $grade_sel['year'];

        if ($time == $grade_year){
            $grade_data = array(
                'grade' => $grade,
                'time' => date("Y-m-d",time()),
            );
            $grade_edit=$grade_db->where("memberid=$id")->save($grade_data);
        }elseif ($time !== $grade_year){
            $grade_data = array(
                'memberid' => $id,
                'grade' => $grade,
                'year' => date("Y",time()),
                'time' => date("Y-m-d",time()),
            );
            $grade_edit = $grade_db->where("memberid=$id")->add($grade_data);
        }
        if($grade_edit == true || $member_edit == true){
            $this->success("修改成功");
        }else{
            $this->error("修改失败");
        }

    }


    /**
     * 批量导入Excel
     */
    public function uploadexcel()
    {
        //导入核心类
        import('Common.Vendor.PHPExcel.PHPExcel', APP_PATH, '.php');
        import("Common.Vendor.PHPExcel.IOFactory", APP_PATH, '.php');
        import("Common.Vendor.PHPExcel.Cell", APP_PATH, '.php');



        $file = $_FILES['myexcel'];
        $type = $file['type'];
        if ($type !== 'application/vnd.ms-excel') {
            $this->error('上传文件格式不正确', U('member/doexcel'));
            exit;
        }
        $name = $file['name'];  //带有后缀
        $info = pathinfo($name);
        $ext = $info['extension'];
        $new_name = md5(time()) . '.' . $ext;

        $tmp_name = $file['tmp_name'];
        $to_path = ROOT_PATH . 'Public/upload/' . $new_name;

          if (move_uploaded_file($tmp_name, $to_path)) {
              //通过组件读取内容
              $file = $to_path;

              $reader = \PHPExcel_IOFactory::createReader("Excel2007");
              if (!file_exists($file)) {
                  die('no file!');
              }
              $extension = strtolower( pathinfo($file, PATHINFO_EXTENSION) );

              if ($extension =='xlsx') {
                  $reader = new \PHPExcel_Reader_Excel2007();
                  $excel = $reader ->load($file);
              } else if ($extension =='xls') {
                  $reader =  \PHPExcel_IOFactory::createReader('Excel5');
                  $excel = $reader ->load($file);
                  $sheetData = $excel->getActiveSheet()->toArray(null,true,true,true);
              } else if ($extension=='csv') {
                  $reader = new \PHPExcel_Reader_CSV();
                  $excel = $reader->load($file);
                  $excel->setDelimiter(',');
              }
               $sheet  = $excel->getActiveSheet();
                    //默认的分隔符
              $highestColumn  = $sheet->getHighestColumn();
              $highestRow  = $sheet->getHighestRow();
              $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
               $excelData = array();
               for($row = 2; $row <= $highestRow; $row++) {
                   for($col = 0; $col < $highestColumnIndex; $col++) {
                       $val = (string)$sheet->getCellByColumnAndRow($col, $row)->getValue();
                       $val = iconv("utf-8", "gb2312", $val);
                       $excelData[$row][] = $val;
                   }
               }
              //拼接入库
                   $db = M("member");
                   $flag = true;
                   foreach ($excelData as $row) {

                       $name = $row[0];//姓名
                       $name = iconv("gb2312", "utf-8", $name);
                       $ide = $row[1];
                       $ide = trim($ide,'`');
                       $identity = $ide;//身份证
                       $ph = $row[2];
                       $ph = trim($ph,'`');
                       $phone = $ph;//手机号码
                       $sex = $row[3];//性别
                       $sex = iconv('gb2312', 'utf-8', $sex);
                       if ($sex == '男') {
                           $sex = 'male';
                       } else if ($sex=='女'){
                           $sex = 'female';
                       }

                       $level = $row[4];//报考级别
                       $level = iconv('gb2312','utf-8' ,$level);
                       if ($level=='高级') {
                           $level = 2;
                       } elseif($level=='中级') {
                           $level = 1;
                       } elseif ($level=='初级'){
                            $level = 0;
                       }
                       //专业
                       $zy = $row[5];
                       $zy = iconv('gb2312', 'utf-8', $zy);

                       $_da = M('specialty')->field('id')->where("name='$zy'")->find();
                       if(!is_null($_da)){
                            $zy = $_da['id'];
                       }

                       $hour = $row[6];//已学学时
                       $_dta = array(
                           'name' => $name,
                           'identity' => $identity,
                           'phone' => $phone,
                           'sex' => $sex,
                           'level' => $level,
                           'profession' => $zy,
                           'hour' => $hour,
                           'add_time' => date('Y-m-d H:i:s'),
                           //初始密码
                           'password' => md5('000000'),
                           'status' => 1,
                       );

                       $rst = $db->data($_dta)->add();
                       if ($rst) {
                           //echo '添加成功，开始跳转页面';
                       } else {
                           $flag = false;
                           break;
                       }
                   }

               //如果数据都添加成功，开始跳转
               if ($flag) {
                   //提示，开始跳转
                   $goto = U("admin/member/index");
                   $this->success("数据导入成功", $goto);
               } else {
                   echo '导入数据失败';
                   $goto = U("admin/member/doexcel");
                   $this->error("数据导入失败", $goto);
               }


               exit;
           } else {
               echo 'fail';

           }

    }

}