<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminConfig;
use FormBuilder;
use TablesBuilder;

/**
 * 系统配置控制器.
 */
class ModelController extends Controller
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
        $adminConfigs = $this->adminConfigModel
                            ->where('group', '=', $group)
                            ->where('status', '>=', 0)
                            ->get();
        $congifGroupList = explode(',', config('adminConfig.CONFIG_GROUP_LIST'));
        foreach ($congifGroupList as $key => $val) {
            $tabList[$key]['title'] = $val;
            $tabList[$key]['href'] = route('admin.config', ['group' => $key]);
        }
        // 使用Builder快速建立列表页面。
        $htmlData = TablesBuilder::setMetaTitle('配置管理')   // 设置页面标题
                    ->setTabNav($tabList, $group)                       // 设置Tab按钮列表
                    // ->addTopButton('addnew')                    // 添加新增按钮
                    // ->addTopButton('resume')                    // 添加启用按钮
                    // ->addTopButton('forbid')                    // 添加禁用按钮
                    // ->addTopButton('delete')                    // 添加删除按钮
                    ->addTableColumn('id', 'ID')
                    ->addTableColumn('name', '名称')
                    ->addTableColumn('title', '标题')
                    ->addTableColumn('sort', '排序')
                    ->addTableColumn('status', '状态', 'status')
                    ->addTableColumn('rightButton', '操作', 'btn')
                    ->setTableObject($adminConfigs)                 // 设置表格对象
                    // ->addRightButton('edit')                        // 添加编辑按钮
                    // ->addRightButton('forbid')                      // 添加禁用/启用按钮
                    // ->addRightButton('delete')                      // 添加删除按钮
                    ->getData();
        view()->share($htmlData);

        return view('admin.config');
    }
    /**
     * [add 新增配置].
     *
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-16T14:43:21+0800
     */
    public function add()
    {
        $formItemType = config('builder.formItemType');
        foreach ($formItemType as $key => $val) {
            $formItemType[$key] = $val[0];
        }
        //使用FormBuilder快速建立表单页面。
        $htmlData = FormBuilder::setMetaTitle('系统设置')     // 设置页面标题
                    ->setRoute('admin.config.store')
                    ->addFormItem(['name' => 'group',     'type' => 'select',   'title' => '配置分组',     'tip' => '配置所属的分组',    'options' => explode(',', config('adminConfig.CONFIG_GROUP_LIST'))])
                    ->addFormItem(['name' => 'type',      'type' => 'select',   'title' => '配置类型',     'tip' => '配置类型的分组',    'options' => $formItemType])
                    ->addFormItem(['name' => 'name',      'type' => 'text',     'title' => '配置名称',     'tip' => '配置名称'])
                    ->addFormItem(['name' => 'title',     'type' => 'text',     'title' => '配置标题',     'tip' => '配置标题'])
                    ->addFormItem(['name' => 'value',     'type' => 'textarea', 'title' => '配置值',       'tip' => '配置值'])
                    ->addFormItem(['name' => 'options',   'type' => 'textarea', 'title' => '配置项',       'tip' => '如果是单选、多选、下拉等类型 需要配置该项'])
                    ->addFormItem(['name' => 'tip',       'type' => 'textarea', 'title' => '配置说明',     'tip' => '配置说明'])
                    ->addFormItem(['name' => 'sort',      'type' => 'num',      'title' => '排序',         'tip' => '用于显示的顺序'])
                    ->getData();
        view()->share($htmlData);

        return view('admin.config');
    }
    /**
     * [edit 编辑配置].
     *
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-16T14:43:33+0800
     *
     * @param [type] $id [数据ID]
     *
     * @return [type] [description]
     */
    public function edit($id)
    {
        $formItemType = config('builder.formItemType');
        foreach ($formItemType as $key => $val) {
            $formItemType[$key] = $val[0];
        }
        $adminConfig = $this->adminConfigModel->find($id);
        //使用FormBuilder快速建立表单页面。
        $htmlData = FormBuilder::setMetaTitle('系统设置')     // 设置页面标题
                    ->setRoute('admin.config.upload')
                    ->addFormItem(['name' => 'id',        'type' => 'hidden',   'title' => 'ID',           'tip' => 'ID'])
                    ->addFormItem(['name' => 'group',     'type' => 'select',   'title' => '配置分组',     'tip' => '配置所属的分组',    'options' => explode(',', config('adminConfig.CONFIG_GROUP_LIST'))])
                    ->addFormItem(['name' => 'type',      'type' => 'select',   'title' => '配置类型',     'tip' => '配置类型的分组',    'options' => $formItemType])
                    ->addFormItem(['name' => 'name',      'type' => 'text',     'title' => '配置名称',     'tip' => '配置名称'])
                    ->addFormItem(['name' => 'title',     'type' => 'text',     'title' => '配置标题',     'tip' => '配置标题'])
                    ->addFormItem(['name' => 'value',     'type' => 'textarea', 'title' => '配置值',       'tip' => '配置值'])
                    ->addFormItem(['name' => 'options',   'type' => 'textarea', 'title' => '配置项',       'tip' => '如果是单选、多选、下拉等类型 需要配置该项'])
                    ->addFormItem(['name' => 'tip',       'type' => 'textarea', 'title' => '配置说明',     'tip' => '配置说明'])
                    ->addFormItem(['name' => 'sort',      'type' => 'num',      'title' => '排序',         'tip' => '用于显示的顺序'])
                    ->setFormObject($adminConfig)
                    ->getData();
        view()->share($htmlData);

        return view('admin.config');
    }
    /**
     * [setStatus 配置数据状态处理].
     *
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-16T14:43:46+0800
     *
     * @param [type] $status [description]
     */
    public function setStatus($status)
    {
        $ids = Input::get('id');
        $response = $this->adminConfigModel->setStatus($status, $ids);

        return response()->json($response);
    }
    /**
     * [store 新增配置数据].
     *
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-16T14:44:59+0800
     *
     * @param Request $request [请求数据]
     *
     * @return [type] [description]
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $response = $this->adminConfigModel->create($input);
        if ($response->wasRecentlyCreated) {
            return response()->json([
                'message' => '新增配置数据成功！',
                'url' => route('admin.config'), //返回页面
                'status' => 1,
                'code' => 200,
            ], 200);
        }
    }
    /**
     * [upload 更新配置数据].
     *
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-18T10:33:02+0800
     *
     * @param Request $request [请求数据]
     *
     * @return [type] [description]
     */
    public function upload(Request $request)
    {
        $input = $request->all();
        $id = $request->id;
        $response = $this->adminConfigModel->find($id)->fill($input)->save();
        if ($response) {
            return response()->json([
                'message' => '更新配置数据成功！',
                'url' => route('admin.config'), //返回页面
                'status' => 1,
                'code' => 200,
            ], 200);
        }
    }
}
