<!doctype html>
<html lang="en">
  <head>
@include('partials\_head')
</head>

<body class="d-flex vh-100 flex-d-col flex-column">
  @include ('partials\_nav')

  <div class="container">

  @yield('content') 

  </div>

  @include('partials\_footer')

  @include('partials\_javascript')
</body>
</html>
