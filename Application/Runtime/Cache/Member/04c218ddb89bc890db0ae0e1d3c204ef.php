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
<!-- 引入视频插件-->
<script src="./Public/build/mediaelement-and-player.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="./Public/build/mediaelementplayer.min.css">
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
    <!-- Main content -->
    <section class="content">
      <!-- <img src="<?php echo ASSETS;?>/defualt-skin.png" width="100%">-->
        <div class="video-bg">
        <video width="960" height="540" src="<?php echo ($course_message['video_url']); ?>" type="video/mp4"
               id="player1" poster=""
               controls="controls" preload="none"></video>
            <img hidden width="960" height="540" src="<?php echo ASSETS;?>img/video_end.jpg" id="video_end_img">
            <button id="video_end_btn" hidden="hidden"></button>
        </div>
    </section>

</div><!-- ./wrapper -->
<style>
    .video-bg{
        width: 1130px;
        background: url("<?php echo ASSETS;?>img/video_see.jpg") no-repeat;
        background-size:1200px;
        padding: 6px 0px 180px 120px;
        margin-left: -50px;
    }

.content-wrapper{
    background-color: #fff;
}
    #video_end_img{
        position: absolute;
        top:110px;
        left:315px;
        z-index:9998;
    }
    #video_end_btn{
        position: absolute;
        top:335px;
        left:707px;
        z-index:9999;
        width: 177px;
        height: 188px;
        background: none;
        border: none;
    }
</style>
<?php if($end == 0): ?><script type="text/javascript">
    var _vido_id = "<?php echo ($data['id']); ?>";
    //异步请求发送的地址
    var my_url = "<?php echo U('publictrain/log');?>";
    //获取进度
    var time = "<?php echo ($time); ?>";
    var player = null;
    $("#player1").mediaelementplayer({
        features: ['playpause','current','duration','tracks','volume','fullscreen'],
        enableKeyboard: false,

        success: function(mediaElement, domElement) {
            player = mediaElement;
            //监听时间进度事件
            player.addEventListener("timeupdate", CallBackTimeupdate);
            //监听暂停事件
            player.addEventListener("pause", CallBackPause);
            //监听点击播放按钮事件
            player.addEventListener("playing", CallBackPlaying);
            //监听点击开始
            player.addEventListener("progress", CallBackProgress);
            //监听完毕事件
            player.addEventListener("ended", CallBackEnded);

            //定位到20秒
            player.setCurrentTime(time);
            player.addEventListener("loadedmetadata", CallBackLoadeddata);

        }

    });

    function CallBackLoadeddata() {
        var total = player.duration  ;
        //console.log(player);
    }

    function CallBackTimeupdate() {
        //当前时间
        var current_time = player.currentTime;
    }

    function CallBackPause() {
        //暂停时间
        var current_time = player.currentTime;
    }


    function CallBackPlaying() {
        //点击播放按钮事件
        var current_time = player.currentTime;
        xa = 0;
        var _timer = setInterval(function(){
                xa ++;
                if(xa == 1){
                    player.stop();
                    clearTimeout(_timer);
                }
        }, 300000);
    }

    //播放过程中的事件（只是在开始触发）
    function CallBackProgress() {
        //5分钟是5秒的60倍
        setInterval(function(){
            //每5秒回传一次数据
            if (!player.paused) {
                //非暂停情况下回传数据
                var _time = player.currentTime;
                $.post(my_url, {vido_id:_vido_id,time:_time}, function(data) {
                });
            }
        }, 5000);
    }

    //视频播放完毕事件
    function CallBackEnded() {
        $('#video_end_img').show();
        $('#video_end_btn').show();
        var url = "<?php echo U('publictrain/end');?>";
        $.post(url, {vido_id:_vido_id}, function(data) {
        });
    }


    $(function(){
        $("#video_end_btn").click(function(){
            window.location.reload();//刷新当前页面.
        });
    });
</script><?php endif; ?>
<div class='control-sidebar-bg'></div>

</body>
</html>