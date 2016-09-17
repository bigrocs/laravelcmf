<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    /**
     * 获取导航.
     *
     * @author BigRocs <bigrocs@qq.com>
     * @date   2016-04-22T14:30:11+0800
     *
     * @param [array] $nav [导航配置数组]
     *
     * @return [type] [description]
     */
    public function getNav($navs)
    {
        $navCollect = $this->getActiveNavCollect($navs);
        $navSubCollect = $navCollect->where('parentName', 'top'); //获取顶级导航
        $navData = $this->getTreeNav($navCollect, $navSubCollect);

        return $navData;
    }
    /**
     * [getNavTitle 当前导航标题].
     *
     * @param [type] $navs [导航配置数组]
     *
     * @return [type] [description]
     */
    public function getPageTitle($navs)
    {
        $navCollect = $this->getActiveNavCollect($navs);
        $routeName = routeName(); //获取当前路由名称
        $navSubCollect = $navCollect->where('routeName', $routeName)->first(); //获取顶级导航

        return $navSubCollect['title'];
    }
    /**
     * [getBreadcrumb 获取面包屑导航].
     *
     * @param [type] $navs [导航配置数组]
     *
     * @return [type] [description]
     */
    public function getBreadcrumb($navs)
    {
        $navCollect = $this->getActiveNavCollect($navs);
        $navSubCollect = $navCollect->where('active', true); //获取顶级导航
        return $navSubCollect;
    }

    /**
     * 根据当前导航路由器名称 获取携带active状态导航合集.
     *
     * @author BigRocs <bigrocs@qq.com>
     * @date   2016-04-22T14:30:11+0800
     *
     * @param [array] $nav [当前菜单信息]
     *
     * @return [type] [description]
     */
    public function getActiveNavCollect($navs, $parentName = null)
    {
        $routeName = routeName(); //获取当前路由名称
        foreach ($navs as &$nav) {
            if (empty($parentName)) {
                if ($nav['routeName'] == $routeName) {
                    $nav['active'] = true;
                    $parentName = $nav['parentName'];
                    if (!empty($parentName)) {
                        $navs = $this->getActiveNavCollect($navs, $parentName);
                    }
                }
            } elseif ($nav['navName'] == $parentName) {
                $nav['active'] = true;
                $parentName = $nav['parentName'];
                if (!empty($parentName)) {
                    $navs = $this->getActiveNavCollect($navs, $parentName);
                }
            }
        }

        return collect($navs);
    }
    /**
     * [getTreeNav 获取树形结构导航].
     *
     * @param [type] $navCollect    [导航合集]
     * @param [type] $navSubCollect [当前导航]
     *
     * @return [type] [description]
     */
    public function getTreeNav($navCollect, $navSubCollect)
    {
        $routeName = routeName(); //获取当前路由名称
        foreach ($navSubCollect as $key => $nav) {
            $filtered = $navCollect->contains('parentName', $nav['navName']); //查找子分类是否存在
            if ($filtered) {
                $navSubCollect = $navCollect->where('parentName', $nav['navName']);
                $navData[$key] = $nav;
                $navData[$key]['subNav'] = $this->getTreeNav($navCollect, $navSubCollect); //加载子导航
            } else {
                $navData[$key] = $nav; //不存在直接返回
            }
        }

        return $navData;
    }
}
