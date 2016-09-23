<?php

/**
 * Global helpers file with misc functions
 * 全局助手文件以及其他功能函数.
 */
if (!function_exists('routeName')) {
    /**
     * 获取当前访问路由器的别名.
     *
     * @author BigRocs <bigrocs@qq.com>
     * @date   2016-04-22T16:53:01+0800
     *
     * @return [type] [description]
     */
    function routeName()
    {
        return app('router')->currentRouteName();
    }
}
if (!function_exists('getNav')) {
    /**
     * [getNav 获取导航.].
     *
     * @param [type] $nav [导航配置数组]
     *
     * @return [type] [description]
     */
    function getNav($nav)
    {
        $NavObject = new App\Models\Nav();

        return $NavObject->getNav($nav);
    }
}
if (!function_exists('getPageTitle')) {
    /**
     * [getNav 获取导航.].
     *
     * @param [type] $nav [导航配置数组]
     *
     * @return [type] [description]
     */
    function getPageTitle($nav)
    {
        $NavObject = new App\Models\Nav();

        return $NavObject->getPageTitle($nav);
    }
}
if (!function_exists('getBreadcrumb')) {
    /**
     * [getNav 获取面包屑导航.].
     *
     * @param [type] $nav [导航配置数组]
     *
     * @return [type] [description]
     */
    function getBreadcrumb($nav)
    {
        $NavObject = new App\Models\Nav();

        return $NavObject->getBreadcrumb($nav);
    }
}
if (!function_exists('getUploadUrl')) {
    /**
     * [getUploadUrl 根据ID获取上传文件对象单条URL信息].
     *
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-06-14T15:25:29+0800
     *
     * @param [type] $id [文件ID]
     *
     * @return [type] [description]
     */
    function getUploadUrl($id)
    {
        $uploadObject = App\Models\Upload::where(['id' => $id])->first();
        if (!$uploadObject) {
            return asset('assets/apps/img/404.jpg');
        }

        return $uploadObject->url;
    }
}
if (!function_exists('bytesFormat')) {
    /**
     * [format_bytes 格式化字节大小].
     *
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-07T09:35:20+0800
     *
     * @param [type] $size      [字节数]
     * @param string $delimiter [数字和单位分隔符]
     *
     * @return [type] [格式化后的带单位的大小]
     */
    function bytesFormat($size, $delimiter = '')
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        for ($i = 0; $size >= 1024 && $i < 5; ++$i) {
            $size /= 1024;
        }

        return round($size, 2).$delimiter.$units[$i];
    }
}
if (!function_exists('timeFormat')) {
    /**
     * [timeFormat 时间戳格式化].
     *
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-07T10:05:01+0800
     *
     * @param [type] $time   [时间戳]
     * @param string $format [格式]
     *
     * @return [type] [返回格式化数据]
     */
    function timeFormat($time = null, $format = 'Y-m-d H:i')
    {
        return date($format, strtotime($time));
    }
}
