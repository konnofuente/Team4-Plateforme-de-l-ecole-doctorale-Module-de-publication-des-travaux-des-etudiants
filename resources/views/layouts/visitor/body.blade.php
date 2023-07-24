<!DOCTYPE html>
<html lang="fr">
@include('layouts.visitor.header')
<?php
    $domaines = config('global.constants.domaines');
?>
<!-- TTtetnetetdfdf -->
<!--Main Navigation-->
<header>

  <!-- Sidebar -->

  <nav id="sidebarMenu" class="d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a href="{{route('visiteur.all')}}" class="list-group-item list-group-item-action py-2 ripple active">
          <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Memoires Recent</span>
        </a>
        <a href="{{route('visiteur.creer')}}" class="list-group-item list-group-item-action py-2 ripple ">
          <i class="fas fa-chart-area fa-fw me-3"></i><span>Soummision</span>
        </a>
        <a href="{{route('visiteur.creerFinale')}}" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-lock fa-fw me-3"></i><span>Code Soumission</span></a>
        <a href="{{route('visiteur.search')}}" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-search fa-fw me-3"></i><span>Rechercher</span></a>

        <br>
        <p>Different Categories :</p>
        @foreach($domaines as $dom)
        <a href="{{route('visiteur.all.category',$dom)}}" class="list-group-item list-group-item-action py-2 ripple">
            <i class="bi bi-archive-fill me-3"></i>
            <!-- <i class="fas fa-search fa-fw me-3"></i> -->
            <span>{{$dom}}</span></a>
        @endforeach
      </div>
    </div>
  </nav>
  <!-- Sidebar -->
<!-- Font Awesome -->

<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
  rel="stylesheet"
/>
<script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script>
  <!-- Navbar -->
  <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top"
    style="box-shadow: 0 5px 10px -5px;height:80px;"
  >
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button class="navbar-toggler"
              data-mdb-toggle="collapse"
              data-mdb-target="#sidebarMenu"
              aria-controls="sidebarMenu"
              aria-expanded="false"
              aria-label="Toggle navigation">
        <i class="fas fa-bars" id="barsIcon"></i>
      </button>

      <!-- Brand -->
      <a class="navbar-brand" href="#">
        <img src="https://mdbootstrap.com/img/logo/COF-transaprent-noshadows.png" height="25" alt="" loading="lazy" />
      </a>
      <!-- Search form -->
      <div>
        <img src="{{asset('assets/img/ecoleDoctorale.jpeg')}}" height="50"/>
      </div>
      <div class="d-none d-md-flex input-group w-auto my-auto">
        <!-- <h4>PUBLICATION DES TRAVAUX ETUDIANTS</h4> -->
        <h4 style="font-weight:800;padding-left:20px;color:#0d6efd;">Ecole doctorale : Publication Des Travaux Etudiants</h4>
</div>

      <ul class="navbar-nav ms-auto d-flex flex-row">
      </ul>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
  <style></style>
</header>

<body>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 110px" id="main">
  <div class="container pt-4">
  @yield('content')
  </div>
</main>
<!--Main layout-->
<!-- ererererer -->

    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>GestionEtudiant</span></strong>. All Rights Reserved
        </div>
    </footer>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    @yield('modals')

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>

    <script>

$(document).ready(function(e){
    var path = window.location.href;
                $("a.list-group-item").each(function(item){


                        var path = window.location.href;
                        var urlSegment = $(this).attr('href').lastIndexOf('/')+1;

                        var urlPath = $(this).attr('href').substring(urlSegment)

                        var current = path.substring(path.lastIndexOf('/')+1);

                        if(current == urlPath){
                            console.log('yeahhh')
                            $("a.list-group-item.active").removeClass('active')
                            $(this).addClass('active')
                        }

                })

});


/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("sidebarMenu").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}


                // $("a.list-group-item").on('click', function(e){
                //     console.log(this)
                //     e.stopImmediatePropagation();
                // $("a.list-group-item.active").removeClass('active');
                //  return $(this).addClass('active')})
    </script>
<style>
        h4{
            font-variant: small-caps;
        }
        .social-linkss a{
            padding-right: 10px;
        }
</style>
    @yield('scripts')

</body>

</html>
