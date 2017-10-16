<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <style>
    html,
    body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Raleway', sans-serif;
      font-weight: 100;
      height: 100vh;
      margin: 0;
    }

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }

    .content {
      text-align: center;
    }

    .title {
      font-size: 84px;
    }

    .links>a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }

    .m-b-md {
      margin-bottom: 30px;
    }

    .card-text {
      display: block;
      display: -webkit-box;
      height: 117.2px;
      font-size: 14px;
      line-height: 1.4;
      -webkit-line-clamp: 6;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
            
    }

    .descCorta{
      display: block;
      display: -webkit-box;
      height: 60px;
      font-size: 12px;
      line-height: 1.2;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .card-text::after {
      content:'...';  
   
    }
    .card-img-top{
      max-height: 170px;
      padding: 10px 0px;
    }

    .titulo{
      margin-top: 20px;
      margin-bottom: 20px;
    }

    .imgTitulo{
      max-height: 180px;
    }

    .imgPrincipal{
      max-height: 450px;
    }

    

  </style>

</head>

<body>
  @include('shared.navbar') 
  @yield('content')
  <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>