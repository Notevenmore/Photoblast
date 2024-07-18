<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Photoblast</title>
  <meta name="theme-color" content="#6777ef">
  <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
  <link rel="manifest" href="{{ asset('/manifest.json') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  @if(Request::routeIs(['camera', 'retake-photo', 'print']))
    <link rel="stylesheet" href="{{ asset('css/camera.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset("js/jszip.min.js") }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  @else
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @endif
</head>
<body>
  @yield('content')
  <script src="{{ asset('/sw.js') }}"></script>
  <script>
    if(!navigator.serviceWorker.controller) {
      navigator.serviceWorker.register('/sw.js').then(function(reg){
        console.log('Service worker has been registered for scope: ' + reg.scope);
      })
    }
  </script>
</body>
</html>