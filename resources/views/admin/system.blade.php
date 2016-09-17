@extends('admin.layout.layouts')
@section('pageCss')

@endsection
@section('pageHeadJs')

@endsection
@section('pageContent')
    {{-- BEGIN 引用FormTableBuilder视图 --}}
    @if (isset($view))
    @include($view)
    @endif
    {{-- END 引用FormTableBuilder视图 --}}
@endsection
@section('pageJs')
@endsection
