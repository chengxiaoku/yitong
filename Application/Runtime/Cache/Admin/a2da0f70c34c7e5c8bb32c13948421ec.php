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
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">

                    </div><!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" id="loginForm" action="<?php echo U('admin/video/add');?>" method="post">
                        <?php if($type == 'profession'): ?><input type="hidden" name="type" value="0">
                            <?php elseif($type == 'public'): ?>
                            <input type="hidden" name="type" value="1"><?php endif; ?>
                        <div class="box-body padding20">
                            <div class="form-group">
                                <label for="">视频名称<span class="required">*</span></label>
                                <input type="text" placeholder="输入视频名称" name="title" required class="form-control wp50" >
                            </div>
                            <?php if($type == 'profession'): ?><div class="form-group">
                                    <label>专业名称<span class="required">*</span></label>
                                    <select name="specialty_id" class="form-control w200">
                                        <?php if(is_array($video_specialty)): foreach($video_specialty as $key=>$video_specialty): ?><option value="<?php echo ($video_specialty["id"]); ?>"><?php echo ($video_specialty["name"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>视频等级<span class="required">*</span></label>
                                    <select class="form-control wp50" name="video_grade">
                                        <option value="0"><?php echo ($video_grade[0]['lower']); ?></option>
                                        <option value="1"><?php echo ($video_grade[0]['mid']); ?></option>
                                        <option value="2"><?php echo ($video_grade[0]['high']); ?></option>
                                    </select>
                                </div><?php endif; ?>
                            <div class="form-group">
                                <label for="">视频时长（分钟）<span class="required">*</span></label>
                                <input type="text" placeholder="输入时长" name="duration" required class="form-control wp50" >
                            </div>

                            <div class="form-group">
                                <label for="">视频学时（数字）<span class="required">*</span></label>
                                <input type="text" placeholder="输入学时" name="period" required class="form-control wp50" >
                            </div>

                            <div class="form-group">
                                <label for="">视频状态<span class="required">*</span></label>
                                <div>
                                    <div class="radio inline-block margin0">
                                        <label>
                                            <input checked="" value="1" id="" name="status" type="radio">允许播放
                                        </label>
                                    </div>
                                    <div class="radio inline-block margin0">
                                        <label>
                                            <input value="0" id="" name="status" type="radio">禁止播放
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>视频描述<span class="required">*</span></label>
                                <textarea placeholder="Enter ..." rows="3" class="form-control" name="description" required></textarea>
                            </div>

                            <div class="form-group input-group wp50">
                                <label for="">上传视频</label>
                                <div>
                                    <div class="input-group">
                                        <input type="text" name="video_url" readonly="readonly" value="" id="upload_thumb" class="form-control" placeholder="上传视频 ...">
                                        <div class="input-group-btn">
                                            <button onclick="upload()" type="button" class="btn btn-success btn-flat"><i
                                                    class="fa fw fa-plus-circle"></i></button>
                                        </div>
                                    </div>
                                    <em class="help-block"></em>
                                </div>
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer p20">
                            <button class="btn btn-primary w100" type="submit" onclick="return Verification()">新建</button>
                            <a onclick="history.go('-1')" class="btn btn-info w100 ml20" type="submit">返回</a>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- ./wrapper -->
<!-- 上传视频 -->
<div class="modal fade " id="upload_img" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">上传视频</h4>
            </div>
            <div class="modal-body no-padding maxh500">
                <div id="images-zone" style="padding: 23px;">
                  <!--  <img src="" id="img" alt=""><h1 id="jindu"></h1>-->
                    <div class="progress">
                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" id="jindu" style="width: 0%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-left" style="">
                    <div class="btn btn-success fileinput-button pull-left inline-block">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>添加视频</span>
                        <input id="fileupload" type="file" name="files[]" multiple="">
                    </div>
                    <!-- <button type="button" class="btn btn-default ml20" data-dismiss="modal">上传图片</button> -->
                    <span id="loading" class="loading inline-block mt5 ml10 hide"><i class="fa fa-refresh fa-spin"></i>&nbsp; 数据加载中...<em id=""></em></span>
                    <span id="success" class="loading inline-block mt5 ml10 hide"><i class="fa fa-check-circle-o"></i>上传成功</span>
                </div>
                <button type="button" class="btn btn-default ml20" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary">确定</button>
            </div>
        </div>
    </div>
</div>
<style>
    .error {
        color: red;
    }
</style>
<script src="<?php echo ASSETS;?>plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
<link href="<?php echo ASSETS;?>plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    function Verification() {
        $("#loginForm").validate({
            rules: {
                tite: "required",
                duration: "required",
                period:{
                    required: true,
                    digits: true,
                },
                description: "required",
                video_url: "required"
            },
            messages: {
                title: "视频不能为空",
                duration: "时长不能为空",
                period:{
                    required: "学时不能为空",
                    digits: "请输入有效学时",
                },
                description: "描述不能为空",
                video_url: "请上传视频"
            }
        });
        return true;
    }

    //上传视频
    function upload() {
        $('#upload_img').modal({});
    }

    //添加视频
    var url = "<?php echo U('admin/video/upload');?>";
    $("#fileupload").fileupload({
        url: url,
        dataType: 'json',
        autoUpload: true,
        //acceptFileTypes: /(\.|\/)(mp3|jpe?g|png)$/i,
        maxFileSize: 1024 * 1024 * 200,

        done: function(e, data) {
            $.each(data.result.files, function (index, file) {
                $("#img").attr("src",file.thumbnailUrl);
                $("#upload_thumb").val('Public/'+file.url);
                $("#upload_img button:contains('确定')").click(function () {
                    $("#upload_img").modal("hide");
                })
            });
        },

        progressall: function(e, data) {
            //显示进度条
            var progress = parseInt(data.loaded / data.total * 100,10);
            var jindu =progress+'%';
            $("#jindu").css("width",jindu);
            if(progress == 100){
                $("#success").removeClass("hide");
                $("#loading").addClass("hide");
            }else {
                $("#loading").removeClass("hide");
                $("#success").addClass("hide");
            }
        }
    });

</script>