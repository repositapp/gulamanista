<?php
$aplikasi = $this->db->get('set_aplikasi')->row_array();
$akun = $this->m_user->getAkun($this->session->userdata('id_user'))->row_array();
is_logged_in($title);
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?= $title; ?> :: <?= $aplikasi['tab_title']; ?></title>
   <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/upload/img/<?= $aplikasi['logo_aplikasi']; ?>">
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/plugins/bootstrap/dist/css/bootstrap.min.css">
   <!-- Toast -->
   <link href="<?= base_url(); ?>assets/themes/plugins/toast/jquery.toast.min.css" rel="stylesheet">
   <!-- DataTables -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
   <!-- TinyMCE -->
   <script type="text/javascript" src="<?= base_url(); ?>assets/themes/plugins/tinymce/tinymce.js"></script>
   <!-- bootstrap datepicker -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Bootstrap time Picker -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/plugins/timepicker/bootstrap-timepicker.min.css">
   <!-- Select2 -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/plugins/select2/dist/css/select2.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/plugins/font-awesome/css/font-awesome.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/plugins/Ionicons/css/ionicons.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/css/AdminLTE.min.css">
   <!-- Skins Style -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/css/skins/_all-skins.min.css">
   <!-- Admin Style -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/css/admin-style.css">
   <!-- jQuery 3 -->
   <script src="<?= base_url(); ?>assets/themes/plugins/jquery/dist/jquery.min.js"></script>
   <!-- Url Script -->
   <script type="text/javascript">
      let url = '<?= base_url(); ?>';
   </script>

   <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue fixed sidebar-mini <?= $aplikasi['sidebar_hidden'] === '1' ? "sidebar-collapse" : "" ?>">
   <div class="wrapper">

      <header class="main-header">
         <a href="#" class="logo">
            <span class="logo-mini"><b><?= $aplikasi['sidebar_title_short']; ?></b></span>
            <span class="logo-lg"><b><?= $aplikasi['sidebar_title_long']; ?></b></span>
         </a>
         <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
               <ul class="nav navbar-nav">
                  <li class="dropdown user user-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= base_url(); ?>assets/upload/img/<?= $akun['img_user']; ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $akun['nama_user']; ?></span>
                     </a>
                     <ul class="dropdown-menu">
                        <li class="user-header">
                           <img src="<?= base_url(); ?>assets/upload/img/<?= $akun['img_user']; ?>" class="img-circle" alt="User Image">

                           <p>
                              <?= $akun['nama_user']; ?>
                              <small>Login Sebagai <?= $akun['role']; ?></small>
                           </p>
                        </li>
                        <li class="user-footer">
                           <div class="pull-left">
                              <a href="<?= base_url(); ?>user/profil" class="btn btn-default btn-flat">Profil</a>
                           </div>
                           <div class="pull-right">
                              <a href="<?= base_url(); ?>auth/logout" class="btn btn-default btn-flat">Logout</a>
                           </div>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
      </header>