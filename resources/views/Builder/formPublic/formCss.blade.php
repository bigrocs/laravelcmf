@section('pageCss')
        {{-- builderFrom全局CSS样式 --}}
        <link  rel="stylesheet" href="{{ asset('vendor/builder/css/builder.css') }}">
        {{-- pnotify通知消息CSS样式 --}}
        <link href="//cdn.bootcss.com/pnotify/3.0.0/pnotify.min.css" rel="stylesheet">
        <link href="//cdn.bootcss.com/pnotify/3.0.0/pnotify.buttons.min.css" rel="stylesheet">
        {{-- animate动画效果CSS样式--}}
        <link href="//cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">

    @foreach ($formType as $Item)
        @if ($Item == 'switch')
        {{-- switch开关CSS文件 --}}
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap-switch/3.3.2/css/bootstrap3/bootstrap-switch.min.css">
        @elseif ($Item == 'picture')
        {{--拖拽上传文件加载CSS文件--}}
        <link rel="stylesheet" href="//cdn.bootcss.com/dropzone/4.3.0/min/dropzone.min.css">
        @elseif ($Item == 'tags')
        {{--tagsinput加载CSS文件--}}
        <link href="//cdn.bootcss.com/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet">
        @endif
    @endforeach
@endsection
