<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('css/style.css') }}" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <title>Laravel</title>

        <div class="card text-center">
          <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs justify-content-center">
              <li class="nav-item">
                <a class="nav-link" href="{{route('author.index')}}">Authors</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('book.index')}}">Books</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Atsijungti</a>
              </li>
            </ul>
          </div>

        </div>
</head>
    <body>

      <!-- <textarea>Next, use our Get Started docs to setup Tiny!</textarea> -->
