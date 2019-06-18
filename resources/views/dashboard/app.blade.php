<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | MCU Administrative</title>
    <link href="{{asset('dashboard/plugins/Semantic-UI-CSS-master/semantic.min.css')}}" rel="stylesheet">
    @stack('css')
    <link href="{{asset('dashboard/css/custom-style.css')}}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body>
<div class="ui stacked segment container my-1">
    @include('dashboard.header')
    <!--Breadcrumb-->
        @yield('breadcrumb')
        <div id="content">
            @yield('content')
        </div>
</div>
<script src="{{asset('dashboard/plugins/jquery/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/Semantic-UI-CSS-master/semantic.min.js')}}"></script>
@stack('js')
<script src="{{asset('dashboard/js/custom-script.js')}}"></script>
@yield('js')
</body>
</html>
