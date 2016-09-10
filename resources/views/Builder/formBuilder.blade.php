@include('Builder.style')
                                                    @if (!empty($formItems))
                                                    <div class="portlet light bordered">
                                                    {!! Form::open(array('route'=>$postRoute,'method'=>'post','class'=>'form-horizontal form form-builder')) !!}
                                                        @foreach ($formItems as $Item)
                                                            {{-- BEGIN 根据样式加载不同from表单元素模板 --}}
                                                            @include('Builder.FormType.'.$Item['type'])
                                                            {{-- END 根据样式加载不同from表单元素模板 --}}
                                                        @endforeach
                                                        <div class="btn-group btn-group-lg btn-group-solid margin-bottom-10">
                                                            <button type="submit" class="btn red ajax-post" target-form="form-builder">确定</button>
                                                            <button type="button" class="btn green" onclick="javascript:history.back(-1);return false;">返回</button>
                                                        </div>
                                                    {!! Form::close() !!}
                                                    </div>
                                                    @else
                                                    <div class="portlet light bordered builder-data-empty text-center">
                                                        <div class="empty-info">
                                                            <i class="fa fa-database"></i> 暂时没有数据<br>
                                                            <span class="small">本系统由 <a href="{{ config('config.websiteDomain') }}" class="text-muted" target="_blank">{{ config('config.productName') }}</a> v{{ config('config.currentVersion') }} 强力驱动</span>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    
