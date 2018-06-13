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
    <!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo ($page_title); ?><small></small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>首页</a></li>
        <li class="active"><?php echo ($page_title); ?></li>
    </ol>
</section>
    <section class="content">
            <!-- USERS LIST -->
            <div class="box box-danger">
                <div class="box-body no-padding">
                    <div class="box-header with-border">
                        <div class="col-md-12 ">
                            <div class="col-xs-12">
                                <div class="box">
                                    <form action="<?php echo U('Photo/reviewed');?>" method="post" id="myform">

                                        <input type="button" class="btn btn-success" id="selectAll" value="全选/取消">
                                        <button type="button" id="success"  class="btn btn-primary">批量审核通过</button>
                                        <button type="button" id="fail" class="btn btn-info">批量审核未通过</button>

                                        <div class="row" style="padding: 15px;">
                                            <?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="col-md-3" style="padding: 30px; border: solid 1px; width: 250px; height: 350px;">
                                                <img src="<?php echo ($list["card"]); ?>" class="img-responsive" style="width:200px; height:220px;">
                                                <p class="text-center">
                                                    <label><input type="checkbox" id="thumb" name="ids[]" value="<?php echo ($list["id"]); ?>" />选中图片 </label>
                                                </p>

                                                <p class="text-center">
                                                    <?php if($list["status"] == 1): ?><span class="btn btn-success btn-xs">审核通过</span>
                                                        <?php else: ?>
                                                        <button type="button" class="btn btn-gray btn-xs">审核不通过</button><?php endif; ?>
                                                </p>

                                                <div class="text-center">
                                                <a class="btn btn-default btn-xs" href="#" onclick="return audit('<?php echo ($list["id"]); ?>')">审核</a>
                                                </div>

                                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>

                </div><!-- /.box-body -->

            </div><!-- /.box-header -->

    </section>



</div>
<script type="text/javascript">
    $(function () {
        var boxs = document.getElementById('thumb');
        $('#selectAll').click(function () {
            $('input[id=thumb]').each(function () {
                $(this).prop("checked", !$(this).prop("checked"));
            });
        });

        $('input[id=thumb]').click(function () {
            var len = $('input[id=thumb]:checked').length;
            if (len == boxs.length) {
                $('#selectAll').attr('checked', true);
            } else {
                $('#selectAll').attr('checked', false);
            }
        });

    })

</script>
<!--审核弹出框-->
<div class="modal fade" id="myModalaudit" tabindex="-1" role="dialog" aria-labelledby="myModalLabelaudit" aria-hidden="true">
    <div class="modal-dialog" style="width: 240px;">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabelaudit">提示</h4>
            </div>

            <div class="modal-body">
                <form action="<?php echo U('video/audit');?>" method="post" id="formaudit">
                    <input type="hidden" id="audit_id" value="" name="audit_id">
                    <div class="modal-body text-center">
                        <button type="button" class="btn btn-info btn-success" onclick='review(1)'>通过</button>
                        <button type="button" class="btn btn-gray" onclick='review(0)'>不通过</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    //审核
    var delid = '';
    function audit(id) {
        delid = id;
        $("#audit_id").val(delid);
        $('#myModalaudit').modal('show');
        return fasle;
    }
    function trueaudit() {
        $("#formaudit").submit();
    }
    function review(status) {
        location.href = "<?php echo U('Photo/reviewed');?>&id="+delid+"&zt="+status;
    }
    $('#success').click(function () {
        var le = $("input:checked").length;
        if(le == 0){
            alert('请选择数据');
            return false;
        }
        myform.submit();
    });
    $('#fail').click(function () {
        var le = $("input:checked").length;
        if(le == 0){
            alert('请选择数据');
            return false;
        }
        myform.action = "<?php echo U('Photo/failed');?>";
        myform.submit();
    })
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