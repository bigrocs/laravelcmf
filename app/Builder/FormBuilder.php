<?php 
namespace App\Builder;
/**
 * Form表单构造器
 * @author BigRocs <bigrocs@qq.com>
 * @date   2016-05-08T13:51:33+0800
 */
class FormBuilder
{
    private $_metaTitle;            							// 页面标题
    private $_tabNav 		= [];  								// 页面Tab导航
    private $_route;              						        // 表单提交路由
    private $_formItems 	= [];  								// 表单项目数据
    private $_formAutoItems = [];                               // 表单自动项目数据
    private $_formData 		= [];  								// 表单数据
    private $_extraHtml     = [];            					// 额外功能代码
    private $_ajaxSubmit 	= true;    							// 是否ajax提交
    private $_view          = 'Builder.builder';                // 公共视图
    private $_template		= 'Builder.formBuilder';            // 模版

    /**
     * [__construct 初始化]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-11T17:13:14+0800
     */
    public function __construct() {
        $this->_route = routeName();//设置当前路由器名称
    }
    /**
     * 设置页面标题
     * @author BigRocs <bigrocs@qq.com>
     * @date   2016-05-08T13:56:35+0800
     * @param  [type]                   $metaTitle [标题文本]
     */
    
    public function setMetaTitle($metaTitle) 
    {
        $this->_metaTitle = $metaTitle;
        return $this;
    }

    /**
     * [setTabNav 设置Tab按钮列表]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-13T09:28:00+0800
     * @param    [type]                   $tabList       [Tab列表  array('title' => '标题', 'href' => 'http://www.bigrocs.com']
     * @param    [type]                   $currentTab    [当前tab]
     */
    public function setTabNav($tabList,$currentTab) 
    {
        $this->_tabNav = [
            'tabList' => $tabList,
            'currentTab' => $currentTab
        ];
        return $this;
    }

    /**
     * [增加一个表单项]
     * @author BigRocs <bigrocs@qq.com>
     * @date   2016-05-08T16:31:15+0800
     * @param  [$data]                   ['name']       [表单名称]
     * @param  [$data]                   ['title']      [表单标题]
     * @param  [$data]                   ['value]       [默认值]
     * @param  [$data]                   ['icon]        [字体图标]
     * @param  [$data]                   ['type']       [表单类型(取值参考系统配置FORM_ITEM_TYPE)]
     * @param  [$data]                   ['tip']        [表单提示说明]
     * @param  [$data]                   ['options']    [表单options]
     * @param  [$data]                   ['property']   [表单项额外属性]
     */
    public function addFormItem($data) 
    {
        $formItem['name']      = @$data['name'];
        $formItem['title']     = @$data['title'];
        $formItem['value']     = @$data['value'];
        $formItem['icon']      = @$data['icon'];
        $formItem['type']      = @$data['type'];
        $formItem['tip']       = @$data['tip'];
        $formItem['options']   = @$data['options'];
        $formItem['property']  = @$data['property'];
        $this->_formItems[]    = $formItem;
        return $this;
    }    

    /**
     * [setFormObjectAuto 自动设置表单项数组]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-15T16:49:54+0800
     * @param    [type]                   $formObject    [表单项对象数组]
     */
    public function setFormObjectAuto($formObject) {
        $this->_formAutoItems = $formObject->toArray();//转化为数组
        return $this;
    }
    /**
     * [setFormObject 设置表单项数组]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-15T16:49:34+0800
     * @param    [type]                   $formObject    [表单项对象数组]
     */
    public function setFormObject($formObject) {
        $this->_formData = $formObject->toArray();//转化为数组
        return $this;
    }
    /**
     * [setTemplate 设置页面模版]
     * @author BigRocs <bigrocs@qq.com>
     * @date   2016-05-08T14:43:35+0800
     * @param  [type]                   $template [视图模板]
     */
    public function setTemplate($template) 
    {
        $this->_template = $template;
        return $this;
    }
    /**
     * [setPostUrl 设置表单提交路由]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-03T16:26:22+0800
     * @param    [type]                   $post_url      [路由器参数]
     */
    public function setRoute($route) {
        $this->_route = $route;
        return $this;
    }
    /**
     * [setExtraHtml 设置额外功能代码]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-04T17:31:22+0800
     * @param    [type]                   $extraHtml     [额外HTML代码]
     */
    public function setExtraHtml($extraHtml) {
        $this->_extraHtml = $extraHtml;
        return $this;
    }
    /**
     * [compileFormData 对表单数据进行编译]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-15T16:56:29+0800
     * @return   [type]                   [description]
     */
    protected function compileFormData(){
        //额外已经构造好的表单项目与单个组装的的表单项目进行合并
        $this->_formItems = array_merge($this->_formItems, $this->_formAutoItems);
        //编译表单值
        if ($this->_formData) {
            foreach ($this->_formItems as &$item) {
                    $item['value'] = $this->_formData[$item['name']];
            }
        };
        return $this;
    }
    /**
     * 获取整理后的视图数据
     * @author BigRocs <bigrocs@qq.com>
     * @date   2016-05-08T14:10:07+0800
     * @return [type]                   [description]
     */
    public function getData() 
    {
        $this->compileFormData();//对表单数据进行编译	
    	return	[
    				'metaTitle' => $this->_metaTitle,		// 页面标题
    				'tabNav'	=> $this->_tabNav,     		// 页面Tab导航
                    'postRoute' => $this->_route,           // 页面提交路由
    				'formItems'	=> $this->_formItems,     	// 表单项目
                    'extraHtml' => $this->_extraHtml,       // 设置额外功能代码
                    'view'      => $this->_view,            // 视图模板
    				'template'	=> $this->_template,		// 视图模板
    			];
    }
}

?>