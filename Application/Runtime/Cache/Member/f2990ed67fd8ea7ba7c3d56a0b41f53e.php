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
                            <span class="hidden-xs"><?php echo session('user_name');?> </span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img id="head_img_02" class="img-circle" alt="User Image" src="<?php if($headimg1 == "1" ): echo ASSETS;?>/img/avatar5.png<?php else: echo ($headimg1); endif; ?>">                                <p>
                              <?php echo session('user_name');?>                         </p>
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
        <!--统计区块-->
        <div class="row">
            <div class="col-md-12">


                <div class="callout callout-info" style="border-color:#00c0ef;">
                    <h4 style="font-weight: bold">总学时：<span style=" margin-right: 10px;"><?php echo ($sum_period); ?></span>(已学课时不能少于总课时)
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        已完成学时：<?php echo ($num_period); ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        考试成绩：<?php echo ($grade); ?>
                    </h4>
                </div>

</div>

        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">专业等级</h3>
                        <div class="box-tools">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <?php if($level == 0): ?><li class="active"><a href="<?php echo U('Specialized/index',array('type'=>'low'));?>"><i class="fa fa-inbox"></i> 低级 <span class="label label-primary pull-right mes"><?php echo ($num1); ?></span></a></li>
                               <?php elseif($level == 1): ?>
                                <li class="<?php if($type == 1): ?>active<?php endif; ?>"><a href="<?php echo U('Specialized/index',array('type'=>'low'));?>"><i class="fa fa-inbox"></i> 低级 <span class="label label-primary pull-right mes"><?php echo ($num1); ?></span></a></li>
                                <li class="<?php if($type == 2): ?>active<?php endif; ?>"><a href="<?php echo U('Specialized/index',array('type'=>'middle'));?>"><i class="fa fa-envelope-o"></i> 中级<span class="label label-primary pull-right mes"><?php echo ($num2); ?></span></a></li>
                                <?php elseif($level == 2): ?>
                                <li class="<?php if($type == 1): ?>active<?php endif; ?>"><a href="<?php echo U('Specialized/index',array('type'=>'low'));?>"><i class="fa fa-inbox"></i> 低级 <span class="label label-primary pull-right mes"><?php echo ($num1); ?></span></a></li>
                                <li class="<?php if($type == 2): ?>active<?php endif; ?>"><a href="<?php echo U('Specialized/index',array('type'=>'middle'));?>"><i class="fa fa-envelope-o"></i> 中级<span class="label label-primary pull-right mes"><?php echo ($num2); ?></span></a></li>
                                <li class="<?php if($type == 3): ?>active<?php endif; ?>"><a href="<?php echo U('Specialized/index',array('type'=>'high'));?>"><i class="fa fa-filter"></i> 高级 <span class="label label-primary pull-right mes"><?php echo ($num3); ?></span></a></li><?php endif; ?>
                        </ul>
                    </div><!-- /.box-body -->
                </div><!-- /. box -->
            </div><!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">课件列表</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                <tr>
                                    <th width="25%">课件名称</th>
                                    <th width="25%" class="text-center">课时</th>
                                    <th width="25%" class="text-center">状态</th>
                                    <th width="25%" class="text-center">管理操作</th>
                                </tr>
                                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
                                        <td><?php echo ($row['title']); ?></td>
                                        <td class="text-center"><?php echo ($row['period']); ?></td>
                                        <td class="text-center">

                                                <?php if($data3[$i-1]['end'] == 1): ?><small class="label bg-aqua">观看完</small>
                                                    <?php elseif($data3[$i-1]['end'] == '0'): ?>
                                                    <small class="label btn btn-warning"><?php echo ($data3[$i-1]['progress']); ?></small>
                                                    <?php else: ?>
                                                    <small class="label btn btn-warning">未观看</small><?php endif; ?>

                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo U('Specialized/play',array('id'=>$row['id']));?>" class="label bg-green">播放</a>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-5"></div>
                            <div class=" col-sm-7 ">
                                <div class="text-right">
                                    <?php echo ($page); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /. box -->
            </div><!-- /.col -->
        </div>
           </section>

</div>
<script type="text/javascript">



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