<!DOCTYPE html>
<html lang="en" data-textdirection="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') - {{ config('app.name') }}</title>
        <meta name="description" content="@yield('title') - {{ config('app.name') }}">
        <link rel="manifest" href="/admin/icons/site.webmanifest">
        <link rel="mask-icon" href="/admin/icons/safari-pinned-tab.sv" color="#ff0032">
        <link rel="shortcut icon" href="/admin/favicon.png">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-config" content="/admin/icons/browserconfig.xml">
        <meta name="theme-color" content="#3e3e3e">

        {{-- Include core + vendor Styles --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600&display=swap">
        <link rel="stylesheet" href="/admin/css/vendors.min.css">

        {{-- Vendor Styles --}}
        @stack('vendor.styles')

        {{-- Theme Styles --}}
        <link rel="stylesheet" type="text/css" href="/admin/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/components.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/authentication.css">
        
        {{-- Page Styles --}}
        @stack('page.styles')
    </head>

    <body class="vertical-layout vertical-menu-modern 1-column blank-page bg-full-screen-image data-menu="vertical-menu-modern" style="background:#D1D7E3;">

        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-body">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- END: Content-->
        @stack('vendor.scripts')

        {{-- page script --}}
        @stack('page.scripts')
        {{-- page script --}}
    </body>
</html>