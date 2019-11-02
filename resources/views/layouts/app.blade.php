<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="/">SO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('about.index') }}">About <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('projects.index') }}">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('articles.index') }}">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="{{ route('articles.index') }}">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
