<?php
if ($this->session->userdata('GM_LOGGED_IN')) {
   redirect('dashboard');
}
$aplikasi = $this->db->get('set_aplikasi')->row_array();
?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?= $title; ?></title>
   <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/upload/img/<?= $aplikasi['logo_aplikasi']; ?>">
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/plugins/bootstrap/dist/css/bootstrap.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/plugins/font-awesome/css/font-awesome.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/plugins/Ionicons/css/ionicons.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/css/AdminLTE.min.css">
   <!-- Login Style -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/css/login-style.css">

   <script type="text/javascript">
      let url = '<?= base_url(); ?>';
   </script>

   <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
   <div class="page-login">
      <div class="login-box">