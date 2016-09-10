<case value="date">
    <div class="form-group item_{$[type]form.name} {$[type]form.extra_class}">
        <label class="left control-label">{$[type]form.title}：</label>
        <div class="right">
            <input type="text" id="[type]{$group_k}_date_{$[type]k}" class="form-control input date" name="{$[type]form.name}" value="<notempty name='[type]form.value'>{$[type]form.value|time_format='Y-m-d'}</notempty>" {$[type]form.extra_attr}>
            <script type="text/javascript">
                $(function(){
                    $('#[type]{$group_k}_date_{$[type]k}').datetimepicker({
                        format      : 'yyyy-mm-dd',
                        autoclose   : true,
                        minView     : 'month',
                        todayBtn    : 'linked',
                        language    : 'zh-CN',
                        fontAwesome : true
                    });
                });
            </script>
        </div>
    </div>
</case>
