@section('pageJs')
        {{-- builderFrom全局JS脚本 --}}
        <script src="{{ asset('vendor/builder/js/app.js') }}"></script>
        {{-- pnotify通知消息JS脚本--}}
        <script src="//cdn.bootcss.com/pnotify/3.0.0/pnotify.min.js"></script>
        <script src="//cdn.bootcss.com/pnotify/3.0.0/pnotify.buttons.min.js"></script>
        {{-- animate动画效果JS脚本--}}
        <script src="//cdn.bootcss.com/pnotify/3.0.0/pnotify.animate.min.js"></script>

    @foreach ($formItems as $Item)
        @if ($Item['type']=='switch')
        {{-- switch文件JS --}}
        <script src="//cdn.bootcss.com/bootstrap-switch/3.3.2/js/bootstrap-switch.min.js"></script>
        {{-- 自定义switch开关JS配置文件 --}}
        <script src="{{ asset('vendor/builder/js/switch-config.js') }}"></script>
        @elseif ($Item['type']=='picture')
        {{--拖拽上传文件加载JS文件--}}
        <script src="//cdn.bootcss.com/dropzone/4.3.0/min/dropzone.min.js"></script>
        @endif
    @endforeach
    <script type="text/javascript">
            Dropzone.autoDiscover = false;
            $("#uploadDropzone_4").dropzone({
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
                        $("#upload_box_4").replaceWith( $imgHtml );
                        {{-- //改变from表单图片ID --}}
                        $("input[name='{{ $Item['name'] }}']").val(data.uploadData.id);
                    });
                }
            });
    </script>
@endsection
