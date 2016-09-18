@extends('admin.layout.layouts')

@section('pageContent')
    {{-- BEGIN 引用FormTableBuilder视图 --}}
    @if (isset($view))
    @include($view)
    @endif
    {{-- END 引用FormTableBuilder视图 --}}
@endsection
