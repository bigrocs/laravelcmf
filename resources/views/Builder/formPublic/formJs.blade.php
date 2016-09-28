@section('pageJs')
        {{-- builderFrom全局JS脚本 --}}
        <script src="{{ asset('vendor/builder/js/app.js') }}"></script>
        {{-- pnotify通知消息JS脚本--}}
        <script src="//cdn.bootcss.com/pnotify/3.0.0/pnotify.min.js"></script>
        <script src="//cdn.bootcss.com/pnotify/3.0.0/pnotify.buttons.min.js"></script>
        {{-- animate动画效果JS脚本--}}
        <script src="//cdn.bootcss.com/pnotify/3.0.0/pnotify.animate.min.js"></script>

    @foreach ($formType as $Item)
        @if ($Item == 'switch')
        {{-- switch文件JS --}}
        <script src="//cdn.bootcss.com/bootstrap-switch/3.3.2/js/bootstrap-switch.min.js"></script>
        {{-- 自定义switch开关JS配置文件 --}}
        <script src="{{ asset('vendor/builder/js/switch-config.js') }}"></script>
        @elseif ($Item == 'picture')
        {{--拖拽上传文件加载JS文件--}}
        <script src="//cdn.bootcss.com/dropzone/4.3.0/min/dropzone.min.js"></script>
        <script src="{{ asset('vendor/builder/js/dropzone-config.js') }}"></script>
        @elseif ($Item == 'tags')
        {{--tagsinput文件加载JS文件--}}
        <script src="//cdn.bootcss.com/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
        @endif
    @endforeach
@endsection
