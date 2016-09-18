@section('pageCss')
        {{-- builder全局CSS样式 --}}
        <link  rel="stylesheet" href="{{ asset('css/builder.css') }}">
@endsection
                            <div class="portlet light bordered builder-container">
                                <div class="portlet-title">
                                    <div class="caption  util-btn-margin-bottom-5">
                                        {{-- 工具栏按钮 --}}
                                        @if (isset($topButtonList))
                                            @foreach ($topButtonList as $tableData)
                                                <a {!! $tableData['attribute'] !!}>{!! $tableData['icon'] !!} {{ $tableData['title'] }}</a>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                                <i class="fa fa-share"></i>
                                                <span class="hidden-xs"> 导出 </span>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right" id="sample_0_tools">
                                                <li>
                                                     <a href="javascript:;" data-action="0" class="tool-action">
                                                        <i class="icon-printer"></i> 打印</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" data-action="1" class="tool-action">
                                                        <i class="icon-check"></i> 复制</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" data-action="2" class="tool-action">
                                                        <i class="icon-doc"></i> PDF 导出</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" data-action="3" class="tool-action">
                                                        <i class="icon-paper-clip"></i> Excel 导出</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" data-action="4" class="tool-action">
                                                        <i class="icon-cloud-upload"></i> CSV 导出</a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;" data-action="5" class="tool-action">
                                                        <i class="icon-refresh"></i> 刷新</a>
                                                </li>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body builder-table">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_0">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" class="group-checkable" data-set="#sample_0 .checkboxes" >
                                                </th>
                                                @foreach ($tableColumnList as $tableColumn)
                                                    <th>{{ $tableColumn['title'] }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="table-data" num="{{ count($tableDataList) }}" pageLength="{{ config('adminConfig.ADMIN_PAGE_ROWS') }}">
                                            @if (!empty($tableDataList))
                                                <input class="{{ $tableDataListKey }}" name="_token" style='display:none'  value="{{ csrf_token() }}">
                                                @foreach ($tableDataList as $tableData)
                                                    <tr class="odd gradeX">
                                                        <td><input type="checkbox" class="{{ $tableDataListKey }} checkboxes" value="{{ $tableData[$tableDataListKey] }}" name="{{ $tableDataListKey }}[]"></td>
                                                        @foreach ($tableColumnList as $tableColumn)
                                                            @if($tableColumn['type']!=null)
                                                                <td>{!! $tableData[$tableColumn['name']] !!}</td>
                                                            @else
                                                                <td>{{ $tableData[$tableColumn['name']] }}</td>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="builder-data-empty">
                                                    <td class="text-center empty-info" colspan="{{ count($tableColumnList)+1 }}">
                                                        <i class="fa fa-database"></i> 暂时没有数据<br>
                                                        <span class="small">本系统由 <a href="{{ config('config.websiteDomain') }}" class="text-muted" target="_blank">{{ config('config.productName') }}</a> v{{ config('config.currentVersion') }} 强力驱动</span>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
