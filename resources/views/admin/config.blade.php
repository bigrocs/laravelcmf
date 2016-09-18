@extends('admin.layout.layouts')
@section('pageCss')
	<link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/global/plugins/datatables/datatables.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
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
		<script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/global/plugins/datatables/datatables.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/pages/scripts/table-datatables-managed.js') }}" type="text/javascript"></script>
@endsection
