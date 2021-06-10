<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Cache-Control" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/randomresult.css') }}" rel="stylesheet">
  <title>@yield('title')</title>
  <style>
  button {
    cursor: pointer;
    padding: 6px 12px;
    border-radius: 6px;
    color: #fff;
    border: 2px;
    background-color: #007bff;
    transition: background-color .2s
  }
  button:hover {
    background-color: #0069d9;
  }
  button:active {
	  background-color: #003c7c;
  }
  button:disabled {
    opacity: .5;
    pointer-events: none;
  }
  </style>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <a class="navbar-brand" href="#">Nintendo Switch ランダムソフトカタログ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="#">Features</a>
        <a class="nav-item nav-link" href="#">Pricing</a>
        <a class="nav-item nav-link disabled" href="#">Disabled</a>
      </div>
    </div> -->
  </nav>
    @yield('content')
<script src="{{ mix('js/app.js') }}"></script> 
<footer class="footer">
  <div class="container">
    <p class="text-muted">Nintendo Switch ランダムソフトカタログ</p>
    <p class="text-muted">© 2021 @dhiki_pico</p>
  </div>
</footer>
</body>
</html>