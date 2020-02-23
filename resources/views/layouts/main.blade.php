<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
{{--    <meta name="generator" content="Jekyll v3.8.6">--}}
    <title>@yield('title')</title>
{{--    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/jumbotron/">--}}
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

{{--    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">--}}
{{--    <meta name="theme-color" content="#563d7c">--}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark  bg-dark">
    <a class="navbar-brand" href="{{route('home')}}">Портал новостей</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('news.news')}}">Новости</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории новостей</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="{{route('news.oneCat', 'sport')}}">Спорт</a>
                    <a class="dropdown-item" href="{{route('news.oneCat', 'govenment')}}">Политика</a>
                    <a class="dropdown-item" href="{{route('news.oneCat', 'nature')}}">Природа</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('about')}}">О нас</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>



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

