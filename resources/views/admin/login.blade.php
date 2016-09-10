@extends('layout.layouts')
@section('css')
        {{-- 后台全局强制性的风格 BEGIN --}}
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- 后台全局强制性的风格 END --}}
        {{-- 后台页面级别插件BEGIN --}}
        <link href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- 后台页面级别插件END --}}
        {{-- 后台全局主题样式BEGIN --}}
        <link href="{{ asset('assets/global/css/components-md.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- 后台全局主题样式END --}}
        {{-- 后台LAYOUT布局主题样式BEGIN --}}
        <link href="{{ asset('assets/pages/css/login-5.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- 后台LAYOUT布局主题样式END --}}
        <link rel="shortcut icon" href="favicon.ico" />
@endsection
@section('headJs')
@yield('pageHeadJs')
@endsection
@section('content')
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset">
                    <div class="login-bg" style="background-image:url(../assets/pages/img/login/bg1.jpg)">
                        <img class="login-logo" src="../assets/pages/img/login/logo.png" /> </div>
                </div>
                <div class="col-md-6 login-container bs-reset">
                    <div class="login-content">
                        <h1>{{ config('adminConfig.WEB_SITE_TITLE') }} 后台管理</h1>
                        <p> {{ config('adminConfig.WEB_SITE_DESCRIPTION') }} </p>
                        {!! Form::open(array('route'=>routeName(),'method'=>'post','class'=>'login-form')) !!}
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>请输入用户名和密码。 </span>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="手机/邮箱/用户名" name="username" required/> 
                                </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="请输入密码" name="password" required/> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="rem-password">
                                        <p>记住我
                                            <input type="checkbox" class="rem-checkbox" />
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <div class="forgot-password">
                                        <a href="javascript:;" id="forget-password" class="forget-password">忘记密码 ?</a>
                                    </div>
                                    <button class="btn blue" type="submit">登 录</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                        <!-- BEGIN FORGOT PASSWORD FORM -->
                        <form class="forget-form" action="javascript:;" method="post">
                            <h3 class="font-green">忘记密码 ?</h3>
                            <p> 请输入您的注册邮箱。 </p>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                            <div class="form-actions">
                                <button type="button" id="back-btn" class="btn grey btn-default">返 回</button>
                                <button type="submit" class="btn blue btn-success uppercase pull-right">确 定</button>
                            </div>
                        </form>
                        <!-- END FORGOT PASSWORD FORM -->
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-5 bs-reset">
                                <ul class="login-social">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-dribbble"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-7 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>2016 &copy; Metronic by bigrcos.
                                        <a href="http://www.bigrocs.com" title="购买此程序得到终身授权更新" target="_blank">购买授权!</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('footJs')
        {{-- JS后台核心插件BEGIN --}}
        <script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        {{-- JS后台核心插件END --}}
        {{-- JS后台全局脚本BEGIN --}}
        <script src="{{ asset('assets/global/scripts/app.js') }}" type="text/javascript"></script>
        {{-- JS后台全局脚本END --}}
        {{-- JS后台页面级别插件BEGIN --}}
@yield('pageJs')
        {{-- JS后台页面级别插件END --}}
        {{-- JS后台页面级别脚本BEGIN --}}
        <script src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/backstretch/jquery.backstretch.min.js') }}" type="text/javascript"></script>
        {{-- JS后台页面级别脚本END --}}
        {{-- 后台LAYOUT布局主题脚本BEGIN --}}
        <script src="{{ asset('assets/pages/scripts/login-5.min.js') }}" type="text/javascript"></script>
        {{-- 后台LAYOUT布局主题脚本BEGINEND --}}
@endsection


