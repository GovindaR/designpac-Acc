<!DOCTYPE html>
<html>

<head>
    <title>DesignCap | @yield('title', 'Dashboard')</title>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    @section('styles')
        @include('layouts._partials.styles')
    @show
    @include('layouts._partials.scripts')

</head>

<body class="mini-navbar">
<div class="se-pre-con"></div>
<div id="wrapper">
    @include('layouts._partials.sidebar')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        @include('layouts._partials.top-navigation')
        @yield('content')
    </div>
</div>
</body>
<script>
    $('div.dismissible').delay(3000).slideUp(300);
</script>

</html>