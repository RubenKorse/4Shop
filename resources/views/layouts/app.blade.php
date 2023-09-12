<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>4Shop Ruben Korse</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/narrow-jumbotron.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="/js/app.js"></script>
</head>
<body>
    <div class="container">
      <header class="header d-flex justify-content-between align-items-center">
        <div class="logo">
            <img src="img/4S-Logo-Transparent.png" alt="">
            <h3 class="text-muted"><a href="{{ route('home') }}" class="no-link">4Shop</a></h3>
        </div>
        <a href="{{ route('cart') }}"><img class="cart" src="{{ url('img/cart.png') }}" alt=""></a>
      </header>

      <main role="main">
        @if (session('status'))
            <div class="alert alert-{{ session('status')[0] }}">
                {!! session('status')[1] !!}
            </div>
        @endif
        @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        @yield('content')
      </main>

      <footer class="footer">
        <p><strong>Mail bij vragen: <a href="4Shop@gmail.com">4Shop@gmail.com</a></strong> &middot; Terheijdenseweg 350, 4826 AA Breda, KvK: 41100325, tel: 0162769096.</p>
      </footer>

    </div>
</body>
</html>
