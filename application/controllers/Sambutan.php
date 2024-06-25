<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sambutan extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_sambutan');
   }

   public function index()
   {
      $data['title'] = 'Sambutan';
      $data['treeview'] = 'Admin Web';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['sambutan'] = $this->m_sambutan->getSambutan()->row_array();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('sambutan/sambutan_update', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function simpan_perubahan()
   {
      $id_sambutan = $this->input->post('id_sambutan');
      $old_image = $this->input->post('old_image');
      $foto_pimpinan = $_FILES['foto_pimpinan'];

      if ($this->input->post('ubah_foto')) {
         if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/upload/img/' . $old_image);
         }

         $config['upload_path'] = './assets/upload/img/';
         $config['allowed_types'] = 'png|jpg|jpeg|svg|gif';
         $config['encrypt_name']  = true;

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('foto_pimpinan')) {
            $foto_pimpinan = $this->upload->data('file_name');
         } else {
            echo "Upload Gagal!!";
            die();
         }
      } else {
         $foto_pimpinan = $old_image;
      }

      $update = [
         'pemberi_sambutan' => $this->input->post('pemberi_sambutan'),
         'isi_sambutan' => $this->input->post('isi_sambutan'),
         'foto_pimpinan' => $foto_pimpinan
      ];

      $where = array(
         "id" => $id_sambutan
      );

      $this->m_action->insertData('sambutan', $update, $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('sambutan');
   }
}
