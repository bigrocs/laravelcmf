<?php 
namespace App\Builder;
/**
 * Form表单构造器
 * @author BigRocs <bigrocs@qq.com>
 * @date   2016-05-08T13:51:33+0800
 */
class TablesBuilder
{
    private $_metaTitle;            							// 页面标题
    private $_tabNav 		        = [];  						// 页面Tab导航
    private $_tableColumnList       = [];              			// 表格标题字段
    private $_search                = [];                       // 搜索参数配置
    private $_tableDataList 	    = [];  						// 表格数据列表
    private $_tableDataListKey 	    = 'id'; 					// 表格数据列表主键字段名
    private $_route;  								            // 设置路由
    private $_rightButtonList       = [];          				// 表格右侧操作按钮组
    private $_topButtonList 	    = [];    					// 顶部工具栏按钮组
    private $_view                  = 'Builder.builder';        // 公共视图
    private $_template		        = 'Builder.tablesBuilder';  // 模版

    /**
     * [__construct 初始化]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-11T17:13:23+0800
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
     * 加入一个列表顶部工具栏按钮
     * 在使用预置的几种按钮时，比如我想改变新增按钮的名称
     * 那么只需要$builder->addTopButton('add', array('title' => '换个马甲'))
     * 如果想改变地址甚至新增一个属性用上面类似的定义方法
     * @param string $type 按钮类型，主要有add/resume/forbid/recycle/restore/delete/self七几种取值
     * @param array  $attr 按钮属性，一个定了标题/链接/CSS类名等的属性描述数组
     * @return $this
     * @author jry <598821125@qq.com>
     */
    /**
     * [addTopButton 加入一个列表顶部工具栏按钮]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-10T08:49:27+0800
     * @param    [type]                   $type           [description]
     * @param    [type]                   $buttonProperty [description]
     */
    public function addTopButton($type, $buttonProperty = null) {
        switch ($type) {
            case 'addnew':  // 添加新增按钮
                // 预定义按钮属性以简化使用
                $button['title'] = '新增';
                $button['icon']  = '<i class="fa fa-plus"></i>';
                $button['class'] = 'btn blue-madison';
                $button['href']  = route($this->_route.'.add');

                /**
                * 如果定义了属性数组则与默认的进行合并
                * 用户定义的同名数组元素会覆盖默认的值
                * 比如$builder->addTopButton('add', array('title' => '换个马甲'))
                * '换个马甲'这个碧池就会使用山东龙潭寺的十二路谭腿第十一式“风摆荷叶腿”
                * 把'新增'踢走自己霸占title这个位置，其它的属性同样道理
                */
                if ($buttonProperty && is_array($buttonProperty)) {
                    $button = array_merge($button, $buttonProperty);
                }

                // 这个按钮定义好了把它丢进按钮池里
                $this->_topButtonList[] = $button;
                break;
            case 'resume':  // 添加启用按钮(禁用的反操作)
                //预定义按钮属性以简化使用
                $button['title'] = '启用';
                $button['icon']  = '<i class="fa fa-check"></i>';
                $button['target-form'] = $this->_tableDataListKey;
                $button['class'] = 'btn green-meadow ajax-post confirm';
                $button['href']  = route($this->_route.'.status', ['status' => 'resume']);

                // 如果定义了属性数组则与默认的进行合并，详细使用方法参考上面的新增按钮
                if ($buttonProperty && is_array($buttonProperty)) {
                    $button = array_merge($button, $buttonProperty);
                }

                // 这个按钮定义好了把它丢进按钮池里
                $this->_topButtonList[] = $button;
                break;
            case 'forbid':  // 添加禁用按钮(启用的反操作)
                // 预定义按钮属性以简化使用
                $button['title'] = '禁用';
                $button['icon']  = '<i class="fa fa-ban"></i>';
                $button['target-form'] = $this->_tableDataListKey;
                $button['class'] = 'btn yellow-crusta ajax-post confirm';
                $button['href']  = route($this->_route.'.status', ['status' => 'forbid']);

                // 如果定义了属性数组则与默认的进行合并，详细使用方法参考上面的新增按钮
                if ($buttonProperty && is_array($buttonProperty)) {
                    $button = array_merge($button, $buttonProperty);
                }

                //这个按钮定义好了把它丢进按钮池里
                $this->_topButtonList[] = $button;
                break;
            case 'recycle':  // 添加回收按钮(还原的反操作)
                // 预定义按钮属性以简化使用
                $button['title'] = '回收';
                $button['icon']  = '<i class="fa fa-trash"></i>';
                $button['target-form'] = $this->_tableDataListKey;
                $button['class'] = 'btn grey-cascade ajax-post confirm';
                $button['href']  = route($this->_route.'.status', ['status' => 'recycle']);

                // 如果定义了属性数组则与默认的进行合并，详细使用方法参考上面的新增按钮
                if ($buttonProperty && is_array($buttonProperty)) {
                    $button = array_merge($button, $buttonProperty);
                }

                // 这个按钮定义好了把它丢进按钮池里
                $this->_topButtonList[] = $button;
                break;
            case 'restore':  // 添加还原按钮(回收的反操作)
                // 预定义按钮属性以简化使用
                $button['title'] = '还原';
                $button['icon']  = '<i class="fa fa-refresh"></i>';
                $button['target-form'] = $this->_tableDataListKey;
                $button['class'] = 'btn purple-plum ajax-post confirm';
                $button['href']  = route($this->_route.'.status', ['status' => 'restore']);

                // 如果定义了属性数组则与默认的进行合并，详细使用方法参考上面的新增按钮
                if ($buttonProperty && is_array($buttonProperty)) {
                    $button = array_merge($button, $buttonProperty);
                }

                // 这个按钮定义好了把它丢进按钮池里
                $this->_topButtonList[] = $button;
                break;
            case 'delete': // 添加删除按钮(我没有反操作，删除了就没有了，就真的找不回来了)
                // 预定义按钮属性以简化使用
                $button['title'] = '删除';
                $button['icon']  = '<i class="fa fa-trash"></i>';
                $button['target-form'] = $this->_tableDataListKey;
                $button['class'] = 'btn red-sunglo ajax-post confirm';
                $button['href']  = route($this->_route.'.status', ['status' => 'delete']);

                // 如果定义了属性数组则与默认的进行合并，详细使用方法参考上面的新增按钮
                if ($buttonProperty && is_array($buttonProperty)) {
                    $button = array_merge($button, $buttonProperty);
                }

                // 这个按钮定义好了把它丢进按钮池里
                $this->_topButtonList[] = $button;
                break;
            case 'self': //添加自定义按钮(第一原则使用上面预设的按钮，如果有特殊需求不能满足则使用此自定义按钮方法)
                // 预定义按钮属性以简化使用
                $button['target-form'] = $this->_tableDataListKey;
                $button['class'] = 'btn btn-danger';

                // 如果定义了属性数组则与默认的进行合并
                if ($buttonProperty && is_array($buttonProperty)) {
                    $button = array_merge($button, $buttonProperty);
                } else {
                    $button['title'] = '该自定义按钮未配置属性';
                }

                // 这个按钮定义好了把它丢进按钮池里
                $this->_topButtonList[] = $button;
                break;
        }
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
    public function setRoute($route) 
    {
        $this->_route = $route;
        return $this;
    }
    /**
     * [addTableColumn 增加一个表格标题列]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-05T17:06:44+0800
     * @param    [type]                   $name          [表格列字段名称]
     * @param    [type]                   $title         [表格列标题]
     * @param    [type]                   $type          [表格列类型]
     * @param    [type]                   $param         [表格列参数]
     */
    public function addTableColumn($name, $title, $type = null, $param = null) {
        $column = array(
            'name'  => $name,
            'title' => $title,
            'type'  => $type,
            'param' => $param,
        );
        $this->_tableColumnList[] = $column;
        return $this;
    }
    /**
     * [setSearch 设置搜索参数]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-05T17:16:31+0800
     * @param    [type]                   $title         [搜索框默认值]
     * @param    [type]                   $url           [搜索框路由名称]
     */
    public function setSearch($title, $route) {
        $this->_search = array('title' => $title, 'route' => $route);
        return $this;
    }
    /**
     * [setTableDataList 设置表格数据列表]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-05T17:14:05+0800
     * @param    [type]                   $tableDataList [表格数据对象传入]
     */
    public function setTableObject($tableObject) {
        $this->_tableDataList = $tableObject->toArray();//转化为数组
        return $this;
    }
    /**
     * [setTableArray 设置表格数据列表]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-09T11:40:51+0800
     * @param    [type]                   $tableArray    [表格数据数组传入]
     */
    public function setTableArray($tableArray) {
        $this->_tableDataList = $tableArray;//转化为数组
        return $this;
    }
    /**
     * [setTableDataListKey 设置表格数据列表的主键名称]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-05T17:15:22+0800
     * @param    [type]                   $tableDataListKey [表格数据列表的主键名称]
     */
    public function setTableDataListKey($tableDataListKey) {
        $this->_tableDataListKey = $tableDataListKey;
        return $this;
    }
    /**
     * [addRightButton 加入一个数据列表右侧按钮]
     * 加入一个数据列表右侧按钮
     * 在使用预置的几种按钮时，比如我想改变编辑按钮的名称
     * 那么只需要$builder->addRightpButton('edit', array('title' => '换个马甲'))
     * 如果想改变地址甚至新增一个属性用上面类似的定义方法
     * 因为添加右侧按钮的时候你并没有办法知道数据ID，于是我们采用__data_id__作为约定的标记
     * __data_id__会在display方法里自动替换成数据的真实ID
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-07T10:49:14+0800
     * @param    [type]                   $type          [按钮类型，edit/forbid/recycle/restore/delete/self六种取值]
     * @param    [type]                   $buttonProperty     [按钮属性，一个定了标题/链接/CSS类名等的属性描述数组]
     */
    public function addRightButton($type, $buttonProperty = null) {
        switch ($type) {
            case 'edit':  // 编辑按钮
                // 预定义按钮属性以简化使用
                $button['title'] = '编辑';
                $button['icon']  = '<i class="fa fa-edit"></i>';
                $button['class'] = 'btn btn-xs blue-madison';
                /**
                 * [$this->_tableDataListKey 路由设置规则]
                 * 例：Route::get ('/config/edit/{id}' , 'ConfigController@edit'               )->name('adminConfig.edit');
                 * 其中{id} 为传参 adminConfig.edit 为路由总名名称 其中adminConfig 为路由名称前缀
                 * 例：
                 * adminConfig.edit
                 * adminConfig.status
                 * @var string 获取路由编译后的URL
                 */
                $button['href']  = route($this->_route.'.edit', [$this->_tableDataListKey => '__dataId__']);

                // 如果定义了属性数组则与默认的进行合并，详细使用方法参考上面的顶部按钮
                /**
                * 如果定义了属性数组则与默认的进行合并
                * 用户定义的同名数组元素会覆盖默认的值
                * 比如$builder->addRightButton('edit', array('title' => '换个马甲'))
                * '换个马甲'这个碧池就会使用山东龙潭寺的十二路谭腿第十一式“风摆荷叶腿”
                * 把'新增'踢走自己霸占title这个位置，其它的属性同样道理
                */
                if ($buttonProperty && is_array($buttonProperty)) {
                    $button = array_merge($Button, $buttonProperty);
                }
                // 这个按钮定义好了把它丢进按钮池里
                $this->_rightButtonList[] = $button;
                break;
            case 'forbid':  // 改变记录状态按钮，会更具数据当前的状态自动选择应该显示启用/禁用
                //预定义按钮属
                $button['type'] = 'forbid';
                $button['0']['title'] = '启用';
                $button['0']['icon']  = '<i class="fa fa-check"></i>';
                $button['0']['class'] = 'btn btn-xs green-meadow ajax-get confirm';
                $button['0']['href']  = route($this->_route.'.status', ['status' => 'resume',$this->_tableDataListKey => '__dataId__']);

                $button['1']['title'] = '禁用';
                $button['1']['icon']  = '<i class="fa fa-ban"></i>';
                $button['1']['class'] = 'btn btn-xs yellow-crusta ajax-get confirm';
                $button['1']['href']  = route($this->_route.'.status', ['status' => 'forbid',$this->_tableDataListKey => '__dataId__']);

                // 这个按钮定义好了把它丢进按钮池里
                $this->_rightButtonList[] = $button;
                break;
            case 'hide':  // 改变记录状态按钮，会更具数据当前的状态自动选择应该显示隐藏/显示
                // 预定义按钮属
                $button['type'] = 'hide';
                $button['2']['title'] = '显示';
                $button['2']['icon']  = '<i class="fa fa-check"></i>';
                $button['2']['class'] = 'btn btn-xs green-meadow ajax-get confirm';
                $button['2']['href']  = route($this->_route.'.status', ['status' => 'show',$this->_tableDataListKey => '__dataId__']);

                $button['1']['title'] = '隐藏';
                $button['1']['icon']  = '<i class="fa fa-slash"></i>';
                $button['1']['class'] = 'btn btn-xs grey-cascade ajax-get confirm';
                $button['1']['href']  = route($this->_route.'.status', ['status' => 'hide',$this->_tableDataListKey => '__dataId__']);

                // 这个按钮定义好了把它丢进按钮池里
                $this->_rightButtonList[] = $button;
                break;
            case 'recycle':
                // 预定义按钮属性以简化使用
                $button['title'] = '回收';
                $button['icon']  = '<i class="fa fa-trash"></i>';
                $button['class'] = 'btn btn-xs grey-cascade ajax-get confirm';
                $button['href']  = route($this->_route.'.status', ['status' => 'recycle',$this->_tableDataListKey => '__dataId__']);

                // 如果定义了属性数组则与默认的进行合并，详细使用方法参考上面的顶部按钮
                if ($buttonProperty && is_array($buttonProperty)) {
                    $button = array_merge($button, $buttonProperty);
                }

                // 这个按钮定义好了把它丢进按钮池里
                $this->_rightButtonList[] = $button;
                break;
            case 'restore':
                // 预定义按钮属性以简化使用
                $button['title'] = '还原';
                $button['icon']  = '<i class="fa fa-refresh"></i>';
                $button['class'] = 'btn btn-xs purple-plum ajax-get confirm';
                $button['href']  = route($this->_route.'.status', ['status' => 'restore',$this->_tableDataListKey => '__dataId__']);

                // 如果定义了属性数组则与默认的进行合并，详细使用方法参考上面的顶部按钮
                if ($buttonProperty && is_array($buttonProperty)) {
                    $button = array_merge($button, $buttonProperty);
                }

                // 这个按钮定义好了把它丢进按钮池里
                $this->_rightButtonList[] = $button;
                break;
            case 'delete':
                // 预定义按钮属性以简化使用
                $button['title'] = '删除';
                $button['icon']  = '<i class="fa fa-trash"></i>';
                $button['class'] = 'btn btn-xs red-sunglo ajax-get confirm';
                $button['href']  = route($this->_route.'.status', ['status' => 'delete',$this->_tableDataListKey => '__dataId__']);

                // 如果定义了属性数组则与默认的进行合并，详细使用方法参考上面的顶部按钮
                if ($buttonProperty && is_array($buttonProperty)) {
                    $button = array_merge($button, $buttonProperty);
                }

                // 这个按钮定义好了把它丢进按钮池里
                $this->_rightButtonList[] = $button;
                break;
            case 'self':
                // 预定义按钮属性以简化使用
                $button['class'] = 'btn btn-xs btn-default';

                // 如果定义了属性数组则与默认的进行合并
                if ($buttonProperty && is_array($buttonProperty)) {
                    $button = array_merge($button, $buttonProperty);
                } else {
                    $button['title'] = '该自定义按钮未配置属性';
                }

                // 这个按钮定义好了把它丢进按钮池里
                $this->_rightButtonList[] = $button;
                break;
        }
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
     * [compileTableData 对表格数据进行编译]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-07T10:58:04+0800
     * @return   [type]                   [description]
     */
    protected function compileTableData(){
        $this->compileRightButton();//编译右侧按钮列表数据
        $this->compileTableColumnType();//根据表格标题字段指定类型编译列表数据

        //编译top_button_list中的HTML属性
        if ($this->_topButtonList) {
            foreach ($this->_topButtonList as &$button) {
                $button['attribute'] = $this->compileHtmlAttr($button);
            }
        }
    }
    /**
     * [compileTableColumnType 根据表格标题字段指定类型编译列表数据]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-07T10:02:07+0800
     * @param    [type]                   $tableArray    [编译前的数组]
     * @return   [type]                                  [编译后的数组]
     */
    protected function compileTableColumnType()
    {
        foreach ($this->_tableDataList as &$tableData) {
            // 根据表格标题字段指定类型编译列表数据
            foreach ($this->_tableColumnList as &$column) {
                switch ($column['type']) {
                    case 'status':
                        switch($tableData[$column['name']]){
                            case '-1':
                                $tableData[$column['name']] = '<span class="label label-sm label-danger" title="删除"><i class="fa fa-trash"></i> 删除 </span>';
                                break;
                            case '0':
                                $tableData[$column['name']] = '<span class="label label-sm label-warning" title="禁用"><i class="fa fa-ban"></i> 禁用 </span>';
                                break;
                            case '1':
                                $tableData[$column['name']] = '<span class="label label-sm label-success" title="正常"><i class="fa fa-check"></i> 正常 </span>';
                                break;
                            case '2':
                                $tableData[$column['name']] = '<span class="label label-sm label-warning" title="隐藏"><i class="fa fa-eye-slash"></i> 隐藏 </span>';
                                break;
                        }
                        break;
                    case 'btn':
                        $tableData[$column['name']] = $tableData['rightButton'];
                        break;
                    case 'byte':
                        $tableData[$column['name']] = bytesFormat($tableData[$column['name']]);
                        break;
                    case 'icon':
                        $tableData[$column['name']] = '<i class="fa '.$tableData[$column['name']].'"></i>';
                        break;
                    case 'date':
                        $tableData[$column['name']] = timeFormat($tableData[$column['name']], 'Y-m-d');
                        break;
                    case 'dateTime':
                        $tableData[$column['name']] = timeFormat($tableData[$column['name']], 'Y-m-d H:i');
                        break;
                    case 'time':
                        $tableData[$column['name']] = timeFormat($tableData[$column['name']], 'H:i:s');
                        break;
                    case 'pictureId':
                        $tableData[$column['name']] = '<img class="picture" src="'.getUploadUrl($tableData[$column['name']]).'">';
                        break;
                    case 'picture':
                        $tableData[$column['name']] = '<img class="picture" src="'.$tableData[$column['name']].'">';
                        break;
                }
            }
        }
    }

    /**
     * [compileRightButton 编译表格右侧按钮]
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-15T17:00:30+0800
     * @return   [type]                   [description]
     */
    protected function compileRightButton()
    {
        foreach ($this->_tableDataList as &$tableData) {
            $tableData['rightButton'] = null;
            if ($this->_rightButtonList) {
                foreach ($this->_rightButtonList as $rightButton) {
                    // 禁用按钮与隐藏比较特殊，它需要根据数据当前状态判断是显示禁用还是启用
                    if (@$rightButton['type'] === 'forbid' || @$rightButton['type'] === 'hide'){
                        $rightButton = $rightButton[$tableData['status']];
                    }
                    // 将约定的标记__dataId__替换成真实的数据ID
                    $rightButton['href'] = preg_replace(
                        '/__dataId__/i',
                        $tableData[$this->_tableDataListKey],
                        $rightButton['href']
                    );
                    // 编译按钮属性
                    $rightButton['attribute'] = $this->compileHtmlAttr($rightButton);
                    $tableData['rightButton'] .= '<a '.$rightButton['attribute']
                                          .'>'.$rightButton['icon'].' '.$rightButton['title'].'</a> ';
                }
            }
        }
    }
    protected function compileHtmlAttr($attr) {
        $result = array();
        foreach ($attr as $key => $value) {
            $value = htmlspecialchars($value);
            $result[] = "$key=\"$value\"";
        }
        $result = implode(' ', $result);
        return $result;
    }
    /**
     * 获取整理后的视图数据
     * @author BigRocs <bigrocs@qq.com>
     * @date   2016-05-08T14:10:07+0800
     * @return [type]                   [description]
     */
    public function getData() 
    {
        $this->compileTableData();//对表格数据进行编译
    	return	[
    				'metaTitle'         => $this->_metaTitle,		        //页面标题
    				'tabNav'	        => $this->_tabNav,     		        //页面Tab导航
                    'route'             => $this->_route,                   //页面提交路由
                    'topButtonList'     => $this->_topButtonList,           //顶部工具栏按钮
                    'tableColumnList'   => $this->_tableColumnList,         //表格的列
    				'tableDataList'	    => $this->_tableDataList,           //表格数据
                    'tableDataListKey'  => $this->_tableDataListKey,        //表格数据主键字段名称
                    'rightButtonList'   => $this->_rightButtonList,         //表格数据列表重新修改的项目
                    'view'              => $this->_view,                    //公共视图
    				'template'	        => $this->_template,		        //视图模板
    			];
    }
}

?>