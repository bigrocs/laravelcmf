<?php

namespace App\Models;

/**
 * Class AdminConfig
 * @package App\Models
 */
trait CommonModel
{
	/**
	 * [setStatus 模型数据状态处理]
	 * @Author   BigRocs                  BigRocs@qq.com
	 * @DateTime 2016-07-15T15:28:39+0800
	 * @param    [type]                   $status        [状态操作]
	 * @param    [type]                   $ids           [ID数据]
	 */
	public function setStatus($status,$ids) 
    {
        if (empty($ids)) {
            return [
                'message'  =>'请选择要操作的数据',
                'status'=>0,
                'code' => 200
            ];
        }
        if(!is_array($ids)){
        	$ids = [$ids];//转化为数组
        }
        //获取数据表主键
        $modelKeyName = $this->getKeyName();
        switch ($status) {
            case 'forbid' :  // 禁用条目
                $response = $this->whereIn($modelKeyName,$ids)->update(['status' => 0]);
                if($response){
                    $message = '禁用成功';
                }else{
                    $message = '禁用失败';
                }
                break;
            case 'resume' :  // 启用条目
                $response = $this->whereIn($modelKeyName,$ids)->update(['status' => 1]);
                if($response){
                    $message = '启用成功';
                }else{
                    $message = '启用失败';
                }
                break;
            case 'hide' :  // 隐藏条目
                $response = $this->whereIn($modelKeyName,$ids)->update(['status' => 2]);
                if($response){
                    $message = '隐藏成功';
                }else{
                    $message = '隐藏失败';
                }
                break;
            case 'show' :  // 显示条目
                $response = $this->whereIn($modelKeyName,$ids)->update(['status' => 1]);
                if($response){
                    $message = '显示成功';
                }else{
                    $message = '显示失败';
                }
                break;
            case 'recycle' :  // 移动至回收站
                $response = $this->whereIn($modelKeyName,$ids)->update(['status' => -1]);
                if($response){
                    $message = '移动至回收站成功';
                }else{
                    $message = '移动至回收站失败';
                }
                break;
            case 'restore' :  // 从回收站还原
                $response = $this->whereIn($modelKeyName,$ids)->update(['status' => 1]);
                if($response){
                    $message = '恢复成功';
                }else{
                    $message = '恢复失败';
                }
                break;
            case 'delete'  :  // 删除条目
                $response = $this->whereIn($modelKeyName,$ids)->forceDelete();
                if($response){
                    $message = '删除成功，不可恢复！';
                }else{
                    $message = '删除失败';
                }
                break;
            default :
                $message = '参数错误';
                break;
        }
        return [
            'message'  =>$message,
            'status'=>1,
            'code' => 200
        ];
    }

}
