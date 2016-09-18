@section('pageJs')
    @foreach ($formItems as $Item)
        @if ($Item['type']=='switch')
        {{-- switch文件JS --}}
        <script src="//cdn.bootcss.com/bootstrap-switch/3.3.2/js/bootstrap-switch.min.js"></script>
        {{-- 自定义switch开关JS配置文件 --}}
        <script src="{{ asset('js/switch-config.js') }}"></script>
        @elseif ($Item['type']=='switch')

        @endif
    @endforeach
@endsection
