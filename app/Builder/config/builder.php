<?php
/**
 * Builder配置文件
 */
return [
    //表单类型
    'formItemType' => [
        'hidden'     => ['隐藏', 'varchar(32) NOT NULL'],
        'static'     => ['不可修改文本', 'varchar(128) NOT NULL'],
        'num'        => ['数字', 'int(11) UNSIGNED NOT NULL'],
        'price'      => ['价格', 'int(11) UNSIGNED NOT NULL'],
        'text'       => ['单行文本', 'varchar(128) NOT NULL'],
        'textarea'   => ['多行文本', 'varchar(256) NOT NULL'],
        'array'      => ['数组', 'varchar(32) NOT NULL'],
        'password'   => ['密码', 'varchar(64) NOT NULL'],
        'radio'      => ['单选按钮', 'varchar(32) NOT NULL'],
        'checkbox'   => ['复选框', 'varchar(32) NOT NULL'],
        'select'     => ['下拉框', 'varchar(32) NOT NULL'],
        'icon'       => ['字体图标', 'varchar(32) NOT NULL'],
        'date'       => ['日期', 'int(11) UNSIGNED NOT NULL'],
        'datetime'   => ['时间', 'int(11) UNSIGNED NOT NULL'],
        'picture'    => ['单张图片', 'int(11) UNSIGNED NOT NULL'],
        'pictures'   => ['多张图片', 'varchar(32) NOT NULL'],
        'file'       => ['单个文件', 'varchar(32) NOT NULL'],
        'files'      => ['多个文件', 'varchar(32) NOT NULL'],
        'kindeditor' => ['HTML编辑器 kindeditor', 'text'],
        'editormd'   => ['Markdown编辑器 editormd', 'text'],
        'tags'       => ['标签', 'varchar(128) NOT NULL'],
        'board  '    => ['拖动排序', 'varchar(256) NOT NULL']
    ]
];
