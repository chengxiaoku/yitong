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

    <style>
        .le{margin-top: 30px;}
    </style>
    <!-- 日期-->
    <script src="<?php echo ASSETS;?>plugins/bootbox.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS;?>plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS;?>plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js" charset="UTF-8"></script>
    <link href="<?php echo ASSETS;?>plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- jquery file upload -->
    <script src="<?php echo ASSETS;?>plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS;?>plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
    <link href="<?php echo ASSETS;?>plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css" />

    <form id="form" name="" class="form-horizontal" method="post" action="<?php echo U('index/safe');?>" role="form">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">个人信息维护及查询</h3>
                        <div class="box-tools pull-right">
                            <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body ">
                        <input type="hidden" name="id" value="<?php echo ($user_data["id"]); ?>">
                        <div class="text-center">
                            <p> <span>您可以根要求填写个人的基本信息</span><br/>
                            <span>包括姓名，性别，身份证，照片，联系方式 ，电子邮箱等必填和选填项，在报名，复查前所有                                           信息<a>必须补充完整并经审核通过</a>
                                       </span>
                            </p>
                        </div>
                        <div class="le">
                            <h4>基本信息</h4>
                            <div class="box-body no-padding" >

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">姓名</label>
                                        <div class="col-md-2">
                                            <input type="text" id="xm" disabled="true" name="xm" value="<?php echo ($user_name); ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">身份证</label>
                                        <div class="col-md-2">
                                            <input type="text" id="ip" disabled="true" name="ip" value="<?php echo ($user_data['identity']); ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">报考专业</label>
                                        <div class="col-md-2">
                                            <input type="text" id="zy" disabled="true" name="zy" value="<?php echo ($user_data['zy_name']); ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">等级</label>
                                        <div class="col-md-1">

                                            <select disabled="true" id="dj" class="form-control w100 inline-block province"  name="dj">
                                                <option value=""><?php echo ($level); ?></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">性别：</label>
                                        <div class="col-md-2" id="sex">
                                            <select disabled="true" class="form-control w100 inline-block province"  name="sex">
                                                <?php if($user_data['sex'] == 'male'): ?><option value="">男 </option><?php else: ?><option value="">女</option><?php endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">民族</label>
                                        <div class="col-md-2">
                                            <input type="text" id="nation" name="nation" value="<?php echo ($user_data['nation']); ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">电子邮箱</label>
                                        <div class="col-md-2">
                                            <input type="text" id="email" name="email" value="<?php echo ($user_data['email']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">现有职称</label>
                                        <div class="col-md-2" id="zhicheng">
                                            <select class="form-control w120 inline-block province"  name="zhicheng">
                                                <?php foreach($zhicheng as $key =>$val){?>

                                                <option id="<?php echo $key ?>" value="<?php echo $key ?>"><?php echo $val ?></option>

                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">个人信息</h3>
                                        <div class="box-tools pull-right">
                                            <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="box-body no-padding" >
                                            <form id="val" class="form-horizontal" method="post" action="<?php echo U('index/index');?>" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">手机号</label>
                                                    <div class="col-md-2">
                                                        <input type="text" id="phone" name="phone" value="<?php echo ($user_data['phone']); ?>" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">第一学历</label>
                                                    <div class="col-md-2" id="educational">
                                                        <select class="form-control w100 inline-block province"  name="educational">

                                                            <?php foreach($educational as $key =>$val){?>

                                                            <option id="<?php echo $key ?>a" value="<?php echo $key ?>"><?php echo $val ?></option>

                                                            <?php }?>

                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">毕业院校</label>
                                                    <div class="col-md-2">
                                                        <input type="text" id="school" name="school" value="<?php echo ($user_data['school']); ?>" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">所学专业</label>
                                                    <div class="col-md-1">
                                                        <input type="text" id="profession" name="profession" value="<?php echo ($user_data['profession']); ?>" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">毕业时间</label>
                                                    <div class="col-md-2" >
                                                        <input type="text" name="graduation_date" id="begin-time" value="<?php echo ($user_data['graduation_date']); ?>" class="form-control inline-block province" onclick="return selectDate(this, 'begin-time')">
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">行政职业</label>
                                                    <div class="col-md-2">
                                                        <input type="text" id="duty" name="duty" value="<?php echo ($user_data['duty']); ?>" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label  class="col-md-2 control-label">上传图片</label>
                                                    <div class="input-group" style="position: relative; left: 15px;">
                                                        <input type="text" readonly="readonly" name="thumb" style="width: 150px;"  class="form-control" id="uiFileUploadInput1" data-thumb="" value="<?php echo ($user_data['thumb']); ?>">
                                                       
                                                        <button onclick="upload1()" type="button" class="btn btn-success btn-flat"><i class="fa fw fa-plus-circle"></i></button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer text-center">
                            <button type="submit" id="bc" class="btn btn-success pull-left">保存</button>
                        </div><!-- /.box-footer -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>
</div>
<!-- 上传图片模态框 基本信息 -->
<div class="modal fade " id="imageUploadModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input id="fileupload1" type="file" name="files" multiple="" data-text-control="#uiFileUploadInput1">
                    </div>
                    <span class="loading action-doing hide inline-block mt5 ml10"><i class="fa fa-refresh fa-spin"></i>&nbsp;文件上传中...</span>
                    <span class="loading action-done hide inline-block mt5 ml10"><i class="fa fa-check-circle-o"></i>&nbsp;上传成功</span>
                </div>
                <button type="button" class="btn btn-default ml20" data-dismiss="modal">保存</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

   $(document).ready(function () {
        var a=<?php echo ($a); ?>;
        $("#"+a).attr('selected','selected');
        var a=<?php echo ($b); ?>;
        $("#"+a+'a').attr('selected','selected')
    });

    function upload1() {
        $('#imageUploadModal1').modal({});
    }
    //选择日期
    function selectDate(o, id) {
        var _id = '#' + id;
        $(_id).datepicker({
            format: 'yyyy-mm-dd',
            language: 'zh-CN'
        }).on("changeDate", function(e) {
            var me = e.target;
            $(this).datepicker('hide');
        });

        $(_id).datepicker('show');
    }
    var file_url = "<?php echo U('member/index/jqueryFileUpload');?>";


    function show_img(id_1,id_2) {
        $(id_1).fileupload({
            //options
            url: file_url,
            dataType: 'json',
            autoUpload: true,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            maxFileSize: 999000,
            //event
            add: function (e, data) {
                //指定模态框容器
                data.context = $(id_2);
                var autoUpload = $.blueimp.fileupload.prototype.options.autoUpload;
                if (autoUpload) {
                    data.submit();
                    data.context.find(".action-doing").removeClass("hide");
                }
                return true;
            },

            progressall: function (e, data) {
                //进度条
                var progress = parseInt(data.loaded / data.total * 100, 10);
            },

            done: function (e, data) {
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
                    }
                });

                data.context.find(".action-doing").addClass("hide");
                data.context.find(".action-done").removeClass("hide");

            }

        });
    };
    show_img("#fileupload1","#imageUploadModal1");

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