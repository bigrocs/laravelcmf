<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminConfig;
use FormBuilder;

class SystemController extends Controller
{
    /** @var AdminConfigRepository */
    private $adminConfigModel;

    public function __construct(AdminConfig $adminConfigRepo)
    {
        $this->adminConfigModel = $adminConfigRepo;
    }

    /**
     * Display a listing of the Goods.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index($group = 0)
    {
        $adminConfigs = $this->adminConfigModel
                            ->where('group', '=', $group)
                            ->where('status', '=', 1)
                            ->get();
        $congifGroupList = explode(',', config('adminConfig.CONFIG_GROUP_LIST'));
        foreach ($congifGroupList as $key => $val) {
            $tabList[$key]['title'] = $val;
            $tabList[$key]['href'] = route('admin.system', ['group' => $key]);
        }

        // 使用Builder快速建立列表页面。
        $htmlData = FormBuilder::setMetaTitle('系统设置')            // 设置页面标题
                    ->setTabNav($tabList, $group)                   // 设置Tab按钮列表
                    ->setFormObjectAuto($adminConfigs)              // 设置表单项对象
                    ->getData();
        view()->share($htmlData);

        return view('admin.system');
    }
    /**
     * [update 更新配置内容].
     *
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-01T16:50:05+0800
     *
     * @param Request $request [description]
     *
     * @return [type] [description]
     */
    public function store(Request $request)
    {
        foreach ($request->all() as $name => $value) {
            if ($name != '_token') {
                $adminConfig = $this->adminConfigModel->where('name', '=', $name)->update(['value' => $value]);
            }
        }

        return response()->json([
                'message' => '保存成功！',
                'status' => 1,
                'code' => 200,
            ], 200);
    }
}
