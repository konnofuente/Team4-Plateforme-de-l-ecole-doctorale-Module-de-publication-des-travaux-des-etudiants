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
    <div>
        @yield('left-section')
    </div>
    <div class="right-section">
        @yield('right-section')
    </div>
   </div>
   <footer class="row">
       @include('includes.footer')
   </footer>
</div>
</body>
</html>
