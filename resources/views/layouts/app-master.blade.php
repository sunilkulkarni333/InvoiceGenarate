<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/bootstrap/css/style.css') !!}" rel="stylesheet" type="text/css" />

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
    
    @include('layouts.partials.navbar')

    <div class="container-fluid contentPadding">
        @yield('content')
    </div>

    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/bootstrap/js/jquery-3.3.1.slim.min.js') !!}"></script>
    {{-- <script type="text/javascript" src="{!! url('assets/bootstrap/js/popper.js') !!}"></script>            --}}
    <script type="text/javascript" src="{!! url('assets/bootstrap/js/bootstrap.min.js') !!}"></script> 
      
  </body>
</html>