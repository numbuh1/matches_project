<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Fixed Layout</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../vendor/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vendor/jquery-ui/themes/black-tie/jquery-ui.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../vendor/Ionicons/css/ionicons.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../css/skins/_all-skins.min.css">
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="../css/sweetalert2.min.css">
  <!-- Popup -->
  <link rel="stylesheet" href="../css/popup.css">
  <!-- Global -->
  <link rel="stylesheet" href="../css/global.css">
  <!-- Impact -->
  <link rel="stylesheet" href="../css/impact/pe-icons.css">
  <link rel="stylesheet" href="../css/impact/prettyPhoto.css">
  <link rel="stylesheet" href="../css/impact/animate.css">
  <link rel="stylesheet" href="../css/impact/style.css">

  @yield('css')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="">
<!-- Site wrapper -->
<div class="wrapper">

  @include('user.layout.header')

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('user.layout.footer')

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<textarea id="popupContent" style="display:none">
  @include("user.popup")
</textarea>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="../js/impact/jquery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../js/impact/bootstrap.min.js"></script>
<script src="../js/impact/jquery-ui.min.js"></script>
<!-- Isotope -->
<script src="../js/impact/jquery.isotope.min.js"></script>
<script src="../js/impact/html5shiv.js"></script>
<!-- Sweet Alert -->
<script src="../js/sweetalert2.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- Popup -->
<script src="../js/popup.js"></script>
<!-- Custom -->
<script src="../js/impact/plugins.js"></script>
<script src="../js/impact/jquery.prettyPhoto.js"></script>   
<script src="../js/impact/init.js"></script>
<script src="../js/impact/respond.min.js"></script>


@yield('js')
</body>
</html>
