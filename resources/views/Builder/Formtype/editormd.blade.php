<case value="editormd">
    <div class="form-group item_{$[type]form.name} {$[type]form.extra_class}">
        <label class="left control-label">{$[type]form.title}：</label>
        <div class="right">
            <div name="{$[type]form.name}" id="[type]{$group_k}_markdown_{$[type]k}" class="form-control" {$[type]form.extra_attr}></div>
            <pre id="default_[type]{$group_k}_markdown_{$[type]k}" class="hidden">{$[type]form.value}</pre>

            <link rel="stylesheet" type="text/css" href="__PUBLIC__/libs/editormd/css/editormd.min.css">
            <script type="text/javascript" src="__PUBLIC__/libs/editormd/js/editormd.min.js"></script>

            <script type="text/javascript">
                $(function(){
                var editormd_[type]{$group_k}_markdown_{$[type]k}_content = $('#default_[type]{$group_k}_markdown_{$[type]k}').text();
                    var editormd_[type]{$group_k}_markdown_{$[type]k} = editormd({
                            id              : '[type]{$group_k}_markdown_{$[type]k}',
                            path            : '__PUBLIC__/libs/editormd/lib/',
                            pluginPath      : '__PUBLIC__/libs/editormd/plugins/',
                            name            : '{$[type]form.name}',
                            markdown        : editormd_[type]{$group_k}_markdown_{$[type]k}_content,
                            imageUpload     : true,
                            imageFormats    : ["jpg", "jpeg", "gif", "png", "bmp"],
                            imageUploadURL  : '{:U(MODULE_MARK."/Upload/upload")}',
                            placeholder     : 'CoreThink让开发更轻松！',
                            width           : '100%',
                            height          : 640,
                            watch           : false,
                            codeFold        : true,
                            htmlDecode      : false,
                            taskList        : true,
                            emoji           : true,
                            flowChart       : true,
                            sequenceDiagram : true,
                            tex             : true
                        });
                });
            </script>
            <notempty name="[type]form.tip">
                <span class="check-tips small">{$[type]form.tip}</span>
            </notempty>
        </div>
    </div>
</case>
