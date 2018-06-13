<?php if (!defined('THINK_PATH')) exit();?><SCRIPT LANGUAGE='javascript'>
    <!--
    var currentX = currentY = 0;
    var lastScrollY = 0;
    var action;
    var timeID = 0;
    var tt1 = 5400;
    tt2 = 0;
    tt3 = 0;
    self.onError = null;
    self.moveTo(0, 0);
    self.resizeTo(screen.width + 2, screen.height);
    if (window.Event)
        document.captureEvents(Event.MOUSEUP);
    function send_request(obj) {
        var hh = Math.random();
        var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        try {
            xmlhttp.open("GET", obj + "?h=" + hh, false);
            xmlhttp.setRequestHeader("If-Modified-Since", "0");
            xmlhttp.send(null);
            if (xmlhttp.responseText != hh) {
                window.alert('无法连接服务器!');
                window.location.reload();
                return false;
            }
        }
        catch (e) {
            window.alert('无法连接服务器!');
            window.location.reload();
            return false;
        }
    }


    function nocontextmenu() {
        event.cancelBubble = true
        event.returnValue = false;
        return false;
    }


    function norightclick(e) {
        if (window.Event) {
            if (e.which == 2 || e.which == 3)
                return false;
        }
        else if (event.button == 2 || event.button == 3) {
            event.cancelBubble = true
            event.returnValue = false;
            return false;
        }
    }



    document.oncontextmenu = nocontextmenu;  // for IE5+
    document.onmousedown = norightclick;  // for all others


    function startTimer() {
        timeID = setInterval('syTimer()', 1000);
    }



    function submitmess(flag) {
        if (document.sftckc.jsbs.value == '999999' || flag == 1) {
            messend.style.height = document.body.scrollHeight;
            messend.style.visibility = 'visible';
            clearInterval(timeID);
            floater0.style.visibility = 'hidden';
            floater1.style.visibility = 'hidden';
            if ('999999' != '999999') {
                tjxzwj1.location = 'dzsj.asp?flag=0&kskh=999999';
                showmess('试卷已交，请考生离开考场！！！');
            } else
                showmess('试卷已交，点击查看答卷情况！！！');
        } else
            showmess('考号输入不正确，无法交卷!!!');
    }


    function syTimer() {
        var i, messxx0;
        tt1--;
        if (tt1 < 0) tt1 = 0;
        tt2 = tt1 % 60;
        tt3 = (tt1 - tt2) / 60;
        mytime1.innerHTML = '倒计时: <font color=yellow>' + tt3 + '分' + tt2 + '秒</font>';
        window.status = '倒计时: ' + tt3 + '分' + tt2 + '秒';
        if (tt1 <= 0) {
            submitmess(1);
        }
        else if (tt1 % 99 == 0)//查询网络是否通
            send_request("h.asp");
        else if (tt1 == 300) {
            messxx0 = '<b>还有5分钟</b><br><br>';
            showmess(messxx0 + '<br>请抓紧时间提交!');
        }
        else if (tt1 == 60) {
            messxx0 = '<b>还有1分钟</b><br><br>';
            showmess(messxx0 + '<br>请抓紧时间提交!');
        }
    }

    function bye1() {
        if (tt1 > 5340)showmess("<b>考试开始1分钟后才允许交卷!!!</b>"); else showmess("<b>交卷后将无法再进入考试，<br>是否确认?</b>");
    }
    function checksignup(i, j, stxh, n, ext) {
        var str, strs, lens, extname;
        str = window.frames[n].document.f1.file1.value;
        if (str == '') {
            showmess('内容不能为空,请检查后再确认!!');
            window.frames[n].document.f1.file1.focus();
        }
        else {
            strs = str.toLowerCase();
            lens = strs.length;
            extname = strs.substring(lens - 3, lens);
            if (extname != ext) {
                showmess('请按照试题要求上传后缀名为(' + ext + ')的文件!');
                window.frames[n].document.f1.file1.focus();
            }
            else {
                showmess('上传文件时间可能较长，请耐心等待!');
                if ('999999' != '999999')
                    window.frames[n].document.f1.action = '../kcqt/savewj1.asp?r0=' + stxh;
                else
                    window.frames[n].document.f1.action = '../kcqt/savewj1.asp?r0=0';
                window.frames[n].document.f1.submit();
                if (j == 6) {
                    window.formst6.elements[(i - 1) * 3 + 2].disabled = false;
                    window.formst6.elements[(i - 1) * 3].value = '已提交';
                }
                else if (j == 7) {
                    window.formst7.elements[(i - 1) * 3 + 2].disabled = false;
                    window.formst7.elements[(i - 1) * 3].value = '已提交';
                }
                else {
                    window.formst8.elements[(i - 1) * 3 + 2].disabled = false;
                    window.formst8.elements[(i - 1) * 3].value = '已提交';
                }
            }
        }
    }
    function heartBeat() {
        var percent, diffY;
        diffY = document.body.scrollTop;
        if (diffY != lastScrollY) {
            percent = .1 * (diffY - lastScrollY);
            if (percent > 0)
                percent = Math.ceil(percent);
            else
                percent = Math.floor(percent);
            floater0.style.pixelTop = floater0.style.pixelTop + percent;
            if (mess0.style.visibility == 'visible')  mess0.style.pixelTop = floater0.style.pixelTop + 100;
            if (floater1.style.visibility == 'visible')  floater1.style.pixelTop = floater0.style.pixelTop + 35;
            lastScrollY = lastScrollY + percent;
        }
    }
    function showzp() {
        if (floater1.style.visibility == 'visible') {
            document.formzp.buttonzp.value = '显示照片';
            floater1.style.visibility = 'hidden';
        }
        else {
            document.formzp.buttonzp.value = '隐藏照片';
            floater1.style.pixelTop = floater0.style.pixelTop + 35;
            floater1.style.visibility = 'visible';
        }
    }
    function closemess() {
        mess0.style.visibility = 'hidden';
        mess3.style.visibility = 'hidden';
        mess2.style.visibility = 'hidden';
    }
    function closeks() {
        var ua = navigator.userAgent;
        var ie = navigator.appName == 'Microsoft Internet Explorer' ? true : false;
        if (ie) {
            var IEversion = parseFloat(ua.substring(ua.indexOf('MSIE ') + 5, ua.indexOf(';', ua.indexOf('MSIE '))));
            if (IEversion < 5.5) {
                var str = "<object id=noTipClose classid='clsid:ADB880A6-D8FF-11CF-9377-00AA003B7A11'>";
                str += "<param name='Command' value='Close'></object>";
                document.body.insertAdjacentHTML('beforeEnd', str);
                document.all.noTipClose.Click();
            }
            else {
                window.opener = null;
                window.close();
            }
        }
        else {
            window.close();
        }
    }
    function showmess(str1) {
        mess1.innerHTML = str1;
        mess0.style.left = (screen.width - 230) / 2;
        mess0.style.pixelTop = floater0.style.pixelTop + 100;
        if (str1 == '<b>交卷后将无法再进入考试，<br>是否确认?</b>') {
            document.sftckc.jsbs.value = '';
            mess3.style.visibility = 'visible';
            mess2.style.visibility = 'hidden';
        } else {
            mess3.style.visibility = 'hidden';
            mess2.style.visibility = 'visible';
            if (str1 == '试卷已交，请考生离开考场！！！')
                mess2.innerHTML = "<input style='CURSOR:Hand' type=button value='关闭考试系统' onclick='closeks();'>";
            else if (str1 == '试卷已交，点击查看答卷情况！！！')
                mess2.innerHTML = "<input style='CURSOR:Hand' type=button value='查看答卷情况' onclick='showsj();'>";
            else
                mess2.innerHTML = "<input style='CURSOR:Hand' type=button value='点击此处返回' onclick='closemess()'>";
        }
        mess0.style.visibility = 'visible';
    }
    function downfile1(i, j, stxh, ext) {
        if ('999999' != '999999')
            window.open('../kczy/savezhzy1.asp?r1=2&u1=' + stxh + '&u2=' + j + '&u3=' + i + '&flagext=' + ext);
        else
            showmess('模拟考场不提供此功能！');
    }
    function tjxzst(m, stxh) {
        if ('999999' != '999999')
            tjxzwj1.location = 'dzsj.asp?flag=1&stxh=' + stxh + '&stda=' + m;
    }
    function tjdxst(m, stxh) {
        var stda, i;
        stda = '';
        for (i = 0; i < 5; i++) {
            if (document.formst3.elements[(m - 1) * 5 + i].checked)
                stda = stda + '1';
            else
                stda = stda + '0';
        }
        if ('999999' != '999999')
            tjxzwj1.location = 'dzsj.asp?flag=3&stxh=' + stxh + '&stda=' + stda;
    }
    function tjtkst(stxh, m) {
        if (document.formst4.elements[3 * m - 2].value != '') {
            if ('999999' != '999999') {
                cllt0.document.f1.n2.value = 'bctkda';
                cllt0.document.f1.r1.value = stxh;
                cllt0.document.f1.n1.value = document.formst4.elements[3 * m - 2].value;
                cllt0.document.f1.submit();
            }
            document.formst4.elements[3 * m - 3].value = '已提交';
        } else
            showmess('填空内容不能为空！');
    }
    function tjydst(m, stxh) {
        var stda, i, j;
        stda = '';
        for (i = 0; i < 4; i++) {
            for (j = 0; j < 4; j++) {
                if (document.formst5.elements[(m - 1) * 16 + i * 4 + j].checked)
                    break;
            }
            if (j == 4)
                stda = stda + '0';
            else
                stda = stda + document.formst5.elements[(m - 1) * 16 + i * 4 + j].value;
        }
        if ('999999' != '999999')
            tjxzwj1.location = 'dzsj.asp?flag=3&stxh=' + stxh + '&stda=' + stda;
    }
    function tjjsst(n, stxh, m) {
        if (n == 6) {
            if (document.formst6.elements[m * 3 - 3].value != '') {
                if ('999999' != '999999') {
                    cllt0.document.f1.n2.value = 'bcjsda';
                    cllt0.document.f1.r1.value = stxh;
                    cllt0.document.f1.n1.value = document.formst6.elements[m * 3 - 3].value;
                    cllt0.document.f1.submit();
                }
                document.formst6.elements[3 * m - 2].value = '已提交';
            } else
                showmess('答案内容不能为空！');
        } else if (n == 7) {
            if (document.formst7.elements[m * 3 - 3].value != '') {
                if ('999999' != '999999') {
                    cllt0.document.f1.n2.value = 'bcjsda';
                    cllt0.document.f1.r1.value = stxh;
                    cllt0.document.f1.n1.value = document.formst7.elements[m * 3 - 3].value;
                    cllt0.document.f1.submit();
                }
                document.formst7.elements[3 * m - 2].value = '已提交';
            } else
                showmess('答案内容不能为空！');
        } else {
            if (document.formst8.elements[m * 3 - 3].value != '') {
                if ('999999' != '999999') {
                    cllt0.document.f1.n2.value = 'bcjsda';
                    cllt0.document.f1.r1.value = stxh;
                    cllt0.document.f1.n1.value = document.formst8.elements[m * 3 - 3].value;
                    cllt0.document.f1.submit();
                }
                document.formst8.elements[3 * m - 2].value = '已提交';
            } else
                showmess('答案内容不能为空！');
        }
    }
    function showsj() {
        var strda, str1, str2, str3, str4, str5, str6, str7, str8, i, j;
        mess2.innerHTML = "<input type=button value='调取试卷...' disabled>";
        str1 = '';
        str2 = '';
        str3 = '';
        str4 = '';
        str5 = '';
        str6 = '';
        str7 = '';
        str8 = '';
        for (i = 0; i < formst1.length; i += 4) {
            strda = '0';
            for (j = 0; j < 4; j++) {
                if (document.formst1.elements[i + j].checked) {
                    strda = document.formst1.elements[i + j].value;
                    break;
                }
            }
            str1 = str1 + strda;
        }
        for (i = 0; i < formst2.length; i += 2) {
            strda = '0';
            for (j = 0; j < 2; j++) {
                if (document.formst2.elements[i + j].checked) {
                    strda = document.formst2.elements[i + j].value;
                    break;
                }
            }
            str2 = str2 + strda;
        }
        for (i = 0; i < formst3.length; i += 5) {
            strda = '';
            for (j = 0; j < 5; j++) {
                if (document.formst3.elements[i + j].checked)
                    strda = strda + '1';
                else
                    strda = strda + '0';
            }
            str3 = str3 + strda;
        }
        for (i = 0; i < formst4.length; i += 3) {
            if (document.formst4.elements[i].value == '未提交')
                str4 = str4 + '未提交^';
            else
                str4 = str4 + document.formst4.elements[i + 1].value + '^';
        }
        for (i = 0; i < formst5.length; i += 4) {
            strda = '0';
            for (j = 0; j < 4; j++) {
                if (document.formst5.elements[i + j].checked)
                    strda = document.formst5.elements[i + j].value;
            }
            str5 = str5 + strda;
        }
        for (i = 0; i < formst6.length; i += 3) {
            if (document.formst6.elements[i].value == '未提交' || document.formst6.elements[i].value == '已提交')
                str6 = str6 + document.formst6.elements[i].value + '^^';
            else if (document.formst6.elements[i + 1].value == '已提交')
                str6 = str6 + document.formst6.elements[i].value + '^^';
            else
                str6 = str6 + '未提交^^';
        }
        for (i = 0; i < formst7.length; i += 3) {
            if (document.formst7.elements[i].value == '未提交' || document.formst7.elements[i].value == '已提交')
                str7 = str7 + document.formst7.elements[i].value + '^^';
            else if (document.formst7.elements[i + 1].value == '已提交')
                str7 = str7 + document.formst7.elements[i].value + '^^';
            else
                str7 = str7 + '未提交^^';
        }
        for (i = 0; i < formst8.length; i += 3) {
            if (document.formst8.elements[i].value == '未提交' || document.formst8.elements[i].value == '已提交')
                str8 = str8 + document.formst8.elements[i].value + '^^';
            else if (document.formst8.elements[i + 1].value == '已提交')
                str8 = str8 + document.formst8.elements[i].value + '^^';
            else
                str8 = str8 + '未提交^^';
        }
        document.fmnks.flag.value = '1';
        document.fmnks.fstr1.value = str1;
        document.fmnks.fstr2.value = str2;
        document.fmnks.fstr3.value = str3;
        document.fmnks.fstr4.value = str4;
        document.fmnks.fstr5.value = str5;
        document.fmnks.fstr6.value = str6;
        document.fmnks.fstr7.value = str7;
        document.fmnks.fstr8.value = str8;
        document.fmnks.submit();
    }
    // -->
</SCRIPT>
<html>
<META content='text/html; charset=gb2312' http-equiv='Content-Type'>
<META content='Microsoft FrontPage 6.0' name='GENERATOR'>
<META content='FrontPage.Editor.Document' name='ProgId'>
<TITLE>课程考试</TITLE>
<link rel='stylesheet' href='../images/default.css'>
<div id=floater1
     style='visibility: hidden; left:0px;top: 35px; width: 105px; height:130px; position: absolute;z-index:11;'>
    <table width='105' border=1 bgcolor='#FF00FE' height='130'>
        <tr>
            <td align='center' valign='middle'><img src='../function/shownew.asp?ksdm=999999' width='105' height=130>
            </td>
        </tr>
    </table>
</div>
<div id=floater0 style='top:0;left:0;width: 100%; height:30; position: absolute;z-index:10;'>
    <table width='100%' border=1 bgcolor='#FF00FE'>
        <tr>
            <td align='center' valign='middle' height=30 width='120'>
                <form name='formzp'><input class=button3 style='width:100%' type=button name='buttonzp' value='显示照片'
                                           onclick='showzp();'></form>
            </td>
            <td align='center' valign='middle' widht='60%'><font color=white>
                <b>考生考号：999999&nbsp;&nbsp;考生姓名：模拟考生&nbsp;&nbsp;
                    <span align=center id=mytime1>准备...</span></b></font></td>
            <td width='10%' align=center valign='middle'><input class=button3 style='width:100%' type=button
                                                                value='考生交卷' onclick='bye1();'></td>
        </tr>
    </table>
</div>
<div id=messend
     style='visibility: hidden; top: 0px; left:0px;width: 100%; height: document.body.scrollHeight-200;position: absolute;z-index:200;'>
    <table width='100%' border=1 bgcolor='#EEEEFF' height='100%' width='100%' valign=top align=center>
        <tr>
            <td align='center' valign='top' height='600' width='100%'><p>&nbsp;</p></td>
        </tr>
    </table>
</div>
<div id=mess0 style='visibility: hidden;left:0; position: absolute; width:230px;z-index:230;'>
    <table width='230' height=150 border=1 bgcolor='#FF00FE'>
        <tr>
            <td align='center' valign='middle' height=20 width='100%'><font color=white><b>系统提示</b></font></td>
        </tr>
        <tr>
            <td align='center' valign='middle' height=130 width='80%' bgcolor='#eeeeee'>
                <table width='100%' height=130 border=0>
                    <tr>
                        <td align='center' valign='middle' height=50>
                            <DIV align=center id=mess1>考试提示信息！</DIV>
                        </td>
                    </tr>
                    <tr>
                        <td align='center' valign='top' height=80>
                            <DIV id=mess23 style='left:0; position: absolute; width:230px; z-index:230;'>
                                <DIV align=center id=mess2 style='position: absolute; left:66px; top:30px;'><input
                                        style='CURSOR:Hand' type=button value='点击此处返回' onclick='closemess()'></div>
                                <DIV align=center id=mess3 style='position: absolute; left:40px; top:10px;'>
                                    <form name='sftckc'>输入考号:<input name='jsbs' value='' size=15><br></form>
                                    <input style='CURSOR:Hand' type=button value=' 确 认 ' onclick='submitmess(0)'>&nbsp;&nbsp;<input
                                        style='CURSOR:Hand' type=button value=' 放 弃 ' onclick='closemess()'></div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>


<BODY ><br>
<IFRAME frameBorder=0 height=0 marginHeight=0 width=100% marginWidth=0 name=cllt0 scrolling=no src='../function/lt0.asp'></IFRAME>
<IFRAME frameBorder=0 height=0 marginHeight=0 width=100% marginWidth=0 name=tjxzwj1 scrolling=no src='e.htm'></IFRAME>
<center>
    <script language=JavaScript>   action = setInterval('heartBeat()', 1); </script>
</center>
</BODY>