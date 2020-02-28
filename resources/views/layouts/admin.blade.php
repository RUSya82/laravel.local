<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@yield('nav')



<main role="main" class="main-content">
    <div class="content">
        @yield('content')
    </div>

</main>


<footer class="footer">
    <div class="container">
        <p>© Company 2017-2019</p>
    </div>

</footer>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

