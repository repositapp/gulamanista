<?php
$akun = $this->m_user->getAkun($this->session->userdata('id_user'))->row_array();
$aplikasi = $this->db->get('set_aplikasi')->row_array();
?>

<aside class="main-sidebar">
   <section class="sidebar">
      <div class="user-panel" style="<?= $aplikasi['panel_active'] === '1' ? "display: block;" : "display: none;" ?>">
         <div class="pull-left image">
            <img src="<?= base_url(); ?>assets/upload/img/<?= $akun['img_user']; ?>" class="img-circle" alt="User Image">
         </div>
         <div class="pull-left info">
            <p><?= $akun['nama_user']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
         </div>
      </div>
      <?= generate_modul($this->session->userdata('role_id'), $title, $treeview); ?>
   </section>
</aside>

<div class="content-wrapper">
   <section class="content-header">
      <?= generate_breadcrumb($title, $sub_menu, $menu_link); ?>
   </section>

   <section class="content">