<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Painel  de Controle</title>

  <link rel="stylesheet" href="https://nagumo.marketingonline.click/public/vendor/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://nagumo.marketingonline.click/public/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="https://nagumo.marketingonline.click/public/vendor/adminlte/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="https://nagumo.marketingonline.click/resources/views/admin/adminlte/plugins/chart.js/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     
</head>

<body class="hold-transition sidebar-mini" id="page-top">
<div class="wrapper">
  
  <!-- Topbar -->
  @include('layouts.navbar')
  <!-- End of Topbar -->
  

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/public/admin/dashboard" class="brand-link">
      <img src="https://nagumo.marketingonline.click/public/vendor/img/logo_nagumo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Nagumo-HORTIFRUTI</span>
    </a>

    <div class="sidebar">




    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    
    
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="https://nagumo.marketingonline.click/public/admin/dashboard" class="nav-link">
              <!--link icone font Aweson-->
              <i class="nav-icon fas fa-tachometer-alt"></i>  
              <p>
                DASHBOARD 
              </p>
            </a>
          </li>
          
        </ul>
        
           
      </div>


      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://nagumo.marketingonline.click/public/vendor/img/logo_user.png" class="img-circle elevation-2">
        </div>

        <div class="info">
          <?php $nome=auth()->user()->name  ?>
        @if($nome)
          <a href="https://nagumo.marketingonline.click/public/admin/p-usuarios-profile" class="d-block">Perfil: {{ auth()->user()->name}}</a>
          
          @else
          <a href="https://nagumo.marketingonline.click/public/home" class="d-block">Perfil</a>
          @endif
        </div>
           
      </div>

       <!-- Navbar2 -->
       @include('layouts.navbar2')
        <!-- End of Topbar -->

        <!-- Navbar >
          implementando inclusao layout navbar separado
        </footer> -->
     </div>
  </aside>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  
        <!--Aqui sera colocado conteudo de cada section extend-->
          <!--conteudo de frm cadastro novo prod-->
          @yield('content_cadastro_pro')

          <!--conteudo de frm perfile-->
          @yield('content_dashboard')

        <!--conteudo de frm perfile-->
          @yield('content_profile_user')

          <!--conteudo de frm lista usuarios-->
          @yield('content_list_user')
        <!--conteudo de frm permissao-->

         @yield('content_permissao')
        <!--conteudo de frm Alterar-->
        
        @yield('content_alterar')
          <!--Fim section extend-->
          

          <!--conteudo de frm listeProd-->
                  
          @yield('content_liste_prod')
          <!--Fim section extend-->

          <!--conteudo de frm listeProd-Continue-->
          @yield('content_liste_prod_continue')
          <!--Fim section extend-->

           <!-- Footer -->
        @include('layouts.footer')
           <!-- End of Footer -->
      
        <!-- <footer >
          implementando inclusao layout footer separado
        </footer> -->



        <!-- daqui pra cima ficaria o restante do arquivo -->
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('script')
       <!-- End script-->
</div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<img width="52" height="52" src="https://img.icons8.com/metro/52/000000/up--v1.png" alt="up--v1"/>
  </a>
<script src="https://nagumo.marketingonline.click/public/vendor/jquery/jquery.min.js"></script>
        <script src="https://nagumo.marketingonline.click/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://nagumo.marketingonline.click/public/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="https://nagumo.marketingonline.click/public/vendor/adminlte/dist/js/adminlte.min.js"></script>

       
    
<script src="{{asset('panel/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script>
    $(function() {
        $('[data-mask]').inputmask()
    });
</script>
</body>
</html>
