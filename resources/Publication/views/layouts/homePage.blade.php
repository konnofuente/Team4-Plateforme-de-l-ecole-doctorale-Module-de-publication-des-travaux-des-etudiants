<!doctype html>
<html>
<head>
    @vite(['resources/css/app.css','resources/css/style.css','resources/css/font-awesome/css/all.css'])
   @include('includes.head')
</head>
<body>
<div class="container">
   <header class="row">
       @include('includes.header')
   </header>
   <div id="main" >
    <!-- <div>
        @yield('left-section')
    </div> -->
    <div>
        @yield('right-section')
    </div>
   </div>
   <footer class="row">
       @include('includes.footer')
   </footer>
</div>
</body>
</html>
