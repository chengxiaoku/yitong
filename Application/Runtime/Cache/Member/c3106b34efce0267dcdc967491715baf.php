<?php if (!defined('THINK_PATH')) exit();?><HTML>
<META HTTP-EQUIV='pragma' CONTENT='no-cache'>

<!-- Bootstrap 3.3.4 -->

<HEAD><TITLE>考试试卷</TITLE>
    <META content='Microsoft FrontPage 6.0' name=GENERATOR>
    <META content=FrontPage.Editor.Document name=ProgId>
    <META content='text/html; charset=utf-8' http-equiv=Content-Type>
    <STYLE type=text/css>BODY {
        FONT-FAMILY: '宋体';
        FONT-SIZE: 12pt;
    }

    TD {
        FONT-SIZE: 12pt;
        padding-top: 10pt;
    }

    .btn-lg {
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.3333333;
        border-radius: 6px;
    }

    .btn-success {
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
    }

    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 30px;
        font-weight: 400;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    </STYLE>
</HEAD>
<BODY topmargin='10' leftmargin='0'>
<center>
    <TABLE width='978' height='400' border=0 align='center' cellPadding=0 cellSpacing=0>

        <form action="<?php echo U('exam/test');?>" method="post">
            <tr>
                <td align='right' width=10 height=50 valign='middle'></td>
                <td align='center' width=970 height='50' valign='middle' bgcolor='#FFFFFF'>
                    <font style='font-family: 黑体; font-size: 24pt; LINE-HEIGHT: 50pt'>
                        考试试卷
                    </font> <br><br>
                </td>
            </tr>
            <tr>
                <td align='center' width=5 height='100%' valign='top'></td>
                <td align='center' width=970 height='100%' valign='top' bgcolor='#FFFFFF'>
                    <table width='100%' align='center' bgcolor='#AAEEEE' border='1' cellpadding='2' cellspacing='1'
                           bordercolorlight='#CECECE' bordercolordark='#F0F0F0' valign='top'>
                        <tr bgcolor='#FAF0FA' align=left>
                            <td colspan='2' height=30 valign=middle>
                                <font color=black style='font-size:14pt;line-height:20pt;'>
                                    <b>一、单项选择题</b>(本题总分50.0分,本大题包括25小题,每题2分,总计50.0分)
                                </font>
                            </td>
                        </tr>
                        <tr bgcolor='#FAFBF0'>
                            <td colspan='2'></td>
                        </tr>
                        <div class="dx">
                            <?php if(is_array($data['Single Choice'])): $i = 0; $__LIST__ = $data['Single Choice'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
                                    <td width='40' valign='middle'><?php echo ($i); ?>、</td>
                                    <td width='820' bgcolor=#FFFFFF valign='top'>
                                        <?php echo ($row['title']); ?><br>
                                        <pre><?php foreach($row['body'] as $key=>$val){ ?> <?php echo $key.'、'.$val.'<br/>' ; } ;?></pre>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        A<input type="radio" name="<?php echo ($i); ?>1" value="A">
                                        B<input type="radio" name="<?php echo ($i); ?>1" value="B">
                                        C<input type="radio" name="<?php echo ($i); ?>1" value="C">
                                        D<input type="radio" name="<?php echo ($i); ?>1" value="D">
                                    </td>
                                </tr>
                                <tr bgcolor='#E0E0F0'>
                                    <td colspan='2' height=10></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <tr bgcolor='#FAF0FA' align=left>
                            <td colspan='2' height=30 valign=middle>
                                <font color=black style='font-size = 14pt;line-height = 20pt;'>
                                    <b>二、判断题</b>(本题总分20.0分,本大题包括10小题,每题2分,总计20.0分)
                                </font>
                            </td>
                        </tr>
                        <tr bgcolor='#FAFBF0'>
                            <td colspan='2'></td>
                        </tr>

                        <?php if(is_array($data['true-false'])): $i = 0; $__LIST__ = $data['true-false'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
                                <td width='40' valign='middle'><?php echo ($i); ?>、</td>
                                <td width='820' bgcolor=#FFFFFF valign='top'><?php echo ($row['title']); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    对<input type="radio" name="<?php echo ($i); ?>2" value="对">
                                    错<input type="radio" name="<?php echo ($i); ?>2" value="错">
                                </td>
                            </tr>
                            <tr bgcolor='#E0E0F0'>
                                <td colspan='2' height=10></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                        <tr bgcolor='#FAF0FA' align=left>
                            <td colspan='2' height=30 valign=middle>
                                <font color=black style='font-size:14pt;line-height:20pt;'>
                                    <b>三、多项选择题</b>(本题总分30.0分,本大题包括10小题,每题3分,总计30.0分)
                                </font>
                            </td>
                        </tr>
                        <tr bgcolor='#FAFBF0'>
                            <td colspan='2'></td>
                        </tr>

                        <?php if(is_array($data['multiple choice'])): $i = 0; $__LIST__ = $data['multiple choice'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
                                <td width='40' valign='middle'><?php echo ($i); ?>、</td>
                                <td width='820' bgcolor=#FFFFFF valign='top'><?php echo ($row['title']); ?><br>
                                    <pre><?php foreach($row['body'] as $key=>$val){ ?> <?php echo $key.'、'.$val.'<br/>' ; } ;?></pre>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    A<input type="checkbox" name="<?php echo ($i); ?>3[]" value="A">
                                    B<input type="checkbox" name="<?php echo ($i); ?>3[]" value="B">
                                    C<input type="checkbox" name="<?php echo ($i); ?>3[]" value="C">
                                    D<input type="checkbox" name="<?php echo ($i); ?>3[]" value="D">
                                    E<input type="checkbox" name="<?php echo ($i); ?>3[]" value="E">
                                </td>
                            </tr>
                            <tr bgcolor='#E0E0F0'>
                                <td colspan='2' height=10></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    </table>
                    <button style="width:200px; height:50px;" class="btn btn-success btn-lg" onclick="return toget()">
                        提交
                    </button>
        </form>
        <script src="<?php echo ASSETS;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script type="text/javascript">
            function toget() {
                return confirm("是否确定提交试卷?");
            }
        </script>
    </TABLE>
</center>
</BODY>
</HTML>