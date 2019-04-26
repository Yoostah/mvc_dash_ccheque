<!doctype html>
<html lang="pt-br">

<head>
  <title>Controle de Cheque </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/dash/css/google_material_icons.css" />
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/dash/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="<?php echo BASE_URL; ?>assets/dash/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- Meu CSS -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/ccheque.css">
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange" data-background-color="black" data-image="<?php echo BASE_URL; ?>assets/dash/img/sidebar-2.jpg">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="<?php echo BASE_URL; ?>" class="simple-text logo-normal"><img src="<?php echo BASE_URL; ?>assets/imagens/logo_cheque.png" alt="Controle de Cheque">CCHEQUE</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php echo (isset($menu) && $menu == 'home') ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo BASE_URL; ?>">
              <i class="material-icons">dashboard</i>
              <p>Painel de Controle</p>
            </a>
          </li>
					<li class="nav-item <?php echo (isset($menu) && $menu == 'cheque') ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo BASE_URL; ?>cheque">
              <i class="material-icons">local_atm</i>
              <p>Cheques</p>
            </a>
          </li>
					<li class="nav-item <?php echo (isset($menu) && $menu == 'banco') ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo BASE_URL; ?>banco">
              <i class="material-icons">store_mall_directory</i>
              <p>Bancos</p>
            </a>
          </li>
					<li class="nav-item <?php echo (isset($menu) && $menu == 'feriado') ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo BASE_URL; ?>feriado">
              <i class="material-icons">calendar_today</i>
              <p>Feriados</p>
            </a>
          </li>
					<li class="nav-item <?php echo (isset($menu) && $menu == 'user') ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo BASE_URL; ?>user">
              <i class="material-icons">account_circle</i>
              <p>Perfil de Usuario</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)"><?php echo (isset($titulo) && !empty($titulo)) ? $titulo : 'Página não Encontrada' ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">notifications</i>
                  <p class="d-lg-none d-md-block">
                    Notifications
                  </p>
                </a>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">          
          <div class="copyright float-right">
            Controle de Cheque &copy; 19.2.0
            <!--<script>
              document.write(new Date().getFullYear())
            </script>-->
						<!-- , made with <i class="material-icons">favorite</i> by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web. -->
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo BASE_URL; ?>assets/dash/js/core/jquery.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/dash/js/core/popper.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/dash/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/dash/js/events.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/dash/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="<?php echo BASE_URL; ?>assets/dash/js/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
  <!-- Chartist JS -->
  <script src="<?php echo BASE_URL; ?>assets/dash/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo BASE_URL; ?>assets/dash/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo BASE_URL; ?>assets/dash/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo BASE_URL; ?>assets/dash/demo/demo.js"></script>
  <!-- JS do Projeto -->
  <script src="<?php echo BASE_URL; ?>assets/js/ccheque.js"></script>
   <!-- JS SweetAlert -->
  <script src="<?php echo BASE_URL; ?>assets/js/sweetalert2.js"></script>
 
  <?php 
  if (isset($cadastro) && $cadastro === true )
	  echo "<script>$(function() { $.notify({ message: 'Cadastrado com Sucesso!' },{ type: 'success' })});</script>";
  elseif (isset($cadastro) ) 
    echo "<script>$(function() { $.notify({ title: '<strong>Não foi possível efetuar o cadastro</strong><br>',
      message: '[".addslashes($cadastro)."]'},{ type: 'danger' })});</script>";
  ?>
</body>

</html>
