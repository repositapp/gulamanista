<?php
$aplikasi = $this->db->get('set_aplikasi')->row_array();
$kontak = $this->db->get('set_kontak')->row_array();
$q_medsos = $this->db->get('media_sosial');
$q_regulasi = $this->db->get('rel_regulasi');
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title><?= $title; ?> :: <?= $aplikasi['tab_title']; ?></title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- <link rel="manifest" href="site.webmanifest"> -->
   <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>assets/upload/img/<?= $aplikasi['logo_aplikasi']; ?>">
   <!-- Place favicon.ico in the root directory -->

   <!-- CSS here -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/ui/css/bootstrap.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/themes/ui/js/DataTables/datatables.min.css" />

   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/ui/css/owl.carousel.min.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/ui/css/magnific-popup.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/ui/css/font-awesome.min.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/ui/css/themify-icons.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/ui/css/nice-select.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/ui/css/flaticon.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/ui/css/animate.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/ui/css/slicknav.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/ui/css/style.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/themes/ui/css/ui.css">
   <script src="<?= base_url(); ?>assets/themes/ui/js/vendor/jquery-1.12.4.min.js"></script>
   <script type="text/javascript">
      let url = '<?= base_url(); ?>';
   </script>
</head>

<body>

   <!-- header-start -->
   <header>
      <div class="header-area ">
         <div class="header-top black-bg d-none d-md-block">
            <div class="container">
               <div class="row">
                  <div class="col-xl-6 col-md-6 col-lg-6">
                     <div class="header-contact">
                        <a href="<?= base_url(); ?>kontak">Hubungi Kami</a>
                     </div>
                  </div>
                  <div class="col-xl-6 col-md-6 col-lg-6">
                     <div class="header-top-menu">
                        <nav>
                           <ul>
                              <?php foreach ($q_medsos->result_array() as $medsos) : ?>
                                 <li><a href="<?= $medsos['link_akun']; ?>" target="_blank"><i class="<?= $medsos['icon']; ?>"></i></a></li>
                              <?php endforeach; ?>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="header-container container z-index-2">
            <div class="header-row">
               <div class="header-column">
                  <div class="header-row">
                     <div class="header-logo header-logo-sticky-change">
                        <a href="https://portal.baubaukota.go.id/" target="_blank">
                           <img class="header-logo-non-sticky opacity-0" alt="Logo Pemkot Baubau" style="width:auto; height:65px" src="<?= base_url(); ?>assets/upload/img/logo-kota-baubau.png">
                        </a>
                     </div>
                     <div class="header-logo header-logo-sticky-change">
                        <a href="https://diskominfo.baubaukota.go.id/" target="_blank">
                           <img class="header-logo-non-sticky opacity-0" alt="Logo Dinas Keminfo" style="width:auto; height:65px" src="<?= base_url(); ?>assets/upload/img/logo-kominfo.png">
                        </a>
                     </div>
                  </div>
               </div>
               <div class="header-column justify-content-end">
                  <div class="header-row">
                     <ul class="header-extra-info d-flex align-items-center">
                        <li class="d-none d-sm-inline-flex">
                           <div class="header-extra-info-text">
                              <img alt="Logo UMKM Go Online" height="60" src="<?= base_url(); ?>assets/upload/img/logo-umkm-go-online.png">
                           </div>
                        </li>
                        <li class="d-none d-sm-inline-flex">
                           <div class="header-extra-info-text">
                              <label>EMAIL KAMI</label>
                              <strong><a href="mailto:<?= $kontak['email']; ?>"><?= $kontak['email']; ?></a></strong>
                           </div>
                        </li>
                        <li>
                           <div class=" header-extra-info-text">
                              <label>HUBUNGI KAMI</label>
                              <strong><a href="javascript:void(0)"><?= $kontak['telepon']; ?></a></strong>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>

         <div id="sticky-header" class="main-header-area white-bg">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xl-2 col-lg-2">
                     <div class="logo-img">
                        <a href="index.html">
                           <img src="<?= base_url(); ?>assets/upload/img/<?= $aplikasi['logo_aplikasi']; ?>" alt="Logo Gulamanista" width="150">
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-7 col-lg-7">
                     <div class="main-menu d-none d-lg-block">
                        <nav>
                           <ul id="navigation">
                              <li><a class="<?= $treeview ===  'Home' ? "active" : "" ?>" href="<?= base_url(); ?>home">Home</a></li>
                              <li><a class="<?= $treeview ===  'Regulasi' ? "active" : "" ?> href=" #">Regulasi <i class="ti-angle-down"></i></a>
                                 <ul class="submenu">
                                    <?php foreach ($q_regulasi->result_array() as $regulasi) : ?>
                                       <li><a href="<?= base_url(); ?>regulasi/list/<?= $regulasi['slug_regulasi'] ?>"><?= $regulasi['nama_regulasi']; ?></a></li>
                                    <?php endforeach; ?>
                                 </ul>
                              </li>
                              <li><a class="<?= $treeview ===  'Pojok Informasi' ? "active" : "" ?>" href="<?= base_url(); ?>informasi/pojok_informasi">Pojok Informasi</a></li>
                              <li><a class="<?= $treeview ===  'Agenda' ? "active" : "" ?>" href="<?= base_url(); ?>informasi/agenda">Agenda</a></li>
                              <li><a class="<?= $treeview ===  'Berita' ? "active" : "" ?>" href="<?= base_url(); ?>artikel">Berita</a></li>
                              <li><a class="<?= $treeview ===  'Galeri' ? "active" : "" ?>" href="#">Galeri <i class="ti-angle-down"></i></a>
                                 <ul class="submenu">
                                    <li><a href="<?= base_url(); ?>foto">Foto</a></li>
                                    <li><a href="<?= base_url(); ?>video">Video</a></li>
                                 </ul>
                              </li>
                              <li><a class="<?= $treeview ===  'Kontak' ? "active" : "" ?>" href="<?= base_url(); ?>kontak">Kontak</a></li>
                              <li><a href="#">Login <i class="ti-angle-down"></i></a>
                                 <ul class="submenu">
                                    <li><a href="<?= base_url(); ?>auth" target="_blank">Petugas</a></li>
                                    <li><a href="<?= base_url(); ?>login">UMKM</a></li>
                                 </ul>
                              </li>
                           </ul>
                        </nav>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-3">
                     <div class="quote-area">
                        <div class="search-bar">
                           <!-- <a id="search_1" href="javascript:void(0)"><i class="fa fa-search"></i></a> -->
                        </div>
                        <div class="get-quote d-none d-lg-block">
                           <a class="boxed-btn" href="<?= base_url(); ?>pendaftaran">Pendaftaran</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="mobile_menu d-block d-lg-none"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- header-end -->