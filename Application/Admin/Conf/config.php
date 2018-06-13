<?php
/**
 * 总后台配置信息
 */
return array(
    //'配置项'=>'配置值'
    'PAGE_SIZE' => 8,  //数据表格每页显示的数量


    'MENU' => array(
        'Index' => array(
            'name' => 'Index',
            'title' => '控制面板',
            'm' => 'Admin',
            'c' => 'Index',
            'a' => 'Index',
            'icon' => 'fa fa-dashboard',
            'children' => '',
        ),

        'Video' => array(
            'name' => 'Video',
            'title' => '视频管理',
            'm' => 'Admin',
            'c' => 'Video',
            'a' => 'Index',
            'icon' => 'fa fa-video-camera',
            'children' => '',

        ),

        'Profession' => array(
            'name' => 'Profession',
            'title' => '专业管理',
            'm' => 'Admin',
            'c' => 'Profession',
            'a' => 'Index',
            'icon' => 'fa fa-th'
        ),

        'Member' => array(
            'name' => 'Member',
            'title' => '会员管理',
            'm' => 'Admin',
            'c' => 'Member',
            'a' => 'Index',
            'icon' => 'glyphicon glyphicon-user'
        ),

        'Photo' => array(
            'name' => 'Photo',
            'title' => '照片审核',
            'm' => 'Admin',
            'c' => 'Photo',
            'a' => 'Index',
            'icon' => 'glyphicon glyphicon-picture'
        ),

        'Inform' => array(
            'name' => 'Inform',
            'title' => '通知列表',
            'm' => 'Admin',
            'c' => 'Inform',
            'a' => 'Index',
            'icon' => 'fa  fa-comment'
        ),

        'Adminn' => array(
            'name' => 'Adminn',
            'title' => '管理员设置',
            'm' => 'Admin',
            'c' => 'Adminn',
            'a' => 'Index',
            'icon' => 'fa fa-th',
            'children' => array(
                'Admin' => array(
                    'name'=>'Admin',
                    'title'=>'管理员管理',
                    'm'=>'Admin',
                    'c'=>'Admin',
                    'a'=>'Index'
                ),
                'Role' => array(
                    'name'=>'Role',
                    'title'=>'角色管理',
                    'm'=>'Admin',
                    'c'=>'Role',
                    'a'=>'Index'
                ),
            )
        ),

        'Set' => array(
            'name' => 'Set',
            'title' => '网站设置',
            'm' => 'Admin',
            'c' => 'Set',
            'a' => 'Index',
            'icon' => 'fa fa-th',
            'children' => ''
        ),


    )
);