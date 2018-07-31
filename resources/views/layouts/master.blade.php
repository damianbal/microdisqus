<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('head.title', '')</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div id="app">
    <div class="bg-primary mb-3">
        <div class="container">
            <div class="row header p-2">
                <div class="col-sm-12">
                        <img height="42px" src="{{ asset('img/md-logo.png') }}">

                    <a href="#">MicroDisqus</a>
                </div>
            </div>
            <div class="row"> 
                <div class="col-sm-6">
                        <nav class="nav custom-nav">
                                <a class="nav-link active" href="#">Popular</a>
                                <a class="nav-link" href="#">Recent</a>
                        </nav>
                </div>
                <div class="col-sm-6 text-right">
                        <nav class="nav custom-nav">
                                <a class="nav-link active" href="#">Sign in</a>
                        </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container bg-white shadow-sm p-3 rounded">
        <div class="row">
            <div class="col-sm-12">
                    @yield('content', '')
            </div>
        </div>
    </div>
</div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>