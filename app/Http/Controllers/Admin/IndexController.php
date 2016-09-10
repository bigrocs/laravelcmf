<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminConfig;

/**
 * 系统配置控制器.
 */
class IndexController extends Controller
{
    /** @var AdminConfigRepository */
    private $adminConfigModel;

    public function __construct(AdminConfig $adminConfigRepo)
    {
        $this->adminConfigModel = $adminConfigRepo;
    }
    /**
     * [index 配置列表].
     *
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-16T14:42:23+0800
     *
     * @param int $group [配置分组ID]
     *
     * @return [type] [description]
     */
    public function index($group = 0)
    {
        view()->share(['metaTitle' => '后台首页']);

        return view('admin.index');
    }
}
