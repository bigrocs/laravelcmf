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
                                                    <a class="btn btn-info imageUpload" data-toggle="modal" href="#basic_{{ $Item['id'] }}" data-id="{{ $Item['id'] }}"
                                                        id="uploadDropzone"
                                                        dropzoneName="{{ $Item['name'] }}"
                                                        dropzoneId="{{ $Item['id'] }}"
                                                        dropzoneMaxFiles= "1"
                                                        dropzoneUrl="{{ route('admin.upload') }}"
                                                        dropzoneMaxFilesize="{{ config('adminConfig.ADMIN_PAGE_ROWS') }}"
                                                        dropzoneCsrfToken="{{ csrf_token() }}">
                                                        <i class="fa fa-upload"></i> 上传图片
                                                    </a>
                                                </div>
                                                <div class="col-md-6 col-sm-8 col-xs-12">
                                                    @if(!empty($Item['tip']))
                                                    <span class="check-tips small">{{ $Item['tip'] }}</span>
                                                    @endif
                                                </div>
                                                <div class="modal fade" id="basic_{{ $Item['id'] }}" tabindex="-1" role="basic_{{ $Item['id'] }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="box box-info">
                                                            <div class="box-header with-border">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
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
                                                                                <div class="dropzone dropzone-file-area" style="min-height:0px;margin:0;">
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
                                                                <button type="button" class="btn btn-info" data-dismiss="modal">确定</button>
                                                                <button type="button" class="btn btn-warning" data-dismiss="modal">取消</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
