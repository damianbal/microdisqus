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
            <div class="row header ">
                <div class="col-sm-12">
 
                <a href="{{ route('home') }}">MicroDisqus</a>
                </div>
            </div>
            <div class="row "> 
                <div class="col-sm-6">
                        <nav class="nav custom-nav">
                                <a class="nav-link active" href="#">Popular</a>
                                <a class="nav-link" href="#">Recent</a>
                        </nav>
                </div>
                <div class="col-sm-6">
                        <nav class="nav custom-nav justify-content-end">
                            @guest
                         <a class="nav-link" href="{{ route('sign-in.show') }}">Sign in</a>
                         @endguest

                         @auth
                            <a class="nav-link" href="{{ route('sign-out') }}"><i class="fas fa-sign-out-alt"></i> Sign out ({{ Auth::user()->name }})</a>
                         @endauth
                        </nav>
                </div>
            </div>
        </div>
    </div>

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
        @endif

        @if(Session::has('message'))
            <div class="alert alert-info">
      
                {{ Session::get('message') }}
           
            </div>
        @endif
    </div>

    <div class="container bg-white shadow-sm  rounded">
        <div class="row p-3">
            <div class="col-sm-12">
                    @yield('content', '')
            </div>
        </div>
    </div>
</div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>