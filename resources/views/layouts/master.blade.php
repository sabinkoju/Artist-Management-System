<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="dark"
    data-header-styles="dark" data-menu-styles="dark" data-toggled="close">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Hamro Artist - Admin</title>
    <meta name="Description" content="">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="">

    <!-- Favicon -->
    <link rel="icon" href="../assets/images/brand-logos/favicon.ico" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="{{asset('assets/js/authentication-main.js')}}"></script>

    @include('includes.stylesheet')

</head>

<body class="bg-white">
    @yield('content')
    @include('includes.javascript')
</body>
