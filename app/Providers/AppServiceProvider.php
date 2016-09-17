<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\AdminConfig;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setConfigAdminConfig();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * [setConfigAdminConfig 注册数据库内的全局配置参数]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-04T16:57:48+0800
     */
    public function setConfigAdminConfig()
    {
        $adminConfigObject = AdminConfig::where('status', '=', 1)->get();
        foreach ($adminConfigObject as $key => $config) {
            $adminConfig[$config->name] = $config->value;
        };
        Config::set('adminConfig',$adminConfig);
    }
}
