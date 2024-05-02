<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Auth in Laravel</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<!--====== Google Font ======-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
<!--====== Vendor Css ======-->
<link rel="stylesheet" href='{{ asset("css/vendor.css") }}'>
<!--====== Utility-Spacing ======-->
<link rel="stylesheet" href='{{ asset("css/utility.css") }}'>

<!--====== App ======-->
<link rel="stylesheet" href='{{ asset("css/app.css") }}'>
<link rel="stylesheet" href='{{ asset("css/style.css") }}'>
<style>
    .navbar-nav .nav-link {
        color: #ffffff;
        font-weight: bold;
    }

    body {
        height: 100vh;
        width: 100%;
        background: url("{{ asset('images/hero-bg.jpg') }}") center/cover no-repeat;
    }

    .footer {
        left: 0;
        bottom: 0;
        width: 100%;
        text-align: center;
        color: #e3f2fd;
    }
</style>

<body>
    <header>
        <nav class="navbar navbar-expand-lg mb-5">
            <div class="container">
                <a href="{{ route('dashboard') }}" class="logo">
                    <img src="{{ asset('images/logo.jpg') }}" alt="logo">
                    <h2>NHOM E</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <ul class="navbar-nav">
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('list.user') }}">List user</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register-user') }}">Add user</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('post') }}">Post</a>
                            </li>
                            @php
                            $user = Auth::user();
                            @endphp
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile-user', $user->id) }}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                            </li>
                            @endguest
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    @yield('content')
    <!--====== Main Footer ======-->
    <footer class="footer">
        <div class="lower-footer">
            <div class="container">
                <div class="row">
                    <span>Copyright © 2024</span>
                    <span>All Right Reserved</span>
                </div>
            </div>
        </div>
        </div>
    </footer>
</body>
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>

<!--====== Vendor Js ======-->
<script src='{{ asset("js/vendor.js") }}'></script>

<!--====== jQuery Shopnav plugin ======-->
<script src='{{ asset("js/jquery.shopnav.js") }}'></script>

<!--====== App ======-->
<script src='{{ asset("js/app.js") }}'></script>

</html>