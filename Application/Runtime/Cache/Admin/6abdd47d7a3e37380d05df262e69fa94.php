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




                            <span class="hidden-xs"><?php echo session('_admin_user_name');?> </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <?php if($headimg1 == '1'): ?><img src="<?php echo ASSETS;?>/img/avatar5.png"  class="user-image" alt="admin Image">
                                    <?php else: ?>
                                    <img src="<?php echo ($headimg1); ?>"  class="user-image" alt="admin Image"><?php endif; ?>

                                <p>
                                 <?php echo session('_admin_user_name');?>                         </p>
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
            <div class="col-md-7 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 style="margin: 0">修改角色权限</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body padding20">
                        <table id="dnd-example" class="treetable table table-hover">
                            <?php if(is_array($menu)): foreach($menu as $i=>$vo): ?><tr id="<?php echo ($i); ?>">
                                    <td>
                                        <label style="color: #333;padding-left: 5px;"><input id="<?php echo ($vo["c"]); ?>" type="checkbox" class="ckbox" value="<?php echo ($vo["m"]); ?>|<?php echo ($vo["c"]); ?>">&nbsp;<?php echo ($vo["title"]); ?></label>
                                    </td>
                                </tr>
                                <?php if(is_array($vo['children'])): foreach($vo['children'] as $k=>$voo): ?><tr id="<?php echo ($k); ?>" class="<?php echo ($i); ?>">
                                        <td>
                                            <label style="color: #333;padding-left: 20px;"><input type="checkbox" class="ckbox <?php echo ($voo["c"]); ?> two" value="<?php echo ($voo["m"]); ?>|<?php echo ($voo["c"]); ?>|<?php echo ($voo["a"]); ?>">&nbsp;<?php echo ($voo["title"]); ?></label>
                                        </td>
                                    </tr><?php endforeach; endif; endforeach; endif; ?>
                            <?php if(is_array($o)): foreach($o as $kk=>$oo): ?><tr style="display: none">
                                    <td>
                                        <input id="<?php echo ($kk); ?>c" value="<?php echo ($oo); ?>">
                                    </td>
                                </tr><?php endforeach; endif; ?>
                        </table>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-primary w100" onclick="return bc()">保存</button>
                        <a onclick="history.go('-1')" class="btn btn-info w100 ml20">返回</a>
                    </div>
                </div><!-- /.box -->
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
    $(document).ready(function () {
        $('.two').click(
                function () {
                    var a=$('.two').parent().parent().parent().attr('class');

                    if($('.two').is(':checked')){
                        $("#"+a+" input").prop("checked",'true');
                    }else{
                        $("#"+a+" input").prop("checked",'');
                    }
                }
        )
        var a=$('.two').parent().parent().parent().attr('class');
        $("#"+a+" input").click(
                function () {
                    if($("#"+a+" input").is(':checked')){
                    }else{
                        $('.two').prop("checked",'');
                    }
                }
        )


        for (ii=0;ii<<?php echo ($cc); ?>;ii++){
            var c=$('#'+ii+'c').val();
            if(c==''){}else{
                $("#"+c+" input").prop("checked",'true');
            }

        }

        var lenth=$('tr').length;
        for (i=0;i<lenth;i++){
            var a=$('tr').eq(i).attr('class');
            var b=$('tr').eq(i-1).attr('id');
            $("."+a).css('display','none');
            if (a==b){
                $("#"+a+" td").append('<span class="indenter pull-left"><button onclick="return zk(\''+a+'\')" title="Expand" class="glyphicon glyphicon-chevron-right"></button></span>');
            }
        }
    });
    function zk(b) {
        var css=$("#"+b+' button').attr('class');
        if (css=='glyphicon glyphicon-chevron-right'){
            $("."+b).css('display','');
            $("#"+b+' button').removeClass('glyphicon-chevron-right');
            $("#"+b+' button').addClass('glyphicon-chevron-down');
        }else{
            $("."+b).css('display','none');
            $("#"+b+' button').removeClass('glyphicon-chevron-down');
            $("#"+b+' button').addClass('glyphicon-chevron-right');
        }

    }
    function bc() {
        var sj=[];
        $('.ckbox:checked').each(function () {
            sj.push($(this).val())
        });
        if (sj==''){
            sj='no';
        }
       var url = "<?php echo U('Role/quanxian');?>&sj="+sj+"&id="+<?php echo ($id); ?>;

        $.getJSON(url,function (json){
            alert(json);
			history.go();
        }
        )

    }

</script>