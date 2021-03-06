<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link href="<?php echo ASSETS;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo ASSETS;?>/fonts/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo ASSETS;?>/fonts/ionicons-2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo ASSETS;?>/css/AdminLTE.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo ASSETS;?>/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css"/>

    <link href="<?php echo ASSETS;?>/css/custom.css" rel="stylesheet" type="text/css"/>

    <script src="<?php echo ASSETS;?>/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS;?>/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS;?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS;?>/plugins/bootbox.js" type="text/javascript"></script>

    <!-- form validate -->
    <script src="<?php echo ASSETS;?>/plugins/jquery-validate/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS;?>/plugins/jquery-validate/additional-methods.min.js" type="text/javascript"></script>

    <style type="text/css">


        .label_mess {
            width: 100px;
            text-align: right;
            margin-right: 20px;
        }
        .error{
            color: red;
        }


    .login-box, .register-box {

        }
        .text-align {
            text-align: center;
        }

        .login-box-body .btn {
            font-size: 16px;
        }

        #header {
            height: 60px;
            margin: 0 auto !important;
            background: #00a65a none repeat scroll 0 0; /*#19b955 */
            margin: 0 auto !important;
            text-align: center;
            line-height: 60px;
            color: #fff;
        }

        .header_title {
            font-size: 21px;
        }

        .btn-social *:first-child {
            font-size: 14px !important;
        }

        .login-page {
            background: #ededed url("./Public/assets/img/login-bg.png") no-repeat scroll center top;
        }

        .my-tips {
            color: #a8a8a8;
        }

        #verifyImg {
            position: absolute;
            left: 0;
            top: 2px;
        }

        .footer {
            text-align: center;

            border-top: 1px solid #d2d6de;
            color: #444;
            padding: 20px;
        }

        .login-box, .register-box {
            width: 460px;
        }

        .login-box-body {
            padding: 30px;
        }

        .btn-primary {
            background-color: #19b955;
        }

        .form-control-feedback {
            height: 45px !important;
            line-height: 45px !important;
        }

        .bg-image {
            display: block;
            height: 200%;
            left: -50%;
            position: fixed;
            top: -50%;
            width: 200%;
            z-index: -1;
        }

        .bg-image img {
            bottom: 0;
            left: 0;
            margin: auto;
            min-height: 50%;
            min-width: 50%;
            position: absolute;
            right: 0;
            top: 0;
        }
        .{
            position: relative;
            left: -180px; top:30px;
        }
        .style2{
            width:230px;
        }

    </style>
</head>

<body class="login-page" onload="document.forms.loginform.nickname.focus()">


<div class="bg-image">
    <img src="<?php echo ASSETS;?>/img/register-bg.jpg">
</div>


<div id="header">
    <div class="header_title"><i class="fa fa-street-view"></i>用户注册</div>
</div>

<div class="login-box">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary" style="text-align: center;">
                    <div class="box-header with-border">
                        <h3 class="box-title">用户注册</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body ">
                        <form id="loginForm" class="form-horizontal" method="post"  role="form" href="<?php echo U('referee/index');?>">
                            <div class="box-body no-padding" >
                                <?php if($error != ''): ?><div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <i class="icon fa fa-warning"></i> 注册失败:<?php echo ($error); ?>
                                    </div><?php endif; ?>
                                    <div class="form-group ">
                                        <label class="col-md-3 control-label" >姓名</label>
                                        <div class="col-md-8">
                                            <input type="text" name="name"  class="form-control " placeholder="注册姓名">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">身份证</label>
                                        <div class="col-md-8">
                                            <input type="text" name="identity"  class="form-control" placeholder="注册身份证">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3 control-label" >密码</label>
                                        <div class="col-md-8">
                                            <input type="text" name="password"  id="password" class="form-control " placeholder="注册密码">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3 control-label" >确认密码</label>
                                        <div class="col-md-8">
                                            <input type="text" name="next_password"  class="form-control " placeholder="确认密码">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3 control-label">性别</label>
                                        <div class="col-md-8">
                                            <div class="pull-left">
                                                <div class="radio inline-block margin0">
                                                    <label>
                                                        <input checked="" value="male"  name="sex" type="radio">男
                                                    </label>
                                                </div>
                                                <div class="radio inline-block margin0">
                                                    <label>
                                                        <input value="female" name="sex" type="radio">女
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label">民族</label>
                                        <div class="col-md-8">
                                            <input type="text" name="nation"  class="form-control" placeholder="注册民族">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label ">电子邮箱</label>
                                        <div class="col-md-8">
                                            <input type="text" name="email" class="form-control" placeholder="注册邮箱">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">现有职称</label>
                                        <div class="col-md-8">
                                            <select class="form-control w120 inline-block province"  name="titles">
                                                <?php if(is_array($zc)): $i = 0; $__LIST__ = $zc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><option value="<?php echo ($i-1); ?>"><?php echo ($row); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label ">身份证照片</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input  value="" id="uiFileUploadInput1" data-thumb=""  class="form-control" readonly="readonly" placeholder="上传身份证" type="text">
                                                <input type="hidden" name="img">
                                                <div class="input-group-btn">
                                                    <button type="button" onclick="bot()" class="btn btn-success btn-flat"><i class="fa fw fa-plus-circle"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label ">头像</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input  readonly="readonly" value=""  class="form-control" placeholder="上传头像" type="text" id="uiFileUpload" data-thumb="">
                                                <input type="hidden" name="headimg">
                                                <div class="input-group-btn">
                                                    <button type="button" onclick="bot1()" class="btn btn-success btn-flat"><i class="fa fw fa-plus-circle"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            </div>

                        <div class="box-footer text-center">
                            <input type="submit" id="sub" class="btn btn-success" value="注册">
                        </div><!-- /.box-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- 上传图片模态框 -->

<div class="modal fade " id="imageUploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="">上传身份证照片</h4>
            </div>
            <div class="modal-body no-padding maxh500">
                <div class="images-zone tc thumb-place-holder">

                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-left" style="">
                    <div class="btn btn-success fileinput-button pull-left inline-block">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>身份证照片...</span>
                        <input id="fileupload" type="file" name="files" multiple="" data-text-control="#uiFileUploadInput1">
                    </div>
                    <span class="loading action-doing hide inline-block mt5 ml10"><i class="fa fa-refresh fa-spin"></i>&nbsp;图片上传中...</span>
                    <span class="loading action-done hide inline-block mt5 ml10"><i class="fa fa-check-circle-o"></i>&nbsp;上传成功</span>
                </div>
                <button type="button" class="btn btn-default ml20" data-dismiss="modal">保存</button>
            </div>
        </div>
    </div>
</div>

<!-- 上传图片模态框 -->

<div class="modal fade " id="imageUploadModa2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="">上传头像照片</h4>
            </div>
            <div class="modal-body no-padding maxh500">
                <div class="images-zone tc thumb-place-holder">

                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-left" style="">
                    <div class="btn btn-success fileinput-button pull-left inline-block">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>身份证照片...</span>
                        <input id="fileupload1" type="file" name="files" multiple="" data-text-control="#uiFileUpload">
                    </div>
                    <span class="loading action-doing hide inline-block mt5 ml10"><i class="fa fa-refresh fa-spin"></i>&nbsp;头像上传中...</span>
                    <span class="loading action-done hide inline-block mt5 ml10"><i class="fa fa-check-circle-o"></i>&nbsp;上传成功</span>
                </div>
                <button type="button" class="btn btn-default ml20" data-dismiss="modal">保存</button>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo ASSETS;?>plugins/jquery-validate/jquery.validate.min.js"></script>
<script src="<?php echo ASSETS;?>plugins/jquery-validate/localization/messages_zh.min.js"></script>
<script src="<?php echo ASSETS;?>plugins/jquery-validate/additional-methods.min.js" type="text/javascript"></script>
<!-- jquery file upload -->
<script src="<?php echo ASSETS;?>plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo ASSETS;?>plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
<link href="<?php echo ASSETS;?>plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css"/>
</body>
<script type="text/javascript">
    function bot() {
        $("#imageUploadModal").modal('show');
    }
    function bot1(){
        $("#imageUploadModa2").modal('show');
    }
    file_url = "<?php echo U('zhuce/referee/jqueryFileUpload');?>";
    function show_img(id_1,id_2,te){
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
                        $("input[name="+te+"]").val(file.thumbnailUrl);
                    }
                });

                data.context.find(".action-doing").addClass("hide");
                data.context.find(".action-done").removeClass("hide");

            }

        });
    }
    show_img("#fileupload","#imageUploadModal","img");
    show_img("#fileupload1","#imageUploadModa2","headimg");

    // 身份证号码验证
    jQuery.validator.addMethod("isIDCard", function(value, element) {
        var reg = /(^\d{15}$)|(^\d{17}([0-9]|X)$)/;
        return this.optional(element) || (reg.test(value));
    }, "* 请填写正确格式身份证号码");

    $("#sub").click(function (){
        <!--验证不能为空-->
        $("#loginForm").validate({
            rules: {
                name: {
                    required: true,
                    rangelength:[2,4]
                },
                identity: {
                    required: true,
                    isIDCard: true
                },
                password: {
                    required: true,
                    rangelength:[6,18]
                },
                next_password: {
                    required: true,
                    rangelength:[6,18],
                    equalTo: "#password"
                },
                nation: {
                    required: true,
                },
                img :{
                    required: true,
                },
                level: "required",
                sex: "required",
                email: "required",
                educational: "required",
                fee_status : "required"

            },

            messages: {
                name: {
                    required: "* 姓名不能为空",
                    rangelength: "* 姓名长度必需在2-4个字符之间"
                },
                identity: {
                    required: "* 身份证号码不能为空",
                    isIDCard: "* 身份证号码格式不正确"
                },
                password: {
                    required: "* 密码不能为空",
                    rangelength: "* 密码长度必需在6-18个字符之间"
                },
                next_password: {
                    required: "* 密码不能为空",
                    rangelength: "* 密码长度必需在6-18个字符之间",
                    equalTo: "* 两次密码输入不一致"
                },
                nation:{
                    required: "* 民族不能为空",

                },
                img :{
                    required: "* 身份证照片不能为空",
                },
                level:  "用户等级不能为空",
                sex: "* 性别不能为空",
                email: "* 邮箱不能为空",
                educational: "* 性别不能为空",
                fee_status : "* 缴费状态不能为空"
            }
        });
        return true;
    });


</script>
</html>