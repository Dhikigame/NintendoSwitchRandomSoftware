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
    @yield('content')
<script src="{{ mix('js/app.js') }}"></script> 
</body>
</html>