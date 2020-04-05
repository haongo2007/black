<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('web') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('web') }}/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Material Kit by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('web') }}/css/material-kit.min.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('web') }}/demo/demo.css" rel="stylesheet" />
    <link href="{{ asset('web') }}/demo/vertical-nav.css" rel="stylesheet" />

</head>

<body class="{{ (isset($page_name)) ? $page_name : 'about-us' }} sidebar-collapse">

    @include('layouts.web.header')

    @yield('content')

    @include('layouts.web.footer')

    <!--   Core JS Files   -->
    <script src="{{ asset('web') }}/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('web') }}/js/core/popper.min.js" type="text/javascript"></script>
    <script src="{{ asset('web') }}/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="{{ asset('web') }}/js/plugins/moment.min.js"></script>
    <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{ asset('web') }}/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('web') }}/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('web') }}/js/material-kit.min.js" type="text/javascript"></script>
    {{--  plugin  --}}
    <script src="{{ asset('web') }}/js/plugins/modernizr.js" type="text/javascript"></script>
    <script src="{{ asset('web') }}/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
    <script src="{{ asset('web') }}/js/plugins/bootstrap-tagsinput.js" type="text/javascript"></script>
    <script src="{{ asset('web') }}/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('web') }}/js/plugins/jquery.flexisel.js" type="text/javascript"></script>
    <script src="{{ asset('web') }}/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
    <script src="{{ asset('web') }}/js/plugins/vertical-nav.js" type="text/javascript"></script>

    <script src="{{ asset('web') }}/demo/demo.js" type="text/javascript"></script>

    @stack('js')

</body>

</html>