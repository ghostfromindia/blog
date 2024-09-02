<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'NoteShort - Your Source for the Latest Articles on Every Topic')</title>
    <meta name="description" content="@yield('meta_description', 'NoteShort - Your Source for the Latest Articles on Every Topic')">
    <meta name="keywords" content="@yield('meta_keywords', 'NoteShort, latest articles, trending topics, multiple topics, diverse subjects, current events, news, insights, information, blog, online articles, trending content, education, technology, health, lifestyle, entertainment, business, science, updates, knowledge, research')">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="@yield('title', 'NoteShort - Your Source for the Latest Articles on Every Topic')">
    <meta property="og:description" content="@yield('meta_description', 'NoteShort - Your Source for the Latest Articles on Every Topic')">
    <meta property="og:image" content="@yield('image',asset('cover.webp'))">
    <meta property="og:url" content="{{ url()->current() }}">

    @section('schema') @show
    <link rel="icon" href="https://www.yourwebsite.com/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="https://www.yourwebsite.com/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/mobile.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/ipad.css')}}">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light  p-0 bg-transparent" style="z-index: 1">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">noteshort</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('contact')}}">Contact</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('logout')}}">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('auth/google')}}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<section class='wrapper' style="margin-top: -60px">
    <div class='hero'>
    </div>
</section>


<!-- Main Content -->
<div class="container mt-5">
    @section('content') @show
</div>

<!-- Footer -->
<footer class="bg-light py-4 mt-auto">
    <div class="container text-center">
        <p class="mb-0">&copy; {{date('Y')}} NoteShort. All rights reserved.</p>
    </div>
</footer>
<script src="{{asset('public/assets/frontend/js/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{asset('public/assets/frontend/js/slick.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/js/aos.js')}}"></script>
@section('bottom') @show
</body>
</html>
