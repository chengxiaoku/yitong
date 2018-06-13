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
<style type="text/css">
    .error{
        color: red;
    }

</style>
<div class="content-wrapper">
    <!--引入表单验证-->
    <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
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
                    <!-- form start -->
                    <form role="form" action="<?php echo U('admin/add_sql');?>" method="post" id="Myform">

                        <div class="box-body padding20">
                            <div class="form-group ">
                                <!-- has-error-->
                                <label for="">用户名<span class="required">*</span></label>
                                <div>
                                    <input type="text" name="user" placeholder="输入用户名称" id="" class="form-control wp50 inline-block">
                                    <!--<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> 用户名不能为空</label>-->
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="">密码<span class="required">*</span></label>
                                <div>
                                    <input type="password" name="paw"  placeholder="输入密码" id="paw" class="form-control wp50" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">确认密码<span class="required">*</span></label>
                                <input type="password"  name="paw1" placeholder="输入确认密码"  class="form-control wp50" >
                            </div>

                            <div class="form-group">
                                <label for="">真实姓名<span class="required">*</span></label>
                                <input type="text" placeholder="输入姓名" name="name" class="form-control wp50" >
                            </div>
                            <div class="form-group">
                                <label class="">上传头像：</label>
                                <div class="input-group" style="">
                                    <input type="text" disabled="disabled" placeholder="上传头像 ..." style="width: 320px;"  class="form-control wp50" id="uiFileUploadInput3_3" data-thumb="">
                                    <input type="hidden" name="img">
                                    <button onclick="upload3_3()" style="" type="button" class="btn btn-success btn-flat"><i class="fa fw fa-plus-circle"></i></button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">所属角色</label>
                                <select class="form-control wp50" name="role"  title="Please select something!" required>
                                    <?php foreach($data as $val) :?>
                                    <option value="<?php echo $val['id']?>"><?php echo $val['name']?></option>
                                    <?php  endforeach;?>
                                </select>
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer p20 ">
                            <button class="btn btn-primary w100" type="submit" id="ok">保存</button>
                            <a onclick="history.go('-1')" class="btn btn-info w100 ml20" type="submit">返回</a>
                        </div>
                    </form>
                </div><!-- /.box -->

            </div>

        </div>



    </section><!-- /.content -->
    <!-- jquery file upload -->
    <script src="<?php echo ASSETS;?>plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS;?>plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
    <link href="<?php echo ASSETS;?>plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css"/>

    <!-- 上传图片模态框添加相册 -->
    <div class="modal fade " id="imageUploadModal3_3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="">上传图片</h4>
                </div>
                <div class="modal-body no-padding maxh500">
                    <div class="images-zone tc thumb-place-holder">

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="pull-left" style="">
                        <div class="btn btn-success fileinput-button pull-left inline-block">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>添加图片...</span>
                            <input id="fileupload3_3" type="file" name="files[]" multiple="" data-text-control="#uiFileUploadInput3_3">
                        </div>
                        <span class="loading action-doing hide inline-block mt5 ml10"><i class="fa fa-refresh fa-spin"></i>&nbsp;文件上传中...</span>
                        <span class="loading action-done hide inline-block mt5 ml10"><i class="fa fa-check-circle-o"></i>&nbsp;上传成功</span>
                    </div>
                    <button type="button" class="btn btn-default ml20" data-dismiss="modal">保存</button>
                </div>
            </div>
        </div>
    </div>

    <!-- /.content  -->
</div>
<script type="text/javascript">
    function deleteData() {
        if (confirm("确认要删除该条数据？")) {
            return true;
        } else {
            return false;
        }
    }

    $('#Myform').validate({
        rules: {
            user: {
                required: true,
                rangelength:[3,7],
            },
            paw:{
                required: true,
                rangelength:[5,10],
            },
            paw1:{
                required: true,
                equalTo:"#paw"
            },
            name:{
                required: true,
                rangelength:[2,7],
            }
        },
        messages: {
            user:{
                required:'用户名不能为空!',
                rangelength:'用户名在3~7个字符之间',
            },
            paw:{
                required:'密码不能为空',
                rangelength:'密码的字符应在5~10之间',
            },
            paw1:{
                required: '密码不能为空',
                equalTo:"两次密码应该相同!",
            },
            name:{
                required:'真实姓名不能为空!',
                rangelength:'真实姓名个数应该在2~7之间！',
            }
        },
        focusInvalid:true,
    });
    function upload3_3() {
        $("#uiFileUploadInput3_3").val("");
        $("#imageUploadModal3_3").find(".thumb-place-holder").html("");
        $('#imageUploadModal3_3').modal({});
    }

    var file_url = "<?php echo U('admin/jqueryFileUpload');?>";
    //上传图片
    function show_img(id_1,id_2){
        $(id_1).fileupload({
            //options
            url: file_url,
            dataType: 'json',
            autoUpload: true,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
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
                    if (file.thumbnailUrl) {

                        $("<img>").attr("src", file.thumbnailUrl).appendTo(placeHolder);
                        inputText.val(file.url);
                        inputText.attr("data-thumb", file.thumbnailUrl);
                        $("input[name=img]").val(file.thumbnailUrl);
                    }
                });

                data.context.find(".action-doing").addClass("hide");
                data.context.find(".action-done").removeClass("hide");

            }

        });
    }
    show_img("#fileupload3_3","#imageUploadModal3_3");

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