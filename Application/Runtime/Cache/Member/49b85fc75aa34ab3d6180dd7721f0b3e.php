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

            <!--表格-->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="select pull-right">
                                <form action="<?php echo U('Systemnoticiation/sel');?>" method="post">
                                    <div style="width:250px; margin-left: 5px;" class="input-group">
                                        <input type="text" placeholder="请输入要搜索的通知标题" style="" class="form-control  " name="search" id="keyword">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" id="sea" onclick="return select()">搜索</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div><!-- /.box-header -->
                        <form id="FormOrder" action="" method="post">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover" id="treeTable">

                                    <tr>
                                        <th width="5%" class="text-center">
                                            <input type="checkbox" id="ChooseAll">
                                        </th>
                                        <th width="35%">标题</th>
                                        <th width="30%">发布日期</th>
                                        <th width="30%">管理操作</th>
                                    </tr>


                                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                            <td class="text-center">
                                                <input type="checkbox" name="ckbox" value="<?php echo ($vo["id"]); ?>">
                                            </td>
                                            <td><?php echo ($vo["title"]); ?></td>
                                            <td><?php echo ($vo["add_time"]); ?></td>
                                            <td>
                                                <button onclick="return ck('<?php echo ($vo["id"]); ?>')" class="btn btn-default btn-xs" >查看</button>
                                                <!-- <a class="btn btn-default btn-xs" href="#">模版</a> -->
                                            </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                                    <?php if(empty($data)): ?><tr>
                                            <td colspan="9">
                                                <div class="alert alert-danger text-center" role="alert">对不起，暂无数据</div>
                                            </td>
                                        </tr><?php endif; ?>


                                </table>
                            </div><!-- /.box-body -->
                        </form>
                        <div class="box-footer">
                            <div class="text-right">
                                <?php echo ($page); ?>
                            </div>
                        </div>
                    </div><!-- /.box -->
                </div>
            </div>

        </section>
        <!-- /.content -->


</div><!-- ./wrapper -->

<div class="modal fade " id="myModala" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">系统通知</h4>
            </div>
            <div class="modal-body no-padding maxh500">
                <table class="table table-hover">
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <div class="pull-right" style="">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">关闭</span></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function ck(id) {
        $('#myModala').modal({});
        var url="<?php echo U('Systemnoticiation/tankuang');?>&id="+id;
        $.getJSON(url,function (json) {
            if(json[0].content == null){
                json[0].content= "";
            }
            if(json[0].title == null){
                json[0].title= "";
            }
            if(json[0].add_time == null){
                json[0].add_time= "";
            }
            var tbody='';
            tbody+='<tr>';
            tbody+='<td><p class="pull-right">标题：</p></td>';
            tbody+='<td class="tc" width="70%"><p class="pull-left">'+json[0].title+'</p></td>';
            tbody+='</tr>';
            tbody+='<tr>';
            tbody+='<td><p class="pull-right">内容：</p></td>';
            tbody+='<td class="tc"><p class="pull-left">'+json[0].content+'</p></td>';
            tbody+='</tr>';
            tbody+='<tr>';
            tbody+='<td><p class="pull-right">时间：</p></td>';
            tbody+='<td class="tc"><p class="pull-left">'+json[0].add_time+'</p></td>';
            tbody+='</tr>';
            document.getElementById("tbody").innerHTML=tbody;
        });
        return false;
    }



    del_id = '';
    //全选反选
    $(function (){
        var boxs = document.getElementsByName('ckbox');
        $('#ChooseAll').click(function () {
            $('input[name=ckbox]').prop('checked', $(this).is(':checked'));
        });
        $('input[name=ckbox]').click(function () {
            var len = $('input[name=ckbox]:checked').length;
            if (len == boxs.length) {
                $('#ChooseAll').prop('checked', true);
            } else {
                $('#ChooseAll').prop('checked', false);
            }
        });

    });

    //搜索
    function select() {
        var val = $("#keyword").val();
        if (val == "") {
            location.href = "<?php echo U('Systemnoticiation/index');?>";
            return false;
        }
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