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
            <span class="logo-mini">TF</span>
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
                    <li class="dropdown user user-menu open">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <?php if($headimg1 == '1'): ?><img src="<?php echo ASSETS;?>/img/avatar5.png"  class="user-image" alt="admin Image">
                                <?php else: ?>
                                <img src="<?php echo ($headimg1); ?>"  class="user-image" alt="admin Image"><?php endif; ?>

                            <span class="hidden-xs"><?php echo session('user_name');?> </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <?php if($headimg1 == '1'): ?><img src="<?php echo ASSETS;?>/img/avatar5.png"  class="user-image" alt="admin Image">
                                    <?php else: ?>
                                    <img src="<?php echo ($headimg1); ?>"  class="user-image" alt="admin Image"><?php endif; ?>
                                <?php echo session('user_name');?>                         </p>
                            </li>
                            <!-- Menu Footer-->
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
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">

            <li id="Index" class="treeview pd_Q">
                <a href="<?php echo U('Index/index');?>">
                    <i class="fa fa-th"></i>
                    <span>个人信息</span>
                </a>
            </li>

            <li class="treeview pd_Q">
                <a href="#">
                    <i class="fa  fa-user"></i>
                    <span>网络培训</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="Specialized" class="pd_Q"><a href="<?php echo U('Specialized/index');?>"><i class="fa fa-circle-o"></i><span>专业课</span></a></li>
                    <li id="Publictrain" class="pd_Q"><a href="<?php echo U('Publictrain/index');?>"><i class="fa fa-circle-o"></i><span>公需课</span></a></li>
                    <li id="Exam" class="pd_Q"><a href="<?php echo U('Exam/index');?>"><i class="fa fa-circle-o"></i><span>在线测试</span></a></li>
                    <li id="Xueshi" class="pd_Q"><a href="<?php echo U('Xueshi/index');?>"><i class="fa fa-circle-o"></i><span>学时证明</span></a></li>
                </ul>
            </li>
            <li id="Systemnoticiation" class="treeview pd_Q">
                <a href="<?php echo U('Systemnoticiation/index');?>">
                    <i class="fa fa-th"></i>
                    <span>系统通知</span>
                </a>
            </li>
            <li id="Alter" class="treeview pd_Q">
                <a href="<?php echo U('Alter/index');?>">
                    <i class="fa fa-th"></i>
                    <span id="aaa">修改密码</span>
                </a>
            </li>
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


<script src="<?php echo ASSETS;?>/plugins/jquery-validate/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS;?>/plugins/jquery-validate/additional-methods.min.js" type="text/javascript"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo ($page_title); ?><small></small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
        <li class="active"><?php echo ($page_title); ?></li>
    </ol>
</section>

    <style>
        .le{margin-top: 30px;}
    </style>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body ">
                        <div class="le">
                            <h4>密码修改</h4>
                            <div class="box-body no-padding" >

                                    <div class="form-group has-feedback">
                                        <input id="no" value="" class="form-control" placeholder="原密码">
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <input id="no1" name="password" type="password"  class="form-control" placeholder="输入新密码(长度不小于6)"/>
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <input id="no2" name="password1" type="password" class="form-control" placeholder="请确认密码(长度不小于6)"/>
                                        <span class="glyphicon glyphicon-repeat form-control-feedback"></span>
                                    </div>



                                    <div class="row">
                                        <div class="col-xs-12">
                                            <br>
                                            <input type="hidden" name="http_referer" value="<?php echo ($user); ?>">
                                            <button  id="submit" onclick="return qr()" class="btn btn-success btn-block btn-flat" >确认修改</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?php echo ASSETS;?>plugins/jquery.cityselect.js" type="text/javascript"></script>

    <script type="text/javascript">
        //验证表单
        $(document).ready(function () {
            $("#myform").validate({
                        rules: {
                            tel: "required",
                            nickname: "required",
                            password: {
                                "required": true,
                                "minlength": 6
                            },
                            password1: {
                                "required": true,
                                "minlength": 6
                            },
                            province_id: "required",
                            city_id: "required",
                            district_id: "required"
                        },
                        messages: {
                            tel: "请输入手机号码",
                            nickname: "用户名不能为空",
                            password: {
                                required: "密码不能为空",
                                minlength: "密码不能小于6位"
                            },
                            password1: {
                                required: "确认密码不能为空",
                                minlength: "密码不能小于6位"
                            },
                            errorPlacement: function (error, element) {
                                element.parent().addClass('has-error');
                            },
                            onfocusout: function (element) {
                                //this.element(element);
                            },
                            success: function (label, element) {
                                $(element).parent().removeClass('has-error');
                            }
                        }
                    }
            );
        });
        function qr() {
            var no=$("#no").val();
            var no1=$("#no1").val();
            var no2=$("#no2").val();
            if (no==''){
                alert('原密码不能为空');
                return false;
            }
            if (no==no1){
                alert('和原密码相同');
                return false;
            }
            if (no1!==no2){
                alert('2次密码不同');
                return false;
            }
            if (no1==''){
                alert('新密码不能为空');
                return false;
            }

            var url="<?php echo U('Alter/index');?>&pd1="+no1+"&pd2="+no2+"&pd="+no;
            $.getJSON(url,function (json){
                        alert(json);
                        history.go();
                    }
            )
        }
    </script>
</div>