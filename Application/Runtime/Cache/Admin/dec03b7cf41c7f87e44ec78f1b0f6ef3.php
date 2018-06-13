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
        <!--表格-->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <form role="form" id="loginForm" action="<?php echo U('member/index');?>" method="post">
                            <a class="btn btn-primary" href="<?php echo U('member/add');?>">添加会员</a>
                            <button type="button" class="btn btn-danger" id="delall">批量删除</button>
                            <a class="btn btn-info" href="<?php echo U('member/doexcel');?>" >批量导入数据(Excel)</a>
                            <a class="btn btn-success" href="<?php echo U('member/excel');?>" >批量导出数据(Excel)</a>
                            <a class="btn btn-primary" href="<?php echo U('member/index');?>">返回</a>
                            <div class="select pull-right">
                                <div style="width:250px; margin-left: 5px;" class="input-group fr">
                                    <input type="text" id="ss" placeholder="请输入姓名..." class="form-control" name="find">
                                    <div  class="input-group-btn"><button type="button" id="sou" class="btn btn-default"><i class="fa fa-search"></i></button></div>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th width="10%" class="tc">
                                    <input type="checkbox" id="all">
                                </th>
                                <th width="10%">姓名</th>
                                <th width="14%">身份证</th>
                                <th width="12%">手机号码</th>
                                <th width="10%">性别</th>
                                <th width="10%">报考级别</th>
                                <th width="12%">专业</th>
                                <th width="10%">已学学时</th>
                                <th width="12%">管理</th>
                            </tr>

                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--获取详细内容-->
                                <tr>
                                    <th class="tc">
                                        <input class="xuan" type="checkbox" name="chk" value="<?php echo ($vo['id']); ?>">   <!--选项框-->
                                    </th>
                                    <td><?php echo ($vo["name"]); ?></td>          <!--姓名-->
                                    <td><?php echo ($vo["identity"]); ?></td>      <!--身份证-->
                                    <td><?php echo ($vo["phone"]); ?></td>         <!--手机号码-->
                                    <td>
                                        <?php if($vo['sex'] == 'male'): ?>男
                                            <?php else: ?>女<?php endif; ?>
                                    </td>           <!--性别-->
                                    <td>
                                        <?php if($vo['level'] == 0): ?>初级
                                            <?php elseif($vo['level'] == 1): ?>
                                            中级
                                            <?php elseif($vo['level'] == 2): ?>
                                            高级<?php endif; ?>
                                    </td>                <!--报考级别-->
                                    <td>
                                        <?php echo ($arr[$i-1]); ?>      <!--专业-->
                                    </td>
                                    <td><?php echo ($vo["hour"]); ?></td>  <!--已学学时-->
                                    <td>
                                        <a class="btn btn-default btn-xs" href="<?php echo U('member/update');?>&id=<?php echo ($vo["id"]); ?>">修改</a>
                                        <a class="btn btn-default btn-xs" onclick="return del1(this,'<?php echo ($vo["id"]); ?>')">删除</a>
                                        <a class="btn btn-default btn-xs" onclick="return notice(this,'<?php echo ($vo["id"]); ?>')">通知</a>
                                        <a class="btn btn-default btn-xs" href="<?php echo U('member/detail');?>&id=<?php echo ($vo["id"]); ?>">详情</a>
                                        <a class="btn btn-default btn-xs" onclick="return edit(this,'<?php echo ($vo["id"]); ?>')">修改成绩和学时</a>
                                    </td>                 <!--管理-->
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->

                    <!--翻页-->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-5"></div>
                            <div class="col-sm-7 text-right">
                                <div class="result page"><?php echo ($fenye); ?></div>
                            </div>
                        </div>
                    </div>

                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
    <!-- /.content-wrapper -->

    <!--删除操作模态框-->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title"> 提示 </h4>
                </div>
                <div class="modal-body">
                    <span class='glyphicon glyphicon-question-sign text-red' style='font-size: 18px;'></span>
                    <span style='font-size: 18px;' class="ml10 text-red">确认要删除这条数据？</span>
                </div>
                <div class="modal-footer">
                    <button type="button" id="button1" class="btn btn-primary" data-dismiss="modal">确认</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"> 取消</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!--批量删除删除操作模态框-->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title"> 提示 </h4>
                </div>
                <div class="modal-body">
                    <span class='glyphicon glyphicon-question-sign text-red' style='font-size: 18px;'></span>
                    <span id="myModalbody"><span style='font-size: 18px;' class="ml10 text-red">确认要删除这条数据？</span></span>
                </div>
                <div class="modal-footer">
                    <button type="button" id="button4" class="btn btn-primary" data-dismiss="modal">确认</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"> 取消</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!--通知操作模态框-->
    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title"> 通知 </h4>
                </div>
                <div class="modal-body">
                    <label> 通知标题：</label>
                    <input id="bt">
                </div>
                <div class="modal-body">
                    <label class="label_mess" style="position: relative;top: -130px;"> 通知内容：</label>
                    <textarea style="width: 400px; height: 150px;" name="notice" id="notice"></textarea>
                </div>
                <div id="tbody" class="modal-footer">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div><!-- /.content-wrapper -->

<!--修改成绩和学时模态框-->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo U('member/save_sql');?>" method="post" name="form" id="loginForm_edit">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">修改成绩和学时</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hid" name="id">
                    <div class="form-group">
                        <label class="label_mess"> 修改成绩：</label>
                        <input type="text" placeholder="输入成绩 ..." name="grade" required id="grade"
                               class="form-control w100 inline-block">
                        <p id="ppp"></p>
                    </div>
                    <div class="form-group">
                        <label class="label_mess"> 修改学时：</label>
                        <input type="text" placeholder="输入学时 ..." name="hour" required id="hour"
                               class="form-control w100 inline-block">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" id="button3" class="btn btn-primary" data-dismiss="modal" onclick="return login()" value="确认"/>
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="取消"/>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

    function checked() {
        $('#Model2').modal('show');
    }
    id = 0;
    //删除数据
    function del1(a, b) {
        $("#data_sum").text('确认删除这条数据？');
        $('#myModal1').modal('show');
        id = b;
        return false;
    }
    //批量删除数据
    $("#delall").click(function () {
        var del_str = '';
        var len = $('input[name=chk]:checked').length;

        if (len >= 1) {
            $('input[name=chk]:checked').each(function () {
                //$(this).val();
                del_str += ',' + $(this).val();
            });
            del_str = del_str.substring(1);
            id = del_str;
            $("#myModalbody span").text("确认删除这" + len + '条数据？');
        } else {
            $("#myModalbody span").text('没有选择数据！！');

        }

        $('#myModal2').modal('show');

    });

    $('#button1').click(function () {
        location.href = "admin.php?m=admin&c=member&a=del&id=" + id;
    });
    $('#button4').click(function () {
        location.href = "admin.php?m=admin&c=member&a=del&id=" + id;
    });

    //通知
    function notice(a,b) {
        $('#myModal5').modal('show');

        var tbody='';
        tbody+='<button type="button" onclick="return tz('+b+')" id="button2" class="btn btn-primary" data-dismiss="modal">确认</button> ' +
                '<button type="button" class="btn btn-default" data-dismiss="modal"> 取消</button>';
        $("#tbody").html(tbody);
        return false;
    }
    function tz(a) {
        var bt=$("#bt").val();
        var nr=$("#notice").val();
        var url="<?php echo U('member/tz');?>&id=" + id+"&bt="+bt+"&nr="+nr;
        $.getJSON(url,function (json){
                    alert(json);
                }
        )

    }



    //修改成绩和学时
    user_id = 0;
    function edit(a,b) {
        user_id = b;
        $.post("<?php echo U('member/save');?>",{id:b},function (data){
            str = $.parseJSON(data);
            $("#grade").val(str[1]);
            $("#hour").val(str[0]);
        });
        $('#myModal3').modal('show');
        return false;
    }
    $('#button3').click(function () {

        $('#myModal3').modal('hide');
        $("#hid").val(user_id);
        form.submit();
        //缺少输入验证
    });

    //搜索
    $(function () {
        $("#sou").click(function () {

            var keyword = $('#ss').val();
            if (keyword) {

                location.href = "admin.php?m=admin&c=member&a=sel&keyword=" + keyword;
            } else {
                alert('输入内容为空');
                return false;
            }


        });
    });



    $(document).ready(
            function () {
                $('#all').click(
                        function () {
                            if($('#all').is(':checked')){
                                $(".xuan").prop("checked",'true');
                            }else{
                                $(".xuan").prop("checked",'');
                            }
                        }

                )
            }
    )
    /**
     *
     */
    $("input[name=chk]").click(function (){
        var ln = $("input[name=chk]:checked").length;
        if(ln == $("input[name=chk]").length){
            $("#all").prop("checked",true);
        }else{
            $("#all").prop("checked",false);
        }
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