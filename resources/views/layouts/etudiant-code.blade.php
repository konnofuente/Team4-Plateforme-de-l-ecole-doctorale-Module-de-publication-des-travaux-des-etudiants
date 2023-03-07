<!doctype html>
<html>
<head>
    @vite(['resources/css/app.css','resources/css/style.css','resources/css/font-awesome/css/all.css'])
   @include('includes.head')
   @include('includes.etudiant-code-header')
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
