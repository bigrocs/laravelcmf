<case value="board">
    <div class="form-group item_{$[type]form.name} {$[type]form.extra_class}">
        <label class="left control-label">{$[type]form.title}：</label>
        <div class="right">
            <input type="hidden" name="{$[type]form.name}" value='{$[type]form.value}'>
            <div class="row board_list boards_{$[type]k}" {$[type]form.extra_attr}>
                <div class="container-fluid">
                    <foreach name="form.options" item="option" key="option_key">
                        <div class="panel panel-default board col-xs-12 col-sm-3" data-id="{$option_key}">
                            <div class="panel-heading">
                                <strong>{$option.title}</strong>
                            </div>
                            <div class="list-group dragsort_{$[type]k}" data-group="{$option_key}">
                                <foreach name="option.field" item="option_field" key="option_field_key">
                                    <div class="list-group-item">
                                        <em data="{$field['id']}">{$option_field}</em>
                                        <input type="hidden" name="{$[type]form.name}[{$option_key}][]" value="{$option_field_key}"/>
                                    </div>
                                </foreach>
                            </div>
                        </div>
                    </foreach>
                </div>
            </div>
            <script type="text/javascript">
                //拖曳插件初始化
                $(function(){
                    $(".dragsort_{$[type]k}").dragsort({
                         dragSelector:'div',
                         placeHolderTemplate: '<div class="clearfix draging-place">&nbsp;</div>',
                         dragBetween:true, //允许拖动到任意地方
                         dragEnd:function(){
                             var self = $(this);
                             self.find('input').attr('name', '{$[type]form.name}[' + self.closest('.dragsort_{$[type]k}').data('group') + '][]');
                         }
                     });
                });
            </script>
            <notempty name="[type]form.tip">
                <span class="check-tips small">{$[type]form.tip}</span>
            </notempty>
        </div>
    </div>
</case>
