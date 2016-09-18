@include('Builder.formPublic.formCss')
                                                    @if (!empty($formItems))
                                                    <div class="tab-pane active">
                                                    {!! Form::open(array('route'=>$postRoute,'method'=>'post','class'=>'form-horizontal form form-builder')) !!}
                                                        @foreach ($formItems as $Item)
                                                            {{-- BEGIN 根据样式加载不同from表单元素模板 --}}
                                                            @include('Builder.formPublic.FormType.'.$Item['type'])
                                                            {{-- END 根据样式加载不同from表单元素模板 --}}
                                                        @endforeach
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-8">
                                                                <div class="btn-group btn-group-justified">
                                                                    <div class="btn-group">
                                                                        <button type="submit" class="btn btn-info ajax-post" target-form="form-builder">确定</button>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <button type="submit" class="btn btn-warning" onclick="javascript:history.back(-1);return false;">返回</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    {!! Form::close() !!}
                                                    </div>
                                                    @else
                                                    <div class="tab-pane active builder-data-empty text-center">
                                                        <div class="empty-info">
                                                            <i class="fa fa-database"></i> 暂时没有数据<br>
                                                            <span class="small">本系统由 <a href="{{ config('config.websiteDomain') }}" class="text-muted" target="_blank">{{ config('config.productName') }}</a> v{{ config('config.version') }} 强力驱动</span>
                                                        </div>
                                                    </div>
                                                    @endif
@include('Builder.formPublic.formJs')
