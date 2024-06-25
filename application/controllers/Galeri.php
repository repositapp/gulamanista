<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Galeri extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_galeri');
   }

   public function gambar()
   {
      $data['title'] = 'Gambar';
      $data['treeview'] = 'Admin Web';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_gambar'] = $this->m_galeri->getGambar(null);

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('galeri/gambar', $data);
      $this->load->view('_templates/dashboard/_footer');

      if ($this->input->post('tambah_data') == 'tambah') {
         $gambar_galeri = $_FILES['gambar_galeri'];
         if ($gambar_galeri) {
            $config['upload_path'] = './assets/upload/img/';
            $config['allowed_types'] = 'png|jpg|jpeg|svg|gif';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_galeri')) {
               $gambar_galeri = $this->upload->data('file_name');
            } else {
               echo "Upload Gagal!!";
               die();
            }
         }

         $insert = [
            'nm_gambar' => $this->input->post('nm_gambar'),
            'gambar' => $gambar_galeri,
            'enabled' => 1,
            'upload_at' => time_zone('date_time')
         ];

         $this->m_action->insertData('galeri_gambar', $insert, null);

         $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah bertambah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
         redirect('galeri/gambar');
      }

      if ($this->input->post('ubah_data') == 'ubah') {
         $id_gambar = $this->input->post('id_gambar');
         $old_image = $this->input->post('old_image');
         $gambar_galeri = $_FILES['gambar_galeri'];

         if ($this->input->post('ubah_foto')) {
            if ($old_image != 'default.jpg') {
               unlink(FCPATH . 'assets/upload/img/' . $old_image);
            }

            $config['upload_path'] = './assets/upload/img/';
            $config['allowed_types'] = 'png|jpg|jpeg|svg|gif';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_galeri')) {
               $gambar_galeri = $this->upload->data('file_name');
            } else {
               echo "Upload Gagal!!";
               die();
            }
         } else {
            $gambar_galeri = $old_image;
         }

         $update = [
            'nm_gambar' => $this->input->post('nm_gambar'),
            'gambar' => $gambar_galeri
         ];

         $where = array(
            "id" => $id_gambar
         );

         $this->m_action->insertData('galeri_gambar', $update, $where);
         $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
         redirect('galeri/gambar');
      }
   }

   public function hapus_gambar($id)
   {
      $id_gambar = $this->secure->decrypt_url($id);
      $gbr = $this->db->get_where('galeri_gambar', ['id' => $id_gambar])->row_array();

      $old_image = $gbr['gambar'];
      if ($old_image != 'default.jpg') {
         unlink(FCPATH . 'assets/upload/img/' . $old_image);
      }

      $where = array('id' => $id_gambar);
      $this->m_action->deleteData('galeri_gambar', $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah dihapus..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('galeri/gambar');
   }

   public function video()
   {
      $data['title'] = 'Video';
      $data['treeview'] = 'Admin Web';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_video'] = $this->m_galeri->getVideo(null);

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('galeri/video', $data);
      $this->load->view('_templates/dashboard/_footer');

      if ($this->input->post('tambah_data') == 'tambah') {
         $insert = [
            'nm_video' => $this->input->post('nm_video'),
            'iframe_video' => $this->input->post('iframe_video'),
            'enabled' => 1,
            'upload_at' => time_zone('date_time')
         ];

         $this->m_action->insertData('galeri_video', $insert, null);

         $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah bertambah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
         redirect('galeri/video');
      }

      if ($this->input->post('ubah_data') == 'ubah') {
         $id_video = $this->input->post('id_video');

         $update = [
            'nm_video' => $this->input->post('nm_video'),
            'iframe_video' => $this->input->post('iframe_video')
         ];

         $where = array(
            "id" => $id_video
         );

         $this->m_action->insertData('galeri_video', $update, $where);
         $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
         redirect('galeri/video');
      }
   }

   public function hapus_video($id)
   {
      $id_video = $this->secure->decrypt_url($id);

      $where = array('id' => $id_video);
      $this->m_action->deleteData('galeri_video', $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah dihapus..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('galeri/video');
   }
}
