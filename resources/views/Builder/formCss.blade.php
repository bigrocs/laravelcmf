@section('pageCss')
        {{-- builder全局CSS样式 --}}
        <link  rel="stylesheet" href="{{ asset('css/builder.css') }}">
    @foreach ($formItems as $Item)
        @if ($Item['type']=='switch')

        <link  rel="stylesheet" href="//cdn.bootcss.com/bootstrap-switch/3.3.2/css/bootstrap3/bootstrap-switch.min.css">
        @elseif ($Item['type']=='switch')


        @endif
    @endforeach
@endsection
