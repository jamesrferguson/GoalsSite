<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{!! url('/') !!}"><h1>Goals Site</h1></a>
                
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{!! url('/entry') !!}">Add Entry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! url('/login') !!}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! url('/create') !!}">New Goal</a>
                </li>   
            </ul>     
        </div>
    </nav>




    <div class="container-fluid">
        @yield('content')
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>
