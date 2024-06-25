<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Aplikasi extends CI_Controller
{
   public function index()
   {
      $data['title'] = 'Aplikasi';
      $data['treeview'] = 'Pengaturan';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['aplikasi'] = $this->m_action->getDataASC('set_aplikasi', null, 'id', null)->row_array();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('setting/setting_apk', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function ubah()
   {
      $id = $this->input->post('id');
      $old_logo = $this->input->post('old_logo');
      $logo_aplikasi = $_FILES['logo_aplikasi'];

      if ($this->input->post('ubah_logo')) {
         if ($old_logo != 'default.png') {
            unlink(FCPATH . 'assets/upload/img/' . $old_logo);
         }

         $config['upload_path'] = './assets/upload/img/';
         $config['allowed_types'] = 'png';
         $config['encrypt_name']  = true;

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('logo_aplikasi')) {
            $logo_aplikasi = $this->upload->data('file_name');
         } else {
            echo "Upload Gagal!!";
            die();
         }
      } else {
         $logo_aplikasi = $old_logo;
      }

      $old_image = $this->input->post('old_image');
      $login_bg = $_FILES['login_bg'];

      if ($this->input->post('ubah_bg')) {
         if ($old_image != 'default.png') {
            unlink(FCPATH . 'assets/upload/img/' . $old_image);
         }

         $config['upload_path'] = './assets/upload/img/';
         $config['allowed_types'] = 'png|jpg|jpeg';
         $config['encrypt_name']  = true;

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('login_bg')) {
            $login_bg = $this->upload->data('file_name');
         } else {
            echo "Upload Gagal!!";
            die();
         }
      } else {
         $login_bg = $old_image;
      }

      $old_image_umkm = $this->input->post('old_image_umkm');
      $logo_login_umkm = $_FILES['logo_login_umkm'];

      if ($this->input->post('ubah_img_login_umkm')) {
         if ($old_image_umkm != 'default.png') {
            unlink(FCPATH . 'assets/upload/img/' . $old_image_umkm);
         }

         $config['upload_path'] = './assets/upload/img/';
         $config['allowed_types'] = 'png|jpg|jpeg';
         $config['encrypt_name']  = true;

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('logo_login_umkm')) {
            $logo_login_umkm = $this->upload->data('file_name');
         } else {
            echo "Upload Gagal!!";
            die();
         }
      } else {
         $logo_login_umkm = $old_image_umkm;
      }

      $old_image_header = $this->input->post('old_image_header');
      $bg_header = $_FILES['bg_header'];

      if ($this->input->post('ubah_bg_header')) {
         if ($old_image_header != 'default.jpg') {
            unlink(FCPATH . 'assets/upload/img/' . $old_image_header);
         }

         $file_name = 'banner.jpg';

         $config['upload_path'] = './assets/upload/img/';
         $config['allowed_types'] = 'png|jpg|jpeg';
         $config['file_name'] = $file_name;

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('bg_header')) {
            $bg_header = $this->upload->data('file_name');
         } else {
            echo "Upload Gagal!!";
            die();
         }
      } else {
         $bg_header = $old_image_header;
      }

      $old_video = $this->input->post('old_video');
      $opening = $_FILES['opening'];

      if ($this->input->post('ubah_opening')) {
         if ($old_video != 'ocean.mp4') {
            unlink(FCPATH . 'assets/upload/video/' . $old_video);
         }

         $config['upload_path'] = './assets/upload/video/';
         $config['allowed_types'] = 'mp4|webm';
         $config['encrypt_name']  = true;

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('opening')) {
            $opening = $this->upload->data('file_name');
         } else {
            echo "Upload Gagal!!";
            die();
         }
      } else {
         $opening = $old_video;
      }

      $update = [
         'tab_title' => $this->input->post('tab_title'),
         'sidebar_title_long' => $this->input->post('sidebar_title_long'),
         'sidebar_title_short' => $this->input->post('sidebar_title_short'),
         'sidebar_hidden' => $this->input->post('sidebar_hidden'),
         'panel_active' => $this->input->post('panel_active'),
         'time_zone' => $this->input->post('time_zone'),
         'login_title' => $this->input->post('login_title'),
         'login_bg' => $login_bg,
         'logo_aplikasi' => $logo_aplikasi,
         'logo_login_umkm' => $logo_login_umkm,
         'bg_header' => $bg_header,
         'opening' => $opening,
         'aplikasi_update' => time_zone('date_time')
      ];

      $where = array(
         "id" => $id
      );

      $this->m_action->insertData('set_aplikasi', $update, $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('aplikasi');
   }
}
