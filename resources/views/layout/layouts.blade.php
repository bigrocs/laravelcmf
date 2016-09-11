<!DOCTYPE html>
<html>
    {{-- 头部BEGIN --}}
    <head>
        <title>{{ $metaTitle }}</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta content="" name="description" />
        <meta content="BigRocs" name="author" />

        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="//cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css">
        @yield('css')

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue sidebar-mini fixed">
        <div class="wrapper">
            @yield('content')
        </div>
        {{-- JS全局插件begin --}}
        <script src="//cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>
        <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        {{-- JS全局插件end --}}
        @yield('js')
    </body>
</html>
