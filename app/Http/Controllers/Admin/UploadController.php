<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\AdminUpload;
use TablesBuilder;
use Response;

class UploadController extends Controller
{
    /** @var AdminConfigRepository */
    private $AdminUploadModel;

    public function __construct(AdminUpload $AdminUploadRepo)
    {
        $this->AdminUploadModel = $AdminUploadRepo;
    }

    public function index()
    {
        $uploads = $this->AdminUploadModel
                            ->where('status', '>=', 0)
                            ->get();

        // 处理输出数据
        foreach ($uploads as &$data) {
            if (in_array($data->extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp'])) {
                $data->show = $data->url;
            } else {
                $data->show = asset('vendor/builder/file/'.$data->extension.'.png');
            }
            $data->name = str_limit($data['name'], 30).'<input class="form-control input-sm" value="'.$data['path'].'">';
        }

        // 使用Builder快速建立列表页面。
        $htmlData = TablesBuilder::setMetaTitle('配置管理')   // 设置页面标题
                    ->addTopButton('resume')                    // 添加启用按钮
                    ->addTopButton('forbid')                    // 添加禁用按钮
                    ->addTopButton('delete')                    // 添加删除按钮
                    ->addTableColumn('id', 'ID')
                    ->addTableColumn('show', '文件', 'picture')
                    ->addTableColumn('name', '文件名及路径', 'default')
                    ->addTableColumn('size', '大小', 'byte')
                    ->addTableColumn('created_at', '创建时间', 'dateTime')
                    ->addTableColumn('status', '状态', 'status')
                    ->addTableColumn('right_button', '操作', 'btn')
                    ->setTableObject($uploads)                      // 设置表格对象
                    ->addRightButton('forbid')                      // 添加禁用/启用按钮
                    ->addRightButton('delete')                      // 添加删除按钮
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
        if ($status == 'delete') {
            $this->AdminUploadModel->fileDelete($ids); // 删除文件
        }
        $response = $this->AdminUploadModel->setStatus($status, $ids);

        return response()->json($response);
    }
    /**
     * [postImageUpload 图片上传].
     *
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-06-09T12:00:52+0800
     *
     * @return [type] [description]
     */
    public function postImageUpload()
    {
        $imageData = Input::all();
        $response = $this->AdminUploadModel->imageUpload($imageData);

        return Response::json($response);
    }
    /**
     * [postFileUpload 文件上传].
     *
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-03T16:45:39+0800
     *
     * @return [type] [description]
     */
    public function postFileUpload()
    {
        $fileData = Input::all();
        $response = $this->AdminUploadModel->fileUpload($fileData);

        return Response::json($response);
    }
}
