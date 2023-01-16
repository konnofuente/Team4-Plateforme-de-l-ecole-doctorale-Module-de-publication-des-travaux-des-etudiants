<!doctype html>
<html>
<head>
    @vite(['resources/css/app.css','resources/css/style.css', 'resources/js/app.js'])
   @include('includes.head')
</head>
<body>
<div class="container">
   <header class="row">
       @include('includes.header')
   </header>
   <div id="main" class="template-main-container">
           @yield('left-section')
           @yield('right-section')
   </div>
   <footer class="row">
       @include('includes.footer')
   </footer>
</div>
</body>
</html>
