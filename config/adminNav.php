<?php
// 后台导航总配置文件
return [

    /*
    |--------------------------------------------------------------------------
    | 系统设置
    |--------------------------------------------------------------------------
    |
    | name          菜单显示名称
    | routeName     路由器名称
    | icon          图标
    |
    */
    [
        'navName'   => 'admin.index',
        'parentName'=> 'top',
        'title'      => '首页 Dashboard',
        'routeName' => 'admin.index',
        'icon'      => 'icon-home',
        'header'    => false,
    ],
    [
        'navName'   => 'admin.system',
        'parentName'=> 'top',
        'title'      => '系统 system',
        'routeName' => '',
        'icon'      => '',
        'header'    => true,
    ],
        [
            'navName'   => 'admin.system.function',
            'parentName'=> 'admin.system',
            'title'      => '系统功能',
            'routeName' => '',
            'icon'      => 'fa fa-cog',
            'header'    => false,
        ],
            [
                'navName'   => 'admin.system.function.system',
                'parentName'=> 'admin.system.function',
                'title'      => '系统设置',
                'routeName' => 'admin.system',
                'icon'      => 'fa fa-wrench',
                'header'    => false,
            ],
            [
                'navName'   => 'admin.system.function.config',
                'parentName'=> 'admin.system.function',
                'title'      => '配置管理',
                'routeName' => 'admin.config',
                'icon'      => 'fa fa-cogs',
                'header'    => false,
            ],
            [
                'navName'   => 'admin.system.function.upload',
                'parentName'=> 'admin.system.function',
                'title'      => '上传管理',
                'routeName' => 'admin.upload',
                'icon'      => 'fa fa-upload',
                'header'    => false,
            ],
        [
            'navName'   => 'admin.system.application',
            'parentName'=> 'admin.system',
            'title'      => '应用中心',
            'routeName' => '',
            'icon'      => 'fa fa-folder-open-o',
            'header'    => false,
        ],
            [
                'navName'   => 'admin.system.application.model',
                'parentName'=> 'admin.system.application',
                'title'      => '模块扩展',
                'routeName' => 'admin.model',
                'icon'      => 'fa fa-th-large',
                'header'    => false,
            ],
            [
                'navName'   => 'admin.system.application.addon',
                'parentName'=> 'admin.system.application',
                'title'      => '插件管理',
                'routeName' => 'admin.addon',
                'icon'      => 'fa fa-th',
                'header'    => false,
            ],
            [
                'navName'   => 'admin.system.application.theme',
                'parentName'=> 'admin.system.application',
                'title'      => '主题管理',
                'routeName' => 'admin.theme',
                'icon'      => 'fa fa-adjust',
                'header'    => false,
            ],

];
