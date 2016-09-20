                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label>{{ $Item['title'] }}:</label>
                                                </div>
                                                <div id="upload_box_{{ $Item['id'] }}" class="col-md-12">
                                                    @if (is_numeric($Item['value']))
                                                    <div class="alert thumbnail col-lg-2 col-md-3 col-sm-4 col-xs-6" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <img src="{{ getUploadUrl($Item['value']) }}">
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 col-sm-8 col-xs-12">
                                                    <input type="hidden" name="{{ $Item['name'] }}" value="{{ $Item['value'] }}">
                                                    <a class="btn btn-info imageUpload" data-toggle="modal" href="#basic_{{ $Item['id'] }}" data-id="{{ $Item['id'] }}"><i class="fa fa-upload"></i> 上传图片</a>
                                                </div>
                                                <div class="col-md-6 col-sm-8 col-xs-12">
                                                    @if(!empty($Item['tip']))
                                                    <span class="check-tips small">{{ $Item['tip'] }}</span>
                                                    @endif
                                                </div>
                                                <div class="modal fade" id="basic_{{ $Item['id'] }}" tabindex="-1" role="basic_{{ $Item['id'] }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                <h4 class="modal-title"><i class="fa fa-picture-o"></i> 图片设置</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="nav-tabs-custom">
                                                                    <ul class="nav nav-tabs ">
                                                                            <li class="active">
                                                                                <a href="#tab_img_1_{{ $Item['id'] }}" data-toggle="tab"><i class="fa fa-cloud-upload"></i>  本地上传 </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#tab_img_2_{{ $Item['id'] }}" data-toggle="tab"><i class="fa fa-cloud"></i>  图片空间 </a>
                                                                            </li>
                                                                    </ul>
                                                                    <div class="tab-content">
                                                                            <div class="tab-pane active" id="tab_img_1_{{ $Item['id'] }}">
                                                                                <div class="dropzone dropzone-file-area" id="uploadDropzone_{{ $Item['id'] }}" style="min-height:0px;margin:0;">
                                                                                    <div class="dz-message needsclick">
                                                                                        <p><i class="fa fa-upload"></i> 上传图片(支持拖拽)</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane" id="tab_img_2_{{ $Item['id'] }}">
                                                                                <div class="builder-data-empty text-center">
                                                                                    <div class="empty-info">
                                                                                        <i class="fa fa-database"></i> 暂时没有数据(暂未开发)<br>
                                                                                        <span class="small">本系统由 <a href="{:C('WEBSITE_DOMAIN')}" class="text-muted" target="_blank">{:C('PRODUCT_NAME')}</a> v{:C('CURRENT_VERSION')} 强力驱动</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline sbold blue" data-dismiss="modal">确定</button>
                                                                <button type="button" class="btn btn-outline sbold red" data-dismiss="modal">取消</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        <script type="text/javascript">
                $("#uploadDropzone_{{ $Item['id'] }}").dropzone({
                    url: "{{ route('admin.upload') }}",
                    maxFilesize: {{ config('adminConfig.ADMIN_PAGE_ROWS') }}, {{-- // MB --}}
                    acceptedFiles: ".jpg,.jpeg,.png,.gif,.bmp",
                    addRemoveLinks: true,
                    clickable: true,
                    autoProcessQueue: true, {{-- //关闭自动上传, 手动调度 --}}
                    uploadMultiple: false,
                    parallelUploads: 10, {{-- //最大并行处理量 --}}
                    maxFiles: 1, {{-- //最大上传数量 --}}
                    headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}"},
                    {{-- //插件消息翻译 --}}
                    dictInvalidFileType: '上传图片格式错误',
                    dictFileTooBig: '图片超出最大2M约束',
                    dictMaxFilesExceeded: '超出最大上传数量',
                    dictCancelUpload: '取消上传',
                    dictRemoveFile: '去除文件',
                    dictCancelUploadConfirmation: '确认取消上传',

                    {{-- //监听 --}}
                    init: function() {
                        this.on("success", function(file,data) {
                            {{-- //改变显示图片 --}}
                            var $imgHtml = $(
                                    '<div id="upload_box_{{ $Item['id'] }}" class="col-xs-12">'+
                                        '<div class="alert thumbnail col-lg-2 col-md-3 col-sm-4 col-xs-6" role="alert">' +
                                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
                                            '<img src="'+data.uploadData.url+'">'+
                                        '</div>'+
                                    '</div>'
                                );
                            $("#upload_box_{{ $Item['id'] }}").replaceWith( $imgHtml );
                            {{-- //改变from表单图片ID --}}
                            $("input[name='{{ $Item['name'] }}']").val(data.uploadData.id);
                        });
                    }
                });
        </script>
