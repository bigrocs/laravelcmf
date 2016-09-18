@extends('admin.layout.layouts')
@section('pageCss')

        <link  rel="stylesheet" href="//cdn.bootcss.com/bootstrap-switch/3.3.2/css/bootstrap3/bootstrap-switch.min.css">
@endsection
@section('pageContent')
    {{-- BEGIN 引用FormTableBuilder视图 --}}
    @if (isset($view))
    @include($view)
    @endif
    {{-- END 引用FormTableBuilder视图 --}}
@endsection
@section('pageJs')

        <script src="//cdn.bootcss.com/bootstrap-switch/3.3.2/js/bootstrap-switch.min.js"></script>
        {{-- 自定义switch开关JS配置文件 --}}
        <script src="{{ asset('js/switch-config.js') }}"></script>
@endsection
