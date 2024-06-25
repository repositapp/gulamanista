<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pojok_informasi extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_informasi');
   }

   public function list()
   {
      $data['title'] = 'Pojok Informasi';
      $data['treeview'] = 'Informasi';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_pojok'] = $this->m_informasi->getPojok(null);

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('informasi/pojok/list', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function tambah()
   {
      $data['title'] = 'Pojok Informasi';
      $data['treeview'] = 'Informasi';
      $data['sub_menu'] = 'Tambah Data';
      $data['menu_link'] = 'pojok_informasi/list';

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('informasi/pojok/pojok_add', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function ubah($id)
   {
      $data['title'] = 'Pojok Informasi';
      $data['treeview'] = 'Informasi';
      $data['sub_menu'] = 'Ubah Data';
      $data['menu_link'] = 'pojok_informasi/list';
      $data['pojok'] = $this->m_informasi->getPojok(array('id' => $this->secure->decrypt_url($id)))->row_array();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('informasi/pojok/pojok_update', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function simpan_data()
   {
      $dokumen_pojok = $_FILES['dokumen_pojok'];
      if ($dokumen_pojok) {
         $config['upload_path'] = './assets/upload/doc/';
         $config['allowed_types'] = 'pdf';
         $config['encrypt_name']  = true;

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('dokumen_pojok')) {
            $dokumen_pojok = $this->upload->data('file_name');
         } else {
            echo "Upload Gagal!!";
            die();
         }
      }

      $insert = [
         'nm_dokumen' => $this->input->post('nm_dokumen'),
         'dokumen_pojok' => $dokumen_pojok,
         'created_at' => time_zone('date_time'),
         'created_by' => $this->session->userdata('id_user'),
      ];

      $this->m_action->insertData('pojok_informasi', $insert, null);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah bertambah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('pojok_informasi/list');
   }

   public function simpan_perubahan()
   {
      $id_pojok = $this->input->post('id');
      $old_doc = $this->input->post('old_doc');
      $dokumen_pojok = $_FILES['dokumen_pojok'];

      if ($this->input->post('ubah_dokumen')) {
         if ($old_doc != 'default.pdf') {
            unlink(FCPATH . 'assets/upload/doc/' . $old_doc);
         }

         $config['upload_path'] = './assets/upload/doc/';
         $config['allowed_types'] = 'pdf';
         $config['encrypt_name']  = true;

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('dokumen_pojok')) {
            $dokumen_pojok = $this->upload->data('file_name');
         } else {
            echo "Upload Gagal!!";
            die();
         }
      } else {
         $dokumen_pojok = $old_doc;
      }

      $update = [
         'nm_dokumen' => $this->input->post('nm_dokumen'),
         'dokumen_pojok' => $dokumen_pojok,
         'update_at' => time_zone('date_time'),
         'update_by' => $this->session->userdata('id_user'),
      ];

      $where = array(
         "id" => $id_pojok
      );

      $this->m_action->insertData('pojok_informasi', $update, $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('pojok_informasi/list');
   }

   public function hapus($id)
   {
      $id_pojok = $this->secure->decrypt_url($id);
      $doc = $this->db->get_where('pojok_informasi', ['id' => $id_pojok])->row_array();

      $old_doc = $doc['dokumen_pojok'];
      if ($old_doc != 'default.pdf') {
         unlink(FCPATH . 'assets/upload/doc/' . $old_doc);
      }

      $where = array('id' => $id_pojok);
      $this->m_action->deleteData('pojok_informasi', $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah dihapus..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('pojok_informasi/list');
   }
}
