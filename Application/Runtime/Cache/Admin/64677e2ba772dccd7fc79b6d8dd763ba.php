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
                            $('.sidebar-menu li').eq(i).addClass('active');
                        }else{
                            $('.sidebar-menu li').eq(i).addClass('active');
                        }
                    }
                }
            }
    )
</script>
<div class="content-wrapper">
    <!--页面导航/面包屑-->
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
            <div class="col-md-8">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="form-group">
                                    <label>网站域名:</label>
                                    <div>
                                        <input id="<?php echo ($set1["id"]); ?>" type="text" placeholder="输入网站域名 ..." value="<?php echo ($set1["setting_value"]); ?>" name="domain_name"
                                               class="form-control wp50 inline-block">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>网站名称:</label>
                                    <div>
                                        <input id="<?php echo ($set2["id"]); ?>" type="text" placeholder="输入网站名称 ..." value="<?php echo ($set2["setting_value"]); ?>" name="site_name"
                                               class="form-control wp50 inline-block">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>网站关键词:</label>
                                    <div>
                                        <input id="<?php echo ($set3["id"]); ?>" type="text" placeholder="输入网站关键词 ..." value="<?php echo ($set3["setting_value"]); ?>" name="site_keywords"
                                               class="form-control wp50 inline-block">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>网站描述:</label>
                                    <div>
                                            <textarea id="<?php echo ($set4["id"]); ?>" name="site_description" class="form-control wp50" rows="3"
                                                      placeholder="网站描述 ..."><?php echo ($set4["setting_value"]); ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for=>网站状态:</label>
                                    <div>
                                        <div class="radio inline-block mt0">
                                            <label>
                                                <input id="pd" style="display: none" value="<?php echo ($set5["setting_value"]); ?>">
                                                <input id="1" type="radio" name="site_status" value="1" checked>正常
                                            </label>
                                        </div>
                                        <div class="radio inline-block mt0 ml20">
                                            <label>
                                                <input id="0" type="radio" name="site_status" value="0">关闭
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="yz">
                                    <label>关闭原因:</label>
                                        <textarea id="<?php echo ($set6["id"]); ?>" placeholder="Enter ..." name="close_reason" rows="5"
                                                  class="form-control wp50"><?php echo ($set6["setting_value"]); ?></textarea>
                                </div>

                                <div class="box-footer p20">
                                    <button class="btn btn-primary w100" onclick="return baocun()">保存</button>
                                    <!--<a onclick="history.go('-1')" class="btn btn-info w100 ml20"
                                       type="submit">返回</a>-->
                                </div>
                            </div><!-- /.tab-pane -->
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->

</div><!-- ./wrapper -->
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
<script>
    function baocun() {
        var domain_name=$("#1").val();
        var site_name=$("#2").val();
        var site_keywords=$("#3").val();
        var site_description=$("#4").val();
        var site_status=$("input:radio:checked").val();
        var close_reason=$("#6").val();
        var url ="<?php echo U('Set/Index');?>&domain_name="+domain_name+"&site_name="+site_name+"&site_keywords="+site_keywords+"&site_description="+site_description+"&site_status="+site_status+"&close_reason="+close_reason;
        $.getJSON(url,function (json){
            alert(json);
            history.go();
        }
        )
    }
    $(document).ready(
            function () {
                var ok=$("#pd").val();
                $("#"+ok).prop("checked",'true');


                var time=setInterval(function () {
                    var site_status=$("input:radio:checked").val();
                    if(site_status=='1'){
                        $("#yz").css("display",'none');
                    }else if(site_status=='0'){
                        $("#yz").css("display",'');
                    }
                },1000);

            }
    )
</script>