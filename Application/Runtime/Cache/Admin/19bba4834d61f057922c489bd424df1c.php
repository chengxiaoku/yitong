<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
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
                            <img src="<?php echo ASSETS;?>/img/avatar5.png" id="head_img01" class="user-image" alt="admin Image">
                            <span class="hidden-xs"><?php echo session('_admin_user_name');?> </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img id="head_img_02" class="img-circle" alt="User Image" src="<?php echo ASSETS;?>/img/avatar5.png">                                <p>
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
            <!-- <li class="header">MAIN NAVIGATION</li> -->

            <li>
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>控制面板</span>
                </a>
            </li>

            <li class="treeview">
                <a href="<?php echo U('video/index');?>">
                    <i class="fa  fa-user"></i>
                    <span>视频管理</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo U('video/index');?>"><i class="fa fa-circle-o"></i>视频列表</a></li>
                    <li><a href="<?php echo U('profession/index');?>"><i class="fa fa-circle-o"></i>专业列表</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa  fa-user"></i>
                    <span>会员管理</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>会员列表</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>单位用户列表</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>照片审核</a></li>
                </ul>
            </li>

            <li>
                <a href="news.html">
                    <i class="fa  fa-th"></i>
                    <span>通知列表</span>
                </a>
            </li>



            <li class="header"></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa  fa-user"></i>
                    <span>管理员设置</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin.html"><i class="fa fa-circle-o"></i>管理员管理</a></li>
                    <li><a href="admin-role.html"><i class="fa fa-circle-o"></i>角色管理</a></li>
                </ul>
            </li>

            <li>
                <a href="news.html">
                    <i class="fa  fa-th"></i>
                    <span>网站设置</span>
                </a>
            </li>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
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
                <!-- general form elements -->
                <div class="box box-solid">
                    <!-- form start -->
                    <form role="form" id="baocun" enctype="multipart/form-data" action="" method="post">
                        <div class="box-body">
                            <div class="form-group"> <!--has-error-->
                                <label for="">专业名称 <span class="required">*</span></label>
                                <div>
                                    <input name="title"  type="text" required class="form-control wp50 inline-block" id="title" placeholder="输入专业名称 ...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>描述</label>
                                <textarea placeholder="请输入描述 ..." rows="3" name="discription" class="form-control"></textarea>
                            </div>

                            <hr>

                            <!--<div class="form-group  ">-->
                                <!--<label>课程类型</label>-->
                                <!--<select class="form-control wp50" name="category_id">-->
                                    <!--<option>≡请选择课程类型≡</option>-->
                                    <!--<option>请选择课程类型</option>-->
                                    <!--<option>请选择课程类型</option>-->
                                <!--</select>-->
                            <!--</div>-->

                            <!--<div class="form-group  ">-->
                                <!--<label>课程等级</label>-->
                                <!--<select class="form-control wp50" name="author_id" id="author">-->
                                    <!--<option>≡请选择课程等级≡</option>-->
                                    <!--<option>请选择课程等级</option>-->
                                    <!--<option>请选择课程等级</option>-->
                                <!--</select>-->
                            <!--</div>-->

                            <div class="form-group  ">
                                <label>状态：</label>
                                <br>
                                <form>
                                    <label><input name="Fruit" type="radio" value="" checked/>启用 </label>
                                    <label><input name="Fruit" type="radio" value="" />禁止 </label>
                                </form>
                            </div>

                            <!--<label for="">课程视频数量<span class="required"></span></label>-->
                            <!--<div>-->
                                <!--<input required type="text"  name="" class="form-control wp50 inline-block" id="" placeholder="">-->
                            <!--</div>-->

                            <div class="box-footer">
                                <button class="btn btn-primary w100" type="submit">保存</button>
                                <a onclick="history.go('-1')" class="btn btn-info w100 mr20" type="submit">返回</a>
                            </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->

        </div>
    </section>
    <!-- /.content -->

</div><!-- ./wrapper -->
<div class="modal fade" id="myAllModal" tabindex="-1" role="dialog" aria-labelledby="myAllModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">删除操作</h4>
            </div>
            <div class="modal-body">
                <h5 style="color: red;"><span class="glyphicon glyphicon-exclamation-sign" style="margin-right:10px; "></span><span id="data_sum"></span></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary" onclick="deled()"> 确认</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--删除弹出框-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">提示</h4>
            </div>
            <div class="modal-body">
                <span class='glyphicon glyphicon-question-sign text-red' style='font-size: 18px;'></span>
                <span style='font-size: 18px;' class="ml10 text-red">确认要删除该课件？</span>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="truedel()" class="btn btn-primary w100 ">确定</button>
                <button type="button" class="btn btn-default w100 " data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
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
        //批量删除提示操作

        $("#delAll").click(function (){
            var del_str = '';
            var len = $('input[name=ckbox]:checked').length;
            if(len>=1){
                $('input[name=ckbox]:checked').each(function (){
                    //$(this).val();
                    del_str +=','+$(this).val();
                });
                del_str = del_str.substring(1);
                del_id = del_str;
                $("#data_sum").text("确认删除这"+len+'条数据？');
            }else{
                $("#data_sum").text('没有选择数据！！');
            }

            $('#myAllModal').modal('show');
        })
    });
    var delid = "";
    function del(id) {
        delid = id;
        $("#myModal").modal();
        return fasle;
    }
    //确认删除操作
    function truedel() {
        location.href = "<?php echo U('video/del');?>&id=" + delid;
    }
    //搜索
    function select() {
        var val = $("#select").val();
        var vals = $.trim(val);
        if (vals == "") {
            $("#select").val("");
            $("#select").attr("placeholder", "请输入有效内容");
            $("#select").focus();
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