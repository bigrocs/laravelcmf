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
if (!function_exists('getActiveNav')) {
    /**
     * 根据当前导航路由器名称 获取携带active状态导航数组.
     *
     * @author BigRocs <bigrocs@qq.com>
     * @date   2016-04-22T14:30:11+0800
     *
     * @param [array] $nav [当前菜单信息]
     *
     * @return [type] [description]
     */
    function getActiveNav($navs)
    {
        $navCollect = collect($navs); // 创建集合
        $navSubCollect = $navCollect->where('parentName', 'top'); //获取顶级导航
        $navData = getSubNav($navCollect, $navSubCollect);
        return $navData;
    }
}
if (!function_exists('getSubNav')) {
    /**
     * [getSubNav 获取子导航].
     *
     * @param [type] $navCollect    [导航合集]
     * @param [type] $navSubCollect [当前导航]
     *
     * @return [type] [description]
     */
    function getSubNav($navCollect, $navSubCollect)
    {
        $routeName = routeName(); //获取当前路由名称
        foreach ($navSubCollect as $key => $nav) {
            $nav['active'] = false;//设定全部导航状态关闭
            $filtered = $navCollect->contains('parentName', $nav['navName']); //查找子分类是否存在
            if ($filtered) {
                $navSubCollect = $navCollect->where('parentName', $nav['navName']);
                $navData[$key] = $nav;
                $navData[$key]['subNav'] = getSubNav($navCollect, $navSubCollect); //加载子导航
                // 根据子导航状态开启父导航状态
                foreach ($navData[$key]['subNav'] as $k => $subNav) {
                    if($subNav['active']){
                        $navData[$key]['active'] = true;
                    }
                }
            } else {
                // 根据当期路由状态开启对应导航状态
                if ($nav['routeName'] == $routeName) {
                    $nav['active'] = true;
                }
                $navData[$key] = $nav; //不存在直接返回
            }
        }
        return $navData;
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
        $uploadObject = App\Models\AdminUpload::where(['id' => $id])->first();
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
