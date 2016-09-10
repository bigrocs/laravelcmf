<?php

namespace App\Builder;

use Illuminate\Support\ServiceProvider;
class BuilderServiceProvider extends ServiceProvider
{


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFormBuilder();
        $this->registerTablesBuilder();
        $this->mergeConfigFrom(
            __DIR__.'//config/builder.php', 'builder'
        );
    }
    /**
     * 注册FORM表单构造
     * @author BigRocs <bigrocs@qq.com>
     * @date   2016-05-11T16:50:32+0800
     * @return [type]                   [description]
     */
    protected function registerFormBuilder()
    {
        $this->app->singleton('FormBuilder', function () {
            return new FormBuilder;
        });
    }
    /**
     * [registerTablesBuilder 注册表格构造]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-05T16:54:28+0800
     * @return   [type]                   [description]
     */
    protected function registerTablesBuilder()
    {
        $this->app->singleton('TablesBuilder', function () {
            return new TablesBuilder;
        });
    }
}