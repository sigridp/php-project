<!DOCTYPE html>
<html lang="nl">
    <!-- page-title  -->
    <head>
        <title>@yield('title')</title>
        <!-- CDN fontawesome icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <!-- CDN bootstrap stylesheets -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- projects' stylesheets -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>

    <body>
        <!-- navigation -->
        @include('layouts.partials.header')
        <!-- main contentpage -->
        @yield('content')
        <!--  footer -->
        @include('layouts.partials.footer')
    </body>
</html>
