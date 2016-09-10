@extends('admin.layout.layouts')
@section('pageCss')
	<link href="{{ asset('assets/global/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('pageHeadJs')
	<script src="{{ asset('assets/global/plugins/dropzone/dropzone.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
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
