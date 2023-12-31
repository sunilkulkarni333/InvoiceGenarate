<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/bootstrap/css/style.css') !!}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .contentPadding{
        padding-top: 28px;
      }
    </style> 

    
    <!-- Custom styles for this template -->
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
</head>
<body>
  
    @auth
      @include('layouts.partials.navbar')
    @endauth
    
    <div class="container-fluid contentPadding">
        @yield('content')
    </div>

   
    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    {{-- <script type="text/javascript" src="{!! url('assets/bootstrap/js/jquery-3.3.1.slim.min.js') !!}"></script> --}}
    {{-- <script type="text/javascript" src="{!! url('assets/bootstrap/js/popper.js') !!}"></script>            --}}
    <script type="text/javascript" src="{!! url('assets/bootstrap/js/bootstrap.min.js') !!}"></script> 
    <script>
      feather.replace()
    </script>
  </body>
</html>