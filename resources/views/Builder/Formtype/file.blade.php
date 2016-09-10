<case value="file">
    <div class="form-group item_{$[type]form.name} {$[type]form.extra_class}">
        <label class="left control-label">{$[type]form.title}：</label>
        <div class="right row">
            <div  id="[type]{$group_k}_upload_box_{$[type]k}" class="wu-example">
                <!--用来存放文件信息-->
                <div id="[type]{$group_k}_upload_list_{$[type]k}" class="uploader-list col-xs-12">
                    <notempty name="[type]form.value">
                        <div id="[type]{$group_k}_upload_preview_{$[type]k}">
                            <ul class="list-group file-box">
                                <notempty name="[type]form.value">
                                    <li class="list-group-item file-item" data-id="{$[type]form.value}">
                                        <i class="fa fa-file"></i> 
                                        <span>{$[type]form.value|get_upload_info='name'}</span>
                                        <i class="fa fa-times-circle remove-file"></i>
                                    </li>
                                </notempty>
                            </ul>
                        </div>
                    <else />
                        <div id="[type]{$group_k}_upload_preview_{$[type]k}" class="hidden">
                            <ul class="list-group file-box">
                                <li class="list-group-item file-item" data-id="{$[type]form.value}">
                                    <i class="fa fa-file"></i> 
                                    <span></span>
                                    <i class="fa fa-times-circle pull-right remove-file"></i>
                                </li>
                            </ul>
                        </div>
                    </notempty>
                </div>
                <div class="btns col-xs-12">
                    <input type="hidden" id="[type]{$group_k}_upload_input_{$[type]k}" name="{$[type]form.name}" value="{$[type]form.value}">
                    <div id="[type]{$group_k}_upload_{$[type]k}">上传文件</div>
                    <button id="ctlBtn" class="btn btn-default hidden">开始上传</button>
                    <notempty name="[type]form.tip">
                        <span class="check-tips text-muted small">{$[type]form.tip}</span>
                    </notempty>
                </div>
            </div>

            <script type="text/javascript">
                $(function(){
                    var uploader_[type]{$group_k}_upload_{$[type]k} = WebUploader.create({
                        auto: true,                                                                    // 选完文件后，是否自动上传
                        duplicate: true,                                                               // 同一文件是否可以重复上传
                        swf: '__CUI__/swf/uploader.swf',                                               // swf文件路径
                        server: '{:U(MODULE_MARK."/Upload/upload", array("dir" => "file"))}',     // 文件接收服务端
                        pick: '#[type]{$group_k}_upload_{$[type]k}',                                   // 选择文件的按钮
                        resize: false,                                                                 // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
                        //fileNumLimit: 1,                                                             // 验证文件总数量, 超出则不允许加入队列
                        fileSingleSizeLimit:<php> echo C('UPLOAD_FILE_SIZE') ? : 2; </php>*1024*1024,  // 验证单个文件大小是否超出限制, 超出则不允许加入队列
                        // 文件过滤
                        accept: {
                            title: 'Files',
                            extensions: 'doc,docx,xls,xlsx,ppt,pptx,pdf,wps,txt,zip,rar,gz,bz2,7z'
                        }
                    });

                    // 文件上传过程中创建进度条实时显示。
                    uploader_[type]{$group_k}_upload_{$[type]k}.on( 'uploadProgress', function( file, percentage ) {
                        $( '#[type]{$group_k}_upload_preview_{$[type]k}').removeClass('hidden');
                        var $li = $( '#[type]{$group_k}_upload_preview_{$[type]k}'),
                            $percent = $li.find('.progress .progress-bar');
                        // 避免重复创建
                        if ( !$percent.length ) {
                            $percent = $('<div class="progress"><div class="progress-bar"></div></div>')
                                    .appendTo( $li )
                                    .find('.progress-bar');
                        }
                        $percent.css( 'width', percentage * 100 + '%' );
                    });

                    // 完成上传完了，成功或者失败，先删除进度条。
                    uploader_[type]{$group_k}_upload_{$[type]k}.on( 'uploadComplete', function( file ) {
                        $( '#[type]{$group_k}_upload_preview_{$[type]k}' ).find('.progress').remove();
                    });

                    // 文件上传成功，给item添加成功class, 用样式标记上传成功。
                    uploader_[type]{$group_k}_upload_{$[type]k}.on( 'uploadSuccess', function( file , response) {
                        $( '#[type]{$group_k}_upload_preview_{$[type]k}').addClass('upload-state-done');
                        if(eval('response').status == 0){
                            $.alertMessager(response.info);
                        } else {
                            $( '#[type]{$group_k}_upload_input_{$[type]k}' ).attr('value', response.id);
                            $( '#[type]{$group_k}_upload_preview_{$[type]k} span').text(response.name);
                        }
                    });

                    // 文件上传失败，显示上传出错。
                    uploader_[type]{$group_k}_upload_{$[type]k}.on( 'uploadError', function( file ) {
                        $.alertMessager('error');
                        var $li = $( '#[type]{$group_k}_upload_preview_{$[type]k}'),
                            $error = $li.find('div.error');
                        // 避免重复创建
                        if ( !$error.length ) {
                            $error = $('<div class="error"></div>').appendTo( $li );
                        }
                        $error.text('上传失败');
                    });

                    // 删除文件
                    $(document).on('click', '#[type]{$group_k}_upload_list_{$[type]k} .remove-file', function() {
                        $( '#[type]{$group_k}_upload_input_{$[type]k}' ).val('') //删除后覆盖原input的值为空
                        $( '#[type]{$group_k}_upload_preview_{$[type]k}').addClass('hidden');
                    });
                });
            </script>
        </div>
    </div>
</case>
