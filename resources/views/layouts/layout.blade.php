
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="authenticated-user" content="auth_user_id" data-detail='auth_user_id_to_json'>

        <title>@yield('title') - {{ config('app.name') }}</title>
        <meta name="description" content="@yield('title') - {{ config('app.name') }}">
    
        <link rel="apple-touch-icon" sizes="180x180" href="/front/apple-touch-icon-1492ab936540997d44a343352c35d44c3ccf46c338c5f349eddf486416407344.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/front/favicon-32x32-b0d570e93eaf074bf006dfa50261ee179664b8d77c514e82f896e12e7042c48a.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/front/favicon-16x16-39b67b68b387d4c917c8ba7681cd8c15f991be9046087142d6ada16410642e2e.png">
        <link rel="manifest" href="/admin/icons/site.webmanifest">
        <link rel="mask-icon" href="/admin/icons/safari-pinned-tab.svg" color="#ff0032">
        <link rel="shortcut icon" href="/admin/icons/favicon.ico">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-config" content="/admin/icons/browserconfig.xml">
        <meta name="theme-color" content="#3e3e3e">

        <link rel="shortcut icon" type="image/x-icon" href="/admin/icons/favicon.ico">

        {{-- Include core + vendor Styles --}}
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600&display=swap">
        <link rel="stylesheet" type="text/css" href="/admin/css/vendors.min.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/prism.min.css">

        {{-- Vendor Styles --}}
        @stack('vendor.styles')

        {{-- Theme Styles --}}
        <link rel="stylesheet" type="text/css" href="/admin/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/colors.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/components.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/semi-dark-layout.css">

        <link rel="stylesheet" type="text/css" href="/admin/css/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/palette-gradient.css">
        
        {{-- Page Styles --}}
        @stack('page.styles')

        {{-- Laravel Style --}}
        <link rel="stylesheet" type="text/css" href="/admin/css/custom-laravel.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/jquery.bootstrap-touchspin.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/form-validation.css">

    </head>
    <body class="vertical-layout vertical-menu-modern 2-columns semi-dark-layout navbar-hidden footer-static  menu-expanded pace-done" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
        {{-- Include Sidebar --}}
        @include('layouts.include.sidebar')       

        <!-- BEGIN: Content-->
        <div class="app-content content">
            <!-- BEGIN: Header-->
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>

            {{-- Include Navbar --}}
            @include('layouts.include.navbar')

            <div class="content-wrapper">
                {{-- Include Breadcrumb --}}

                <div class="content-body">
                    {{-- Include Page Content --}}
                    @yield('content')
                </div>
            </div>
    </div>
        <!-- End: Content-->

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        {{-- Include Footer --}}
        @include('layouts.include.footer')

        {{-- Vendor Scripts --}}
        <script type="text/javascript" src="/admin/js/vendors.min.js"></script>
        <script type="text/javascript" src="/admin/js/prism.min.js"></script>

        @stack('vendor.scripts')

        {{-- Theme Scripts --}}
        <script type="text/javascript" src="/admin/js/app-menu.js"></script>
        <script type="text/javascript" src="/admin/js/app.js"></script>
        <script type="text/javascript" src="/admin/js/components.js"></script>

        <script src="/admin/js/customizer.js"></script>
        <script src="/admin/js/footer.js"></script>

        <script src="/admin/js/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
        <script src="/admin/js/select2.full.min.js" type="text/javascript"></script>
        <script src="/admin/js/jqBootstrapValidation.js" type="text/javascript"></script>

        <script src="/admin/js/number-input.js" type="text/javascript"></script>
        <script src="/admin/js/form-validation.js" type="text/javascript"></script>

        {{-- page script --}}
        @stack('page.scripts')
        {{-- page script --}}
    </body>
</html>