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
@endsection

@section('content')
            {{-- 后台header头部BEGIN --}}
            <header class="main-header">
                {{--<!-- Logo -->--}}
                <a href="{{ route('admin.index') }}" class="logo">
                    {{--<!-- mini logo for sidebar mini 50x50 pixels -->--}}
                    <span class="logo-mini"><b>C</b>MF</span>
                    {{--<!-- logo for regular state and mobile devices -->--}}
                    <span class="logo-lg"><b>Laravel</b>CMF</span>
                </a>
                {{--<!-- Header Navbar: style can be found in header.less -->--}}
                <nav class="navbar navbar-static-top">
                    {{--<!-- Sidebar toggle button-->--}}
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        {{--<!-- 后期增加登陆信息等-->--}}
                    </div>
                </nav>
            </header>
            {{-- 后台header头部END --}}
            {{-- <!-- Left side column. contains the logo and sidebar --> --}}
            <aside class="main-sidebar">
                {{-- <!-- sidebar: style can be found in sidebar.less --> --}}
                <section class="sidebar">
                    {{-- <!-- 用户登录状态显示 Sidebar user panel --> --}}
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="//cdn.bootcss.com/admin-lte/2.3.6/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>LaravelCMF Admin</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
                        </div>
                    </div>
                    {{-- <!-- 搜索功能  search form --> --}}
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="搜索Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    {{-- <!-- /.search form --> --}}
                    {{-- <!-- sidebar menu: : style can be found in sidebar.less --> --}}
                    <ul class="sidebar-menu">
                        {{--<!-- 导航位置定义 -->--}}
                        @each('admin.layout.sidebarMenu', getNav(config('adminNav')), 'nav')
                    </ul>
                </section>
                {{--<!-- /.sidebar -->--}}
            </aside>
            {{--<!-- Content Wrapper. Contains page content -->--}}
            <div class="content-wrapper">
                {{--<!-- Content Header (Page header) -->--}}
                <section class="content-header">
                    <h1>
                        {{ getPageTitle(config('adminNav')) }}
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> 首页</a></li>
                        @foreach (getBreadcrumb(config('adminNav')) as $breadcrumb)

                            <li>{{ $breadcrumb['title'] }}</li>
                        @endforeach

                    </ol>
                </section>
                {{--<!-- Main content -->--}}
                <section class="content">
                    @yield('pageContent')
                </section>
            </div>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> {{ config('config.version') }}
                </div>
                <strong>Copyright © 2015-2016 <a href="{{ config('config.websiteDomain') }}">{{ config('config.author') }}</a>.</strong> All rights reserved.
            </footer>
@endsection
@section('js')
        {{-- JS后台核心插件BEGIN --}}
        {{-- <!-- 页面滚动插件 SlimScroll--> --}}
        <script src="//cdn.bootcss.com/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
        {{-- <!-- 快速点击插件 fastClick--> --}}
        <script src="//cdn.bootcss.com/fastclick/1.0.6/fastclick.js"></script>
        <script src="//cdn.bootcss.com/admin-lte/2.3.6/js/app.min.js"></script>
        {{-- JS后台核心插件END --}}
        {{-- JS后台页面级别插件BEGIN --}}
        @yield('pageJs')
        {{-- JS后台页面级别插件END --}}
@endsection
