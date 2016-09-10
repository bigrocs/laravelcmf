@extends('layout.layouts')
@section('css')
        {{-- 后台全局强制性的风格 BEGIN --}}
        {{--<!-- Theme style -->--}}
        <link rel="stylesheet" href="//cdn.bootcss.com/admin-lte/2.3.6/css/AdminLTE.min.css">
        {{-- <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load.  --> --}}
        <link rel="stylesheet" href="//cdn.bootcss.com/admin-lte/2.3.6/css/skins/_all-skins.min.css">
        {{-- 后台全局强制性的风格 END --}}
        {{-- 后台页面级别插件BEGIN --}}
            @yield('pageCss')
        {{-- 后台页面级别插件END --}}
        {{-- 后台全局主题样式BEGIN --}}
        <link href="{{ asset('assets/global/css/components-md.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css" />
        {{-- 后台全局主题样式END --}}
        {{-- 后台LAYOUT布局主题样式BEGIN --}}
        <link href="{{ asset('assets/layouts/layout/css/layout.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/layouts/layout/css/themes/darkblue.css') }}" rel="stylesheet" type="text/css" id="style_color" />
        {{-- 后台LAYOUT布局主题样式END --}}
@endsection

@section('content')
    <header class="main-header">
        {{--<!-- Logo -->--}}
        <a href="index2.html" class="logo">
            {{--<!-- mini logo for sidebar mini 50x50 pixels -->--}}
            <span class="logo-mini"><b>A</b>LT</span>
            {{--<!-- logo for regular state and mobile devices -->--}}
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        {{--<!-- Header Navbar: style can be found in header.less -->--}}
        <nav class="navbar navbar-static-top">
            {{--<!-- Sidebar toggle button-->>--}}
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
        </nav>
    </header>
    @yield('pageContent')
@endsection
@section('js')
        {{-- JS后台核心插件BEGIN --}}
        <script src="//cdn.bootcss.com/fastclick/1.0.6/fastclick.js"></script>
        <script src="//cdn.bootcss.com/admin-lte/2.3.6/js/app.min.js"></script>
        {{-- JS后台核心插件END --}}
        {{-- JS后台全局脚本BEGIN --}}
        <script src="{{ asset('assets/global/scripts/app.js') }}" type="text/javascript"></script>
        {{-- JS后台全局脚本END --}}
        {{-- JS后台页面级别插件BEGIN --}}
@yield('pageJs')
        {{-- JS后台页面级别插件END --}}
        {{-- JS后台页面级别脚本BEGIN --}}
        <script src="{{ asset('assets/pages/scripts/dashboard.js') }}" type="text/javascript"></script>
        {{-- JS后台页面级别脚本END --}}
        {{-- 后台LAYOUT布局主题脚本BEGIN --}}
        <script src="{{ asset('assets/layouts/layout/scripts/layout.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/layout/scripts/demo.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/global/scripts/quick-sidebar.js') }}" type="text/javascript"></script>
        {{-- 后台LAYOUT布局主题脚本BEGINEND --}}
@endsection
