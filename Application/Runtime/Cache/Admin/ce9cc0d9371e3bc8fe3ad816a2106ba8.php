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
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a class="btn btn-primary" href="<?php echo U('Role/add');?>">添加角色</a>
                        <a class="btn  btn-danger" id="delall">批量删除</a>

                        <div class="select pull-right">
                            <div class="input-group" style="width:250px; margin-left: 5px;">
                                <input id="sour" type="text" name="" class="form-control  " style="" placeholder="搜索...">
                                <div class="input-group-btn">
                                    <button onclick="return sour()" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-header -->

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th width="5%" class="tc">
                                    <input id="all" type="checkbox">
                                </th>
                                <th width="5%">编号</th>
                                <th width="10%">角色名称</th>
                                <th width="10%">角色描述</th>
                                <th width="10%">状态</th>
                                <th width="10%">管理操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($user)): foreach($user as $key=>$data): ?><tr>
                                    <td class="tc"><input class="xuan" type="checkbox" value="<?php echo ($data["id"]); ?>"></td>
                                    <td><?php echo ($data["id"]); ?></td>
                                    <td><?php echo ($data["name"]); ?></td>
                                    <td><?php echo ($data["description"]); ?></td>
                                    <td class="zt"><small class="label sm"><?php echo ($data["disabled"]); ?></small></td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="<?php echo U('Role/quanxian');?>&id=<?php echo ($data["id"]); ?>">权限设置</a>
                                        <a class="btn btn-default btn-xs" href="<?php echo U('Role/change');?>&id=<?php echo ($data["id"]); ?>">修改</a>
                                        <button class="btn btn-default btn-xs" onclick="return del('<?php echo ($data["id"]); ?>')">删除</button>
                                    </td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                            <tbody style="display: none" id="ooo">
                            <tr>
                            <td colspan="6">
                                <h1 id="yyy"><center><?php echo ($no); ?></center></h1>
                            </td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->



                    <div class="box-footer">
                        <div class="pull-right">
                            <ul class="pagination">
                                <li id="example2_next" class="paginate_button next"><?php echo ($next); ?></li>
                            </ul>
                        </div>
                        <div class="pull-right" id="feny" style="width: <?php echo ($wid2); ?>px;overflow: hidden;">
                            <div id="nei" style="width:<?php echo ($wid); ?>px;position: relative;">
                                <ul class="pagination">
                                    <?php if(is_array($allpage)): foreach($allpage as $key=>$data): echo ($data); endforeach; endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="pull-right">
                        <ul class="pagination">
                            <li id="example2_previous" class="paginate_button previous"><?php echo ($prev); ?></li>
                        </ul>
                    </div>
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
    function del(a) {
        var url= "<?php echo U('Role/del');?>&id="+a;
        $click=confirm("你确定要删除"+a+"吗");
        if ($click==true){
            $.getJSON(url,function (json){
                        alert(json);
                        history.go();
                    }
            )
        }

    }
    function sour() {
        var sour=$("#sour").val();
            self.location ="<?php echo U('Role/index');?>&sour="+sour;
    }
    $(document).ready(
            function () {

                var page_now=<?php echo ($page); ?>;
                var zy=<?php echo ($all_page); ?>;
                if (page_now<=zy-3){
                    num=(page_now-2)*33-33
                    left="-"+num+"px";
                    $("#nei").animate({left:left},100);
                }else{
                    num=zy*33-33*5
                    left="-"+num+"px";
                    $("#nei").animate({left:left},100);
                }


                if($("#yyy").text()){
                    $("#ooo").css('display','');
                }else{
                    $("#ooo").css('display','none');
                }
				
				
                $("#"+page_now).addClass('active');

                var l=$('.sm').length;
                for (i=0;i<l;i++){
                    var zt=$('.sm').eq(i).text()
                    if(zt==0){
                        $(".sm").eq(i).text('禁用');
                        $(".sm").eq(i).addClass('bg-red');
                    }else if(zt==1){
                        $(".sm").eq(i).text('启用');
                        $(".sm").eq(i).addClass('bg-primary');
                    }else{
                        $(".sm").eq(i).text('无');
                        $(".sm").eq(i).addClass('bg-black');
                    }
                }


                $('#all').click(
                        function () {
                            if($('#all').is(':checked')){
                                $(".xuan").prop("checked",'true');
                            }else{
                                $(".xuan").prop("checked",'');
                            }
                        }

                )
                $("#delall").click(
                        function () {
                            /*for (i=0;i<=4;i++){
                                alert(i);
                            }*/
                            var id=[];
                            $('.xuan:checked').each(function () {
                                id.push($(this).val())
                            });
                            var pd_id=id.length;
                            if(pd_id==0){return false;}
                            var url= "<?php echo U('Role/del');?>&id="+id;
                            $click=confirm("你确定要删除"+id+"吗");
                            if ($click==true){
                                $.getJSON(url,function (json){
                                            alert(json);
                                            history.go();
                                        }
                                )
                            }

                        }
                )
            }
    )

</script>