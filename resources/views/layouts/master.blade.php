<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('head.title', '')</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
            <div class="container">
                <div class="row">

                    <a class="navbar-brand" href="{{ route('home') }}">MD</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                        aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon"></span>
                                                </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">

                            <a class="nav-item nav-link" href="{{ route('index.popular') }}">@lang('md.popular')</a>
                        </div>

                        <div class="navbar-nav ml-auto">
                            @guest
                            <a href="{{ route('sign-in.show') }}" class="nav-item nav-link">@lang('md.sign_in')</a> 
                            @endguest
                            @auth
                            <a href="{{ route('users.show', [Auth::user()->id]) }}" class="nav-item nav-link">@lang('md.profile')</a>                           

                            <a href="{{ route('sign-out') }}" class="nav-item nav-link">@lang('md.sign_out') ({{ Auth::user()->name }})</a>                           
                             @endauth
                        </div>

                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            @if ($errors->any())
            <div class="row">
                <div class="col-12">

                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>

                </div>
            </div>
            @endif @if(Session::has('message'))
            <div class="alert alert-info">

                {{ Session::get('message') }}

            </div>
            @endif
        </div>

        <div class="container bg-white shadow-sm  rounded">
            <div class="row bg-light text-muted font-weight-light border-bottom mb-2 p-3 ">
                <div class="col-12">
                    @yield('title', 'Title')
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    @yield('before-content', '')
                </div>
            </div>

            <div class="row p-1">
                <div class="col-lg-9">
                    @yield('content', '')
                </div>
                <div class="col-lg-3">
                    @include('components.tags')
                    @include('components.popular_users')
                    <recent-likes></recent-likes>
                </div>
            </div>
        </div>
    </div>

    <footer class="container footer mt-3">
        <div class="row">
            <div class="small col-6">
                MicroDisqus (&copy;) 2018
            </div>
            <div class="small col-6 text-sm-right">
                Project: Damian Balandowski
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(function () {
        })
    </script>
</body>

</html>