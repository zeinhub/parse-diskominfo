<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    @yield('addon-script-top')
    <title>@yield('title')</title>
</head>
<body class="@yield('class-body')">
    @include('layouts.navbar')
    <div class="container mt-50-px">
        @yield('breadcrumb')
        <div class="row">
            <div class="col">
                @yield('content')
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                @include('layouts.sidebar')
            </div>
        </div>
        <button onclick="topFunction()" id="myBtn" title="Kembali ke atas"><i class="fas fa-chevron-circle-up fa-2x"></i></button>
    </div>
    @include('layouts.footer')
    @include('layouts.script')
    @yield('addon-script-bottom')
</body>
</html>