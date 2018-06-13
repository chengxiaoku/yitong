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
                        <form role="form" id="loginForm" action="<?php echo U('member/detail');?>" method="post">
                             <div class="tab-content">
                                <div class="form-group">
                                     <label class="page-top" style="padding-left: 28px;"> 个人头像 : </label>
                                     <img src="<?php echo ($lists["thumb"]); ?>">
                                </div>
                                <div class="tab-pane active" id="tab_1">
                                    <div class="form-group">
                                        <label class="label_mess"> 姓名：</label>
                                        <input type="text" readonly="readonly" placeholder="输入姓名 ..."  name="name" id="name"
                                               value="<?php echo ($lists["name"]); ?>" class="form-control w100 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 身份证：</label>
                                        <input type="text" readonly="readonly" placeholder="输入身份证 ..." name="identity" id="identity"
                                               value="<?php echo ($lists["identity"]); ?>" class="form-control w200 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 密码：</label>
                                        <input readonly="readonly" type="password" placeholder="输入密码 ..." name="password" id="password"
                                               value="<?php echo ($lists["password"]); ?>" class="form-control w150 inline-block relative right absolute ">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 再次输入密码：</label>
                                        <input readonly="readonly" type="password" placeholder="再次输入密码 ..." name="next_password" id="password2"
                                               value="<?php echo ($lists["password"]); ?>" class="form-control w150 inline-block relative right absolute ">
                                    </div>


                                    <div class="form-group">
                                        <label class="label_mess"> 手机号码：</label>
                                        <input type="text" readonly="readonly" placeholder="输入手机号码 ..." name="phone" id="phone"
                                               value="<?php echo ($lists["phone"]); ?>" class="form-control w200 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 用户等级：</label>
                                        <select readonly="readonly"  readonly="readonly" class="form-control w200 inline-block province"  value="<?php echo ($lists["level"]); ?>">
                                            <!--<option value="">≡ 请选择您的用户等级 ≡</option>-->
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
                                        <input type="text" readonly="readonly" placeholder="输入民族 ..." name="nation" id="nation"
                                               value="<?php echo ($lists["nation"]); ?>" class="form-control w200 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 邮箱：</label>
                                        <input type="text" readonly="readonly" placeholder="输入邮箱 ..." name="email" id="email"
                                               value="<?php echo ($lists["email"]); ?>" class="form-control w200 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 学历：</label>
                                        <select readonly="readonly" class="form-control w200 inline-block province" name="educational" id="educational">
                                            <!--<option value="">≡ 请选择您的学历 ≡</option>-->
                                            <?php if(is_array($_data)): $i = 0; $__LIST__ = $_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i; if($lists['educational'] == $i-1): ?><option selected value="<?php echo ($i-1); ?>"><?php echo ($row); ?></option><?php endif; ?>
                                                <option value="<?php echo ($i-1); ?>"><?php echo ($row); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 学校：</label>
                                        <input type="text" readonly="readonly" placeholder="输入学校 ..." name="school" id="school"
                                               value="<?php echo ($lists["school"]); ?>" class="form-control w200 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 毕业时间：</label>
                                        <input type="text" readonly="readonly" style="left: 5px;" placeholder="输入毕业时间 ..." name="graduation_date" id="graduation_date"
                                               value="<?php echo ($lists["graduation_date"]); ?>" class="form-control w200 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 行政职务：</label>
                                        <input readonly="readonly" type="text" placeholder="输入行政职务 ..." name="duty" id="duty"
                                               value="<?php echo ($lists["duty"]); ?>" class="form-control w200 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 所学专业：</label>
                                        <select readonly="readonly" class="form-control w200 inline-block province" name="profession" id="profession"  value="<?php echo ($lists["profession"]); ?>">
                                           <!-- <option >≡ 请选择您的专业 ≡</option>-->
                                            <?php if(is_array($sp)): $i = 0; $__LIST__ = $sp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i; if($lists['profession'] == $row['id']): ?><option value="<?php echo ($row['id']); ?>" selected="selected"><?php echo ($row['name']); ?></option>
                                                    <?php else: ?>
                                                    <option value="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 现有职称：</label>
                                        <select  readonly="readonly" class="form-control w200 inline-block province" name="duty_level" id="duty_level">
                                            <!--<option value="">≡ 请选择您的现有职称 ≡</option>-->
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
                                        <input readonly="readonly" type="text" placeholder="输入学费 ..." name="fee" id="fee"
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
                                        <label class="label_mess"> 培训时间：</label>
                                        <input readonly="readonly" type="text" style="left: 5px;" placeholder="输入培训时间 ..." name="training_time" id="training_time"
                                               value="<?php echo ($lists["training_time"]); ?>" class="form-control w200 inline-block">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_mess"> 累计课时：</label>
                                        <input readonly="readonly" type="text" placeholder="输入累计课时 ..." name="hour" id="hour"
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
                                        <a onclick="history.go('-1')" class="btn btn-primary w100"
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

<script src="<?php echo ASSETS;?>plugins/jquery-validate/jquery.validate.min.js"></script>
<script src="<?php echo ASSETS;?>plugins/jquery-validate/localization/messages_zh.min.js"></script>
<script src="<?php echo ASSETS;?>plugins/jquery-validate/additional-methods.min.js" type="text/javascript"></script>
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

    // 邮箱验证


    function login() {
        <!--验证不能为空-->
        $("#loginForm").validate({
            rules: {
                name: {
                    required: true,
                    rangelength:[2,4]
                },
                identity: {
                    required: true,
                    rangelength:[6,18]
                },
                password: {
                    required: true,
                    rangelength:[6,18],
                    equalTo: "#pwd"
                },
                next_password: {
                    required: true,
                    rangelength:[6,18],
                    equalTo: "#pwd"
                },
                phone: "required",
                level: {
                    required: true,
                    isIDCard: true
                },
                sex: "required",
                email: "required",
                educational: "required",
                duty_level: "required",
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
                password: {
                    required: "* 密码不能为空",
                    rangelength: "* 密码长度必需在6-18个字符之间"
                },
                next_password: {
                    required: "* 密码不能为空",
                    rangelength: "* 密码长度必需在6-18个字符之间",
                    equalTo: "* 两次密码输入不一致"
                },
                phone: {
                    required: "* 手机号码不能为空",
                    isPhone: "* 请输入正确格式手机号码"
                },
                level: "* 用户等级不能为空",

                sex: "* 性别不能为空",
                email: "* 邮箱不能为空",
                educational: "* 性别不能为空",
                duty_level : "* 现有职称不能为空",
                fee_status : "* 缴费状态不能为空"

            }
        });
        return true;
    }

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