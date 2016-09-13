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
    0 => [
        'name' => '首页 Dashboard',
        'routeName' => 'admin.index',
        'icon' => 'icon-home',
    ],
    1 => [
        'name' => '系统 system',
        'uppercase' => 'on',
        'routeName' => '',
        'icon' => '',
        'subNav' => [
            0 => [
                'name' => '系统功能',
                'routeName' => '',
                'icon' => 'fa fa-cog',
                'subNav' => [
                    0 => [
                        'name' => '系统设置',
                        'routeName' => 'admin.system',
                        'icon' => 'fa fa-wrench',
                    ],
                    1 => [
                        'name' => '配置管理',
                        'routeName' => 'admin.config',
                        'icon' => 'fa fa-cogs',
                    ],
                    2 => [
                        'name' => '上传管理',
                        'routeName' => 'admin.upload',
                        'icon' => 'fa fa-upload',
                    ],
                ],
            ],
            1 => [
                'name' => '应用中心',
                'routeName' => '',
                'icon' => 'fa fa-folder-open-o',
                'subNav' => [
                    0 => [
                        'name' => '模块扩展',
                        'routeName' => 'admin.model',
                        'icon' => 'fa fa-th-large',
                    ],
                    1 => [
                        'name' => '插件管理',
                        'routeName' => 'admin.addon',
                        'icon' => 'fa fa-th',
                    ],
                    2 => [
                        'name' => '主题管理',
                        'routeName' => 'admin.theme',
                        'icon' => 'fa fa-adjust',
                    ],
                ],
            ],
        ],
    ],
];
