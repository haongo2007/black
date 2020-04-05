<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ (isset($page)) ? $page : config('app.name', 'Black Dashboard') }}</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('black') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('black') }}/img/favicon.png">
        <!-- Fonts -->
        <link href="{{ asset('black/fonts/Poppins-font.css') }}" rel="stylesheet" />
        <link href="{{ asset('black/fonts/all.css') }}" rel="stylesheet" />
        <!-- Icons -->
        <link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS -->
        <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <div class="wrapper">
                    @include('layouts.admin.navbars.sidebar')
                <div class="main-panel">
                    @include('layouts.admin.navbars.navbar')

                    <div class="content">
                        @yield('content')
                    </div>

                    @include('layouts.admin.footer')
                </div>
            </div>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            @include('layouts.admin.navbars.navbar')
            <div class="wrapper wrapper-full-page">
                <div class="full-page {{ $contentClass ?? '' }}">
                    <div class="content">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                    @include('layouts.admin.footer')
                </div>
            </div>
        @endauth
        <div class="fixed-plugin">
            <div class="dropdown show-dropdown">
                <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Background</li>
                <li class="adjustments-line">
                  <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors text-center">
                      <span class="badge filter badge-primary" data-color="primary"></span>
                      <span class="badge filter badge-info" data-color="blue"></span>
                      <span class="badge filter badge-success" data-color="green"></span>
                      <span class="badge filter badge-warning" data-color="orange"></span>
                      <span class="badge filter badge-danger active" data-color="red"></span>
                    </div>
                    <div class="clearfix"></div>
                  </a>
                </li>
                {{-- <li class="button-container">
                    <a href="https://www.creative-tim.com/product/black-dashboard-laravel" target="_blank" class="btn btn-primary btn-block btn-round">Download Now</a>
                    <a href="https://demos.creative-tim.com/black-dashboard/docs/1.0/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block btn-round">
                    Documentation
                    </a>
                    <a href="https://www.creative-tim.com/product/black-dashboard-pro-laravel" target="_blank" class="btn btn-danger btn-block btn-round">
                    Upgrade to PRO
                    </a>
                </li> --}}
                <li class="header-title">
                  Sidebar Mini
                </li>
                <li class="adjustments-line">
                  <div class="togglebutton switch-sidebar-mini">
                    <span class="label-switch">OFF</span>
                    <input type="checkbox" name="checkbox" class="bootstrap-switch">
                    <span class="label-switch label-right">ON</span>
                  </div>
                </li>
                <li class="button-container text-center">
                    <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot; 45</button>
                    <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot; 50</button>
                    <br>
                    <br>
                    <a class="github-button" href="https://github.com/creativetimofficial/black-dashboard-laravel" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                </li>
                </ul>
            </div>
        </div>
        <script src="{{ asset('black') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('black') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('black') }}/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('black') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!-- Place this tag in your head or just before your close body tag. -->
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
        <!-- Chart JS -->
        {{-- <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script> --}}
        <!--  Notifications Plugin    -->
        <script src="{{ asset('black') }}/js/plugins/bootstrap-notify.js"></script>

        <script src="{{ asset('black') }}/js/black-dashboard.min.js"></script>
        <script src="{{ asset('black') }}/js/theme.js"></script>
        <script src="{{ asset('black') }}/js/settings.js"></script>
        <script src="{{ asset('black') }}/js/plugins/bootstrap-switch.js"></script>
        <script src="{{ asset('black') }}/js/plugins/jquery.dataTables.min.js"></script>
        <script src="{{ asset('black') }}/js/plugins/jasny-bootstrap.min.js"></script>
        <script src="{{ asset('black') }}/js/plugins/bootstrap-selectpicker.js"></script>
        <script src="{{ asset('black') }}/js/plugins/bootstrap-tagsinput.js"></script>
        
        @stack('css')
        @stack('js')
    </body>
</html>
