<case value="files">
    <div class="form-group item_{$[type]form.name} {$[type]form.extra_class}">
        <label class="left control-label">{$[type]form.title}：</label>
        <div class="right row">
            <div  id="[type]{$group_k}_upload_box_{$[type]k}" class="wu-example">
                <!--用来存放文件信息-->
                <div id="[type]{$group_k}_upload_list_{$[type]k}" class="uploader-list col-xs-12">
                    <ul class="list-group file-box">
                        <notempty name="[type]form.value">
                            <?php
                                if (is_array($[type]form['value'])) {
                                    $files = $[type]form['value'];
                                    $input_value = implode(',', $[type]form['value']);
                                } else {
                                    $files = explode(',', $[type]form['value']);
                                    $input_value = $[type]form['value'];
                                }
                            ?>
                            <foreach name="files" item="file">
                                <li class="list-group-item file-item" data-id="{$file}">
                                    <i class="fa fa-file"></i>
                                    <span>{$file|get_upload_info='name'}</span>
                                    <i class="fa fa-times-circle pull-right remove-file"></i>
                                </li>
                            </foreach>
                        </notempty>
                    </ul>
                </div>
                <div class="btns col-xs-12">
                    <input type="hidden" id="[type]{$group_k}_upload_input_{$[type]k}" name="{$[type]form.name}" value="{$input_value}">
                    <div id="[type]{$group_k}_upload_{$[type]k}">上传多文件</div>
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
                        fileNumLimit: 20,                                                              // 验证文件总数量, 超出则不允许加入队列
                        fileSingleSizeLimit:<php> echo C('UPLOAD_FILE_SIZE') ? : 2; </php>*1024*1024,  // 验证单个文件大小是否超出限制, 超出则不允许加入队列
                        // 文件过滤
                        accept: {
                            title: 'Files',
                            extensions: 'doc,docx,xls,xlsx,ppt,pptx,pdf,wps,txt,zip,rar,gz,bz2,7z'
                        }
                    });

                    // 当有文件添加进来的时候
                    uploader_[type]{$group_k}_upload_{$[type]k}.on( 'fileQueued', function( file ) {
                        var $li = $(
                                '<li id="' + file.id + '" class="list-group-item file-item">' +
                                    '<i class="fa fa-file"></i>' +
                                    '<span>' + file.name + '</span>' +
                                    '<i class="fa fa-times-circle pull-right remove-file"></i>' +
                                '</li>'
                                );

                        // $list为容器jQuery实例
                        $('#[type]{$group_k}_upload_list_{$[type]k} ul.list-group').append( $li );
                    });

                    // 文件上传过程中创建进度条实时显示。
                    uploader_[type]{$group_k}_upload_{$[type]k}.on( 'uploadProgress', function( file, percentage ) {
                        var $li = $( '#'+file.id ),
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
                        $( '#'+file.id ).find('.progress').remove();
                    });

                    // 文件上传成功，给item添加成功class, 用样式标记上传成功。
                    uploader_[type]{$group_k}_upload_{$[type]k}.on( 'uploadSuccess', function( file , response) {
                        $( '#'+file.id ).addClass('upload-state-done');
                        if(response.status == 1){
                            $( '#'+file.id ).attr('data-id', response.id);
                            var input = $( '#[type]{$group_k}_upload_input_{$[type]k}' );
                            if (input.val()) {
                                input.val(input.val() + ',' + response.id);
                            } else {
                                input.val(response.id);
                            }
                        } else {
                            $.alertMessager('错误：' + response.info);
                            $( '#'+file.id ).remove();
                        }
                    });

                    // 文件上传失败，显示上传出错。
                    uploader_[type]{$group_k}_upload_{$[type]k}.on( 'uploadError', function( file ) {
                        $.alertMessager('error');
                        var $li = $( '#'+file.id ),
                            $error = $li.find('div.error');
                        // 避免重复创建
                        if ( !$error.length ) {
                            $error = $('<div class="error"></div>').appendTo( $li );
                        }
                        $error.text('上传失败');
                    });

                    // 删除文件
                    $(document).on('click', '#[type]{$group_k}_upload_list_{$[type]k} .remove-file', function() {
                        var ready_for_remove_id = $(this).closest('.file-item').attr('data-id'); //获取待删除的文件ID
                        if (!ready_for_remove_id) {
                            $.alertMessager('错误', 'danger');
                        }
                        var current_file_ids = $('#[type]{$group_k}_upload_input_{$[type]k}').val().split(","); //获取当前文件列表以逗号分隔的ID并转换成数组
                        current_file_ids.remove(ready_for_remove_id); //从数组中删除待删除的文件ID
                        $('#[type]{$group_k}_upload_input_{$[type]k}').val(current_file_ids.join(',')) //删除后覆盖原input的值
                        $(this).closest('.file-item').remove(); //删除文件预览
                    });
                });
            </script>
        </div>
    </div>
</case>
