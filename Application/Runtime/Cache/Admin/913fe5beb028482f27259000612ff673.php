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
<!--content-wrapper-->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
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
        <div class="row"><!--row-->
            <!-- left column -->
            <div class="col-md-12"><!--col-md-12-->
                <!-- general form elements -->
                <div class="box box-solid"><!--box box-solid-->
                    <!-- form start -->
                        <div class="box-body"><!--box-body-->
                            <div class=""><!---->
                                <div class="modal-body" style="background-color: #00c0ef;color: white">
                                    <td>
                                        <h1 class='glyphicon glyphicon-info-sign' style='font-size: 30px;'> 说明 </h1>
                                        <!--  <span style='font-size: 18px;' class="ml10 text-red">  </span>-->
                                    </td>
                                    <th>
                                        <h3>
                                            导入的文件必须是excel文件且excel表格中包含8列内容：
                                            姓名、身份证、手机号码、性别、报考级别、专业、已学学时、管理
                                        </h3>
                                    </th>
                                </div>
                                <div style="padding-left: 20px; margin-top: 20px;;">
                                    <h5>选择要导入的excel文件</h5>
                                    <!--<button onclick="upload()" type="button1" class="btn btn-success btn-flat">
                                        <i class="fa fw fa-plus-circle" style="margin-top: 5px;"> 导入Excel文件 </i>
                                    </button>-->

                                    <form action="<?php echo U('admin/member/uploadexcel');?>" method="post" enctype="multipart/form-data">
                                        <!--
                                        1: 提交上传文件表单
                                        2：服务端将文件保存到Public/upload目录下
                                        3：使用PHPExcel读取excel文件
                                        4：入库
                                        -->
                                        <input type="file" name="myexcel">

                                        <br>
                                        <button type="submit"> 上传文件 </button>
                                    </form>
                                    <div class="input-group-btn">
                                    </div>
                                    <div >
                                    </div>
                                    <!--<div class="progress" style="margin-top: 5%">
                                        <th>当前进度：0% </th>
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>-->
                                </div>

                            </div><!--/-->
                        </div><!--/box-body-->
                     </div><!--/box box-solid-->
                </div><!--/col-md-12-->
          </div><!--/row-->
    </section>
</div><!--/content-wrapper-->
<!-- 上传图片模态框 -->

<div class="modal fade " id="imageUploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="">导入excel文件</h4>
            </div>
            <div class="modal-body no-padding maxh500">
                <div class="images-zone tc thumb-place-holder">

                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-left" style="">
                    <div class="btn btn-success fileinput-button pull-left inline-block">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>选择文件...</span>
                        <input id="fileupload" type="file" name="files" multiple="" data-text-control="#uiFileUploadInput">
                    </div>
                    <span class="loading action-doing hide inline-block mt5 ml10"><i class="fa fa-refresh fa-spin"></i>&nbsp;文件上传中...</span>
                    <span class="loading action-done hide inline-block mt5 ml10"><i class="fa fa-check-circle-o"></i>&nbsp;上传成功</span>
                </div>
                <button type="button" class="btn btn-default ml20" data-dismiss="modal">保存</button>
            </div>
        </div>
    </div>
</div>

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
<!-- jquery file upload -->
<script src="<?php echo ASSETS;?>plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo ASSETS;?>plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
<link href="<?php echo ASSETS;?>plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css"/>

<script>
    function upload(){
        $("#imageUploadModal").modal('show');
    }
    file_url = "<?php echo U('admin/member/readExcel');?>";
    function show_img(id_1,id_2){
        $(id_1).fileupload({
            //options
            url: file_url,
            dataType: 'json',
            autoUpload: true,
            maxFileSize: 999000,
            //event
            add: function(e, data) {
                //指定模态框容器
                data.context = $(id_2);
                var autoUpload = $.blueimp.fileupload.prototype.options.autoUpload;
                if (autoUpload) {
                    data.submit();
                    data.context.find(".action-doing").removeClass("hide");
                }
                return true;
            },

            progressall: function(e, data) {
                //进度条
                var progress = parseInt(data.loaded / data.total * 100, 10);
            },

            done: function(e, data) {
                var fileInput = data.fileInput;
                var inputTextId = fileInput.attr("data-text-control");
                var inputText = $(inputTextId);
                var placeHolder = data.context.find(".thumb-place-holder");
                placeHolder.html("");
                $.each(data.result.files, function (index, file) {

                });

                data.context.find(".action-doing").addClass("hide");
                data.context.find(".action-done").removeClass("hide");

            }

        });
    }
    show_img("#fileupload1","#imageUploadModal1");
</script>