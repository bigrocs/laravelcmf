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
    'dashboard' => [
        'name'          => '首页 Dashboard',
        'routeName'     => 'admin.index',
        'icon'          => 'icon-home',
    ],
    'system' => [
        'name'          => '系统 system',
        'uppercase'     => 'on',
        'routeName'     => '',
        'icon'          => '',
        'subNav'        => [
            'systemFunction'   => [
                'name'          => '系统功能',
                'routeName'     => '',
                'icon'          => 'icon-settings',
                'subNav'        => [
                    'system'        => [
                        'name'          => '系统设置',
                        'routeName'     => 'admin.system',
                        'icon'          => 'fa fa-wrench',
                    ],
                    // 'nav'           => [
                    //     'name'          => '导航管理',
                    //     'routeName'     => 'admin.nav',
                    //     'icon'          => 'fa fa-map-signs',
                    // ],
                    // 'link'          => [
                    //     'name'          => '快捷链接',
                    //     'routeName'     => 'admin.link',
                    //     'icon'          => 'fa fa-link',
                    // ],
                    'config'        => [
                        'name'          => '配置管理',
                        'routeName'     => 'admin.config',
                        'icon'          => 'fa fa-cogs',
                    ],
                    'upload'        => [
                        'name'          => '上传管理',
                        'routeName'     => 'admin.upload',
                        'icon'          => 'fa fa-upload',
                    ],
                ],
            ],
            'systemExtend'   => [
                'name'          => '应用中心',
                'routeName'     => '',
                'icon'          => 'fa fa-folder-open-o',
                'subNav'        => [
                    'model'        => [
                        'name'          => '模块扩展',
                        'routeName'     => 'admin.model',
                        'icon'          => 'fa fa-th-large',
                    ],
                    'addon'        => [
                        'name'          => '插件管理',
                        'routeName'     => 'admin.addon',
                        'icon'          => 'fa fa-th',
                    ],
                    'theme'        => [
                        'name'          => '主题管理',
                        'routeName'     => 'admin.theme',
                        'icon'          => 'fa fa-adjust',
                    ],
                ],
            ],
        ],
    ],
];
