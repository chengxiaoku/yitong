<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo ASSETS;?>img/favico.ico">
    <title><?php echo ($page_title); ?> | 管理后台</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo ASSETS;?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo ASSETS;?>fonts/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo ASSETS;?>fonts/ionicons-2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo ASSETS;?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS;?>css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <!-- ./wrapper -->
    <script src="<?php echo ASSETS;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo ASSETS;?>plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS;?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS;?>js/app.js" type="text/javascript"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo ASSETS;?>js/html5shiv.min.js"></script>
    <script src="<?php echo ASSETS;?>js/respond.min.js"></script>
    <![endif]-->
    <link href="<?php echo ASSETS;?>css/custom.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo ASSETS;?>plugins/bootbox.js"></script>
    <script src="<?php echo ASSETS;?>plugins/jquery-validate/jquery.validate.min.js"></script>
    <script src="<?php echo ASSETS;?>plugins/jquery-validate/localization/messages_zh.min.js"></script>
    <style>
        .error{
            color: red;
        }
    </style>
</head>

<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">YT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">后台管理</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu  ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <?php if($headimg1 == '1'): ?><img src="<?php echo ASSETS;?>/img/avatar5.png"  class="user-image  " alt="admin Image">
                                <?php else: ?>
                                <img src="<?php echo ($headimg1); ?>"  class="user-image " alt="admin Image"><?php endif; ?>
                            <span class="hidden-xs"><?php echo session('_admin_user_name');?> </span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img id="head_img_02" class="img-circle" alt="User Image" src="<?php if($headimg1 == "1" ): echo ASSETS;?>/img/avatar5.png<?php else: echo ($headimg1); endif; ?>">                                <p>
                                <?php echo session('_admin_user_name');?>                         </p>
                            </li>


                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">关闭</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown user user-menu" id="coles">
                        <a class="dropdown-toggle" href="#" >
                            <i class="glyphicon glyphicon-off"></i><span>安全退出</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- 退出用户提示框-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">提示</h4>
                </div>
                <div class="modal-body">
                    <h4 style="color: red;"><span class="glyphicon glyphicon-exclamation-sign" style="margin-right:10px; "></span>确认要退出当前账号？</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" id="tc_ok">确认</button>
                </div>
            </div>
        </div>
    </div>
    <script style="text/javascript">
        $('#coles').click(function (){
            $("#myModal").modal('show');
        });
        $("#tc_ok").click(function (){
            $("#myModal").modal('hide');
            var url = "<?php echo U('Auth/logout');?>";
            window.location = url;
        });
    </script>

<!--左侧边栏-->
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <?php echo ($menu_html); ?>
        </ul>
        <input id="cc" style="display: none" value="<?php echo ($csm); ?>">
    </section>
    <!-- /.sidebar -->
</aside>

<script>
    $(document).ready(function () {
                var lenth = $('.pd_Q').length;
                var cc=$("#cc").val();
                for (i=0;i<lenth;i++){
                    if(cc==$(".pd_Q").eq(i).attr("id")){
                        if ($(".pd_Q").eq(i).parent().attr("class")=='treeview-menu'){
                            $('.sidebar-menu li').eq(i).parent().parent().addClass('active');
                        }else{
                            $('.sidebar-menu li').eq(i).addClass('active');
                        }
                    }
                }
            }
    )
</script>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo ($page_title); ?><small></small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
        <li class="active"><?php echo ($page_title); ?></li>
    </ol>
</section>
    <!-- 主体内容 -->
    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-solid">
                    <!-- form start -->

                    <div class="box-body">
                        <!--基本信息-->
                        <!-- form start -->
                        <form role="form" id="loginForm" action="<?php echo U('member/update');?>" method="post">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="form-group">
                                        <label class="label_mess"> 姓名：</label>
                                        <input type="hidden" name="id" value="<?php echo ($lists["id"]); ?>">
                                        <input type="text" placeholder="输入姓名 ..."  name="name1" id="name"
                                               value="<?php echo ($lists["name"]); ?>" readonly="readonly" class="form-control w100 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 身份证：</label>
                                        <input type="text" placeholder="输入身份证 ..." name="identity" id="identity"
                                               value="<?php echo ($lists["identity"]); ?>" class="form-control w200 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 密码：</label>
                                        <input type="password" placeholder="输入密码 ..." name="password" id="password"
                                                class="form-control w150 inline-block relative right absolute ">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 再次输入密码：</label>
                                        <input type="password" placeholder="再次输入密码 ..." name="next_password" id="password2"
                                                class="form-control w150 inline-block relative right absolute ">
                                    </div>

                                    <div class="form-group" style="height: 34px">
                                        <label for="" class="label_mess">上传头像：</label>
                                        <div class="input-group" style="position: relative; left: 124px; top: -25px;">
                                            <input type="text" disabled="disabled" value="<?php echo ($lists["thumb"]); ?>" placeholder="上传头像 ..."  style="width: 150px;"  class="form-control" id="uiFileUploadInput1" data-thumb="">
                                            <input type="hidden" id="jb_image" name="headimg" value="<?php echo ($lists["thumb"]); ?>">
                                            <button onclick="upload1()" type="button" class="btn btn-success btn-flat"><i class="fa fw fa-plus-circle"></i></button>
                                        </div>
                                    </div>

                                    <div class="form-group" style="height: 34px">
                                        <label for="" class="label_mess">上传身份证：</label>
                                        <div class="input-group" style="position: relative; left: 124px; top: -25px;">
                                            <input type="text" disabled="disabled" value="<?php echo ($lists["card"]); ?>" placeholder="上传身份证照片 ..." style="width: 150px;"  class="form-control" id="uiFileUploadInput" data-thumb="">
                                            <input type="hidden" name="image" value="<?php echo ($lists["card"]); ?>">
                                            <button onclick="upload()" style="" type="button" class="btn btn-success btn-flat"><i class="fa fw fa-plus-circle"></i></button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="label_mess"> 手机号码：</label>
                                        <input type="text" placeholder="输入手机号码 ..." name="phone" id="phone"
                                               value="<?php echo ($lists["phone"]); ?>" class="form-control w200 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 用户等级：</label>
                                        <select class="form-control w200 inline-block province"  >
                                           <!-- <option value="">≡ 请选择您的用户等级 ≡</option>-->
                                            <?php if(is_array($grad)): $i = 0; $__LIST__ = $grad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i; if($i-1 == $lists['level']): ?><option selected value="<?php echo ($i-1); ?>"><?php echo ($row); ?></option>
                                                    <?php else: ?>
                                                    <option value="<?php echo ($i-1); ?>"><?php echo ($row); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 性别：</label>
                                        <div class="radio inline-block margin0">
                                               <?php if($lists['sex'] == 'male'): ?><label class="radio-inline">
                                                    <input value="male"  name="sex" type="radio" checked="checked">男
                                               </label>
                                               <label class="radio-inline">
                                                    <input value="female"  name="sex" type="radio">女
                                               </label>
                                                   <?php else: ?>
                                               <label class="radio-inline">
                                                   <input value="male"  name="sex" type="radio" >男
                                               </label><label class="radio-inline">
                                                   <input value="female"  name="sex" type="radio" checked="checked">女
                                               </label><?php endif; ?>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 民族：</label>
                                        <input type="text" placeholder="输入民族 ..." name="nation" id="nation"
                                               value="<?php echo ($lists["nation"]); ?>" class="form-control w200 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 邮箱：</label>
                                        <input type="text" placeholder="输入邮箱 ..." name="email" id="email"
                                               value="<?php echo ($lists["email"]); ?>" class="form-control w200 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 学历：</label>
                                        <select class="form-control w200 inline-block province" name="educational" id="educational">
                                           <!-- <option value="">≡ 请选择您的学历 ≡</option>-->
                                            <?php if(is_array($_data)): $i = 0; $__LIST__ = $_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i; if($lists['educational'] == $i-1): ?><option selected value="<?php echo ($i-1); ?>"><?php echo ($row); ?></option><?php endif; ?>
                                                <option value="<?php echo ($i-1); ?>"><?php echo ($row); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 学校：</label>
                                        <input type="text" placeholder="输入学校 ..." name="school" id="school"
                                               value="<?php echo ($lists["school"]); ?>" class="form-control w200 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <div style="margin-left: 45px;">
                                            <label style="position: relative;top: -11px; left: -15px;" class="inline-block"> 毕业时间：</label>
                                            <div class="inline-block">
                                                <div class="input-group">
                                                    <input  value="<?php echo ($lists["graduation_date"]); ?>" type="text" style="left: 5px;" name="graduation_date" placeholder="输入毕业时间 ..." id="begin-time" class="form-control" >
                                                    <div class="input-group-btn">
                                                        <button style="left: 5px;" onclick="return selectDate(this, 'begin-time')" type="button" class="btn btn-success btn-flat"><i class="fa fa-clock-o"></i></button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 行政职务：</label>
                                        <input type="text" placeholder="输入行政职务 ..." name="duty" id="duty"
                                               value="<?php echo ($lists["duty"]); ?>" class="form-control w200 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 所学专业：</label>
                                        <select class="form-control w200 inline-block province" name="profession" id="profession">
                                           <!-- <option >≡ 请选择您的专业 ≡</option>-->
                                            <?php if(is_array($sp)): $i = 0; $__LIST__ = $sp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i; if($lists['profession'] == $row['id']): ?><option value="<?php echo ($row['id']); ?>" selected="selected"><?php echo ($row['name']); ?></option>
                                                    <?php else: ?>
                                                    <option value="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 现有职称：</label>
                                        <select class="form-control w200 inline-block province" name="duty_level" id="duty_level">
                                           <!-- <option value="">≡ 请选择您的现有职称 ≡</option>-->
                                            <?php if(is_array($duty_level)): $i = 0; $__LIST__ = $duty_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row2): $mod = ($i % 2 );++$i; if($i-1 == $lists['titles']): ?><option selected="selected" value="<?php echo ($i-1); ?>"><?php echo ($row2); ?></option>
                                                    <?php else: ?>
                                                    <option value="<?php echo ($i-1); ?>"><?php echo ($row2); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="label_mess" > 是否毕业：</label>
                                        <?php if($lists['graduation'] == '1'): ?><label class="radio-inline">
                                            <input type="radio" value="1" name="graduation" checked="checked">是
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="0" name="graduation">否
                                        </label>
                                            <?php else: ?>
                                        <label class="radio-inline">
                                            <input type="radio" value="1" name="graduation">是
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="0" name="graduation" checked="checked">否
                                        </label><?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 学费：</label>
                                        <input type="text" placeholder="输入学费 ..." name="fee" id="fee"
                                               value="<?php echo ($lists["fee"]); ?>" class="form-control w100 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess" > 缴费状态：</label>
                                        <?php if($lists['fee_status'] == '1'): ?><label class="radio-inline">
                                            <input type="radio" value="1" name="fee_status" checked="checked">已交
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="0" name="fee_status">未交
                                        </label>
                                        <?php else: ?>
                                        <label class="radio-inline">
                                            <input type="radio" value="1" name="fee_status">已交
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="0" name="fee_status" checked="checked">未交
                                        </label><?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <div style="margin-left: 45px;">
                                            <label style="position: relative;top: -11px; left: -15px;" class="inline-block"> 培训时间：</label>
                                            <div class="inline-block">
                                                <div class="input-group">
                                                    <input value="<?php echo ($lists["training_time"]); ?>" type="text" style="left: 5px;" name="training_time" placeholder="输入培训时间 ..." id="bg-time" class="form-control">
                                                    <div class="input-group-btn">
                                                        <button style="left: 5px;" onclick="return selectDate(this, 'bg-time')" type="button" class="btn btn-success btn-flat"><i class="fa fa-clock-o"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 累计课时：</label>
                                        <input type="text" placeholder="输入累计课时 ..." name="hour" id="hour"
                                               value="<?php echo ($lists["hour"]); ?>" class="form-control w100 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess" > 状态：</label>
                                        <?php if($lists['status'] == '1'): ?><label class="radio-inline">
                                            <input type="radio" value="1" name="status" checked="checked">启用
                                            </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="0" name="status" >禁止
                                        </label>
                                            <?php else: ?>
                                        <label class="radio-inline">
                                            <input type="radio" value="1" name="status" >启用
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="0" name="status" checked="checked">禁止
                                        </label><?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"></label>
                                        <button class="btn btn-primary w100" type="submit" onclick="return login()">保存
                                        </button>
                                        <a onclick="history.go('-1')" class="btn btn-info w100 ml20"
                                           type="submit">返回</a>
                                    </div>

                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content  -->
</div>

<div class="modal fade " id="imageUploadModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="">上传图片</h4>
            </div>
            <div class="modal-body no-padding maxh500">
                <div class="images-zone tc thumb-place-holder">

                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-left" style="">
                    <div class="btn btn-success fileinput-button pull-left inline-block">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>添加图片...</span>
                        <input id="fileupload1" type="file" name="files[]" multiple="" data-text-control="#uiFileUploadInput1">
                    </div>
                    <span class="loading action-doing hide inline-block mt5 ml10"><i class="fa fa-refresh fa-spin"></i>&nbsp;文件上传中...</span>
                    <span class="loading action-done hide inline-block mt5 ml10"><i class="fa fa-check-circle-o"></i>&nbsp;上传成功</span>
                </div>
                <button type="button" class="btn btn-default ml20" data-dismiss="modal">保存</button>
            </div>
        </div>
    </div>
</div>

<!-- 上传图片模态框 -->

<div class="modal fade " id="imageUploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="">上传身份证照片</h4>
            </div>
            <div class="modal-body no-padding maxh500">
                <div class="images-zone tc thumb-place-holder">

                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-left" style="">
                    <div class="btn btn-success fileinput-button pull-left inline-block">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>身份证照片...</span>
                        <input id="fileupload" type="file" name="files" multiple="" data-text-control="#uiFileUploadInput">
                    </div>
                    <span class="loading action-doing hide inline-block mt5 ml10"><i class="fa fa-refresh fa-spin"></i>&nbsp;图片上传中...</span>
                    <span class="loading action-done hide inline-block mt5 ml10"><i class="fa fa-check-circle-o"></i>&nbsp;上传成功</span>
                </div>
                <button type="button" class="btn btn-default ml20" data-dismiss="modal">保存</button>
            </div>
        </div>
    </div>
</div>


<!-- jquery file upload -->
<script src="<?php echo ASSETS;?>plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo ASSETS;?>plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
<link href="<?php echo ASSETS;?>plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css"/>


<script src="<?php echo ASSETS;?>plugins/jquery-validate/jquery.validate.min.js"></script>
<script src="<?php echo ASSETS;?>plugins/jquery-validate/localization/messages_zh.min.js"></script>
<script src="<?php echo ASSETS;?>plugins/jquery-validate/additional-methods.min.js" type="text/javascript"></script>



<!--时间框-->

<script src="<?php echo ASSETS;?>plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?php echo ASSETS;?>plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js" charset="UTF-8" type="text/javascript"></script>
<link href="<?php echo ASSETS;?>plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
    //选择日期
    function selectDate(o, id) {
        var _id = '#' + id;
        $(_id).datepicker({
            format: 'yyyy-mm-dd',
            language: 'zh-CN'
        }).on("changeDate", function(e) {
            var me = e.target;
            $(this).datepicker('hide');
        });

        $(_id).datepicker('show');

    }
</script>

<style type="text/css">
    .label_mess {
        width: 100px;
        text-align: right;
        margin-right: 20px;
    }
    .error{
        color: red;
    }


</style>
<script type="text/javascript">
    //BEGIN:上传图片基本信息
    function upload1() {
        $('#imageUploadModal1').modal({});
    }
    //BEGIN:上传图片
    function upload() {
        $('#imageUploadModal').modal({});
    }
    <!--表单验证-->
    // 移动电话号码验证
    jQuery.validator.addMethod("isPhone", function(value, element) {
        var reg = /^1[34578]\d{9}$/;
        return this.optional(element) || (reg.test(value));
    }, "* 请填写正确格式手机号码");

    // 身份证号码验证
    jQuery.validator.addMethod("isIDCard", function(value, element) {
        var reg = /(^\d{15}$)|(^\d{17}([0-9]|X)$)/;
        return this.optional(element) || (reg.test(value));
    }, "* 请填写正确格式身份证号码");

    file_url = "<?php echo U('admin/member/jqueryFileUpload');?>";
    function show_img(id_1,id_2,te){
        $(id_1).fileupload({
            //options
            url: file_url,
            dataType: 'json',
            autoUpload: true,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            maxFileSize: 999000,
            //event
            add: function(e, data) {
                //指定模态框容器
                data.context = $(id_2);
                var autoUpload = $.blueimp.fileupload.prototype.options.autoUpload;
                if (autoUpload) {
                    data.submit();
                    data.context.find(".action-doing").removeClass("hide");
                }
                return true;
            },

            progressall: function(e, data) {
                //进度条
                var progress = parseInt(data.loaded / data.total * 100, 10);
            },

            done: function(e, data) {
                var fileInput = data.fileInput;
                var inputTextId = fileInput.attr("data-text-control");
                var inputText = $(inputTextId);
                var placeHolder = data.context.find(".thumb-place-holder");
                placeHolder.html("");
                $.each(data.result.files, function (index, file) {
                    if (file.thumbnailUrl) {

                        $("<img>").attr("src", file.thumbnailUrl).appendTo(placeHolder);
                        inputText.val(file.url);
                        inputText.attr("data-thumb", file.thumbnailUrl);
                        $("input[name="+te+"]").val(file.thumbnailUrl);
                    }
                });

                data.context.find(".action-doing").addClass("hide");
                data.context.find(".action-done").removeClass("hide");

            }

        });
    }
    show_img("#fileupload1","#imageUploadModal1","headimg");
    show_img("#fileupload","#imageUploadModal",'image');


   /* function login() {
        <!--验证不能为空-->
        $("#loginForm").validate({
            rules: {
                name: {
                    required: true,
                    rangelength:[2,4]
                },
                identity: {
                    required: true,
                    isIDCard: true
                },
               /!* password: {
                    required: true,
                    rangelength:[6,18]
                },
                next_password: {
                    required: true,
                    rangelength:[6,18],
                    equalTo: "#password"
                },*!/
                phone: {
                    required: true,
                    isPhone: true
                },
                level: "required",
                sex: "required",
                email: "required",
                educational: "required",
                fee_status : "required"

            },

            messages: {
                name: {
                    required: "* 姓名不能为空",
                    rangelength: "* 姓名长度必需在2-4个字符之间"
                },
                identity: {
                    required: "* 身份证号码不能为空",
                    isIDCard: "* 身份证号码格式不正确"
                },
                /!*password: {
                    required: "* 密码不能为空",
                    rangelength: "* 密码长度必需在6-18个字符之间"
                },
                next_password: {
                    required: "* 密码不能为空",
                    rangelength: "* 密码长度必需在6-18个字符之间",
                    equalTo: "* 两次密码输入不一致"
                },*!/
                phone:{
                    required: "* 手机号码不能为空",
                    isPhone: "* 手机号码格式不正确"
                },
                level:  "用户等级不能为空",
                sex: "* 性别不能为空",
                email: "* 邮箱不能为空",
                educational: "* 性别不能为空",
                fee_status : "* 缴费状态不能为空"

            }
        });*/


    function login() {

        $("#thumb_error").css('display','');
        $("#graduation_date_error").css('display','');
        <!--验证不能为空-->
        $("#loginForm").validate({
            rules: {
                name: {
                    required: true,
                    rangelength:[2,4]
                },
                identity: {
                    required: true,
                    isIDCard: true
                },
               /* password: {
                    required: true,
                    rangelength:[6,18]
                },
                next_password: {
                    required: true,
                    rangelength:[6,18],
                    equalTo: "#password"
                },*/
                phone: {
                    required: true,
                    isPhone: true
                },
                level: "required",
                sex: "required",
                email: "required",
                educational: "required",
                profession: "required",
                school: "required",
                graduation_date: "required",
                duty: "required",
                duty_level: "required",
                hour: "required",
                graduation: "required",
                fee: "required",
                fee_status : "required",
                training_time: "required",
                courses: "required"

            },

            messages: {
                name: {
                    required: "* 姓名不能为空",
                    rangelength: "* 姓名长度必需在2-4个字符之间"
                },
                identity: {
                    required: "* 身份证号码不能为空",
                    isIDCard: "* 身份证号码格式不正确"
                },
               /* password: {
                    required: "* 密码不能为空",
                    rangelength: "* 密码长度必需在6-18个字符之间"
                },
                next_password: {
                    required: "* 密码不能为空",
                    rangelength: "* 密码长度必需在6-18个字符之间",
                    equalTo: "* 两次密码输入不一致"
                },*/
                phone:{
                    required: "* 手机号码不能为空",
                    isPhone: "* 手机号码格式不正确"
                },

                level:  "* 用户等级不能为空",
                sex: "* 性别不能为空",
                email: "* 邮箱不能为空",
                educational: "* 学历不能为空",
                profession: "* 所学专业不能为空",
                school: "* 学校不能为空",
                graduation_date: "* 毕业时间不能为空",
                duty: "* 行政职务不能为空",
                duty_level: "* 现有职称不能为空",
                hour: "* 总学时不能为空",
                graduation: "* 是否毕业不能为空",
                fee: "* 学费不能为空",
                fee_status : "* 缴费状态不能为空",
                training_time: "* 培训时间不能为空",
                courses: "* 累计课时不能为空"





            }
        });
        return true;
    }

    /**
     * 上传图片
     */

    file_url = "<?php echo U('admin/member/jqueryFileUpload');?>";
    function show_img(id_1,id_2,te){
        $(id_1).fileupload({
            //options
            url: file_url,
            dataType: 'json',
            autoUpload: true,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            maxFileSize: 999000,
            //event
            add: function(e, data) {
                //指定模态框容器
                data.context = $(id_2);
                var autoUpload = $.blueimp.fileupload.prototype.options.autoUpload;
                if (autoUpload) {
                    data.submit();
                    data.context.find(".action-doing").removeClass("hide");
                }
                return true;
            },

            progressall: function(e, data) {
                //进度条
                var progress = parseInt(data.loaded / data.total * 100, 10);
            },

            done: function(e, data) {
                var fileInput = data.fileInput;
                var inputTextId = fileInput.attr("data-text-control");
                var inputText = $(inputTextId);
                var placeHolder = data.context.find(".thumb-place-holder");
                placeHolder.html("");
                $.each(data.result.files, function (index, file) {
                    if (file.thumbnailUrl) {

                        $("<img>").attr("src", file.thumbnailUrl).appendTo(placeHolder);
                        inputText.val(file.url);
                        inputText.attr("data-thumb", file.thumbnailUrl);
                        $("input[name="+te+"]").val(file.thumbnailUrl);
                    }
                });

                data.context.find(".action-doing").addClass("hide");
                data.context.find(".action-done").removeClass("hide");

            }

        });
    }
    show_img("#fileupload1","#imageUploadModal1",'headimg');
    show_img("#fileupload","#imageUploadModal",'img');




</script>



<!-- 页面底部 -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>版本</b> 1.0
    </div>
    <strong>Copyright &copy; 2016 <a href="#">易通建筑</a></strong> 版权所有.
</footer>
<div class='control-sidebar-bg'></div>

</body>
</html>