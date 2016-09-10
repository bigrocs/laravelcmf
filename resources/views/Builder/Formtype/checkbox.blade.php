<case value="checkbox">
    <!--
        如果选项的值是自定义数组(必须定义key为title的元素)需要解析，如果选项的值是常规字符串直接显示
        此处主要是用来给option定义更多的属性，比如data-ia=1，那么option应为
        $option = array('title' => 标题, 'data-id' => 1);
    -->
    <div class="form-group item_{$[type]form.name} {$[type]form.extra_class}">
        <label class="left control-label">{$[type]form.title}：</label>
        <div class="right">
            <foreach name="[type]form.options" item="option" key="option_key">
                <div class="checkbox-inline cui-control cui-checkbox">
                    <label class="checkbox-label">
                        <php>if(is_array($option)):</php>
                            <input type="checkbox" name="{$[type]form.name}[]" value="{$option_key}" <in name="option_key" value="$[type]form.value"> checked</in> {$[type]form.extra_attr}
                                <foreach name="option" item="option2" key="option_key2">
                                    {$option_key2}="{$option2}"
                                </foreach>>
                            <span class="cui-control-indicator"></span>
                            <span>{$option.title}</span>
                        <php>else:</php>
                            <input type="checkbox" name="{$[type]form.name}[]" value="{$option_key}" <in name="option_key" value="$[type]form.value"> checked</in> {$[type]form.extra_attr}>
                            <span class="cui-control-indicator"></span>
                            <span>{$option}</span>
                        <php>endif;</php>
                    </label>
                </div>
            </foreach>
        </div>
    </div>
</case>
