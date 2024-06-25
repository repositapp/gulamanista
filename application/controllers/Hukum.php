<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hukum extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_hukum');
   }

   public function regulasi()
   {
      $data['title'] = 'Produk Hukum';
      $data['treeview'] = 'Produk Hukum';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_regulasi'] = $this->m_hukum->getListRegulasi();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('produk_hukum/regulasi', $data);
      $this->load->view('_templates/dashboard/_footer');

      if ($this->input->post('tambah_data') == 'tambah') {
         $insert = [
            'nama_regulasi' => $this->input->post('nama_regulasi'),
            'slug_regulasi' => slug($this->input->post('nama_regulasi', TRUE))
         ];

         $this->m_action->insertData('rel_regulasi', $insert, null);

         $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah bertambah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
         redirect('hukum/regulasi');
      }

      if ($this->input->post('ubah_data') == 'ubah') {
         $regulasi_id = $this->input->post('regulasi_id');

         $query = $this->db->get_where('produk_hukum', ['regulasi_id' => $regulasi_id]);
         if ($query->num_rows() > 0) {
            $update_produk = [
               'regulasi_slug' => slug($this->input->post('nama_regulasi', TRUE))
            ];

            $where_produk = array(
               "regulasi_id" => $regulasi_id
            );

            $this->m_action->insertData('produk_hukum', $update_produk, $where_produk);
         }

         $update = [
            'nama_regulasi' => $this->input->post('nama_regulasi'),
            'slug_regulasi' => slug($this->input->post('nama_regulasi', TRUE))
         ];

         $where = array(
            "id" => $regulasi_id
         );

         $this->m_action->insertData('rel_regulasi', $update, $where);
         $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
         redirect('hukum/regulasi');
      }
   }

   public function hapus_regulasi($id)
   {
      $regulasi_id = $this->secure->decrypt_url($id);

      $query = $this->db->get_where('produk_hukum', ['regulasi_id' => $regulasi_id]);
      if ($query->num_rows() > 0) {
         $where = array('regulasi_id' => $regulasi_id);
         $this->m_action->deleteData('produk_hukum', $where);
      }

      $where = array('id' => $regulasi_id);
      $this->m_action->deleteData('rel_regulasi', $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah dihapus..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('hukum/regulasi');
   }

   public function detail_regulasi($slug)
   {
      $data['title'] = 'Produk Hukum';
      $data['treeview'] = 'Produk Hukum';
      $data['sub_menu'] = 'Detail Regulasi';
      $data['menu_link'] = 'hukum/regulasi';
      $data['data_produk_hukum'] = $this->m_hukum->getListProdukHukum($slug);
      $data['regulasi'] = $this->m_action->getDataASC('rel_regulasi', array('slug_regulasi' => $slug), 'id', null)->row_array();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('produk_hukum/regulasi_detail', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function tambah($slug)
   {
      $data['title'] = 'Produk Hukum';
      $data['treeview'] = 'Produk Hukum';
      $data['sub_menu'] = 'Tambah Data';
      $data['menu_link'] = 'hukum/regulasi';
      $data['regulasi'] = $this->m_action->getDataASC('rel_regulasi', array('slug_regulasi' => $slug), 'id', null)->row_array();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('produk_hukum/hukum_add', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function ubah()
   {
      $data['title'] = 'Produk Hukum';
      $data['treeview'] = 'Produk Hukum';
      $data['sub_menu'] = 'Tambah Data';
      $data['menu_link'] = 'hukum/regulasi';
      $data['produk_hukum'] = $this->m_hukum->getDetailProdukHukum($this->secure->decrypt_url($this->uri->segment('4')))->row_array();
      $data['regulasi'] = $this->m_action->getDataASC('rel_regulasi', array('slug_regulasi' => $this->uri->segment('3')), 'id', null)->row_array();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('produk_hukum/hukum_update', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function simpan_data($slug)
   {
      $query = $this->db->get_where('rel_regulasi', ['slug_regulasi' => $slug])->row_array();

      $dokumen_hukum = $_FILES['dokumen_hukum'];
      if ($dokumen_hukum) {
         $config['upload_path'] = './assets/upload/doc/';
         $config['allowed_types'] = 'pdf';
         $config['encrypt_name']  = true;

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('dokumen_hukum')) {
            $dokumen_hukum = $this->upload->data('file_name');
         } else {
            echo "Upload Gagal!!";
            die();
         }
      }

      $insert = [
         'regulasi_id' => $query['id'],
         'regulasi_slug' => $query['slug_regulasi'],
         'nm_dokumen' => $this->input->post('nm_dokumen'),
         'dokumen_hukum' => $dokumen_hukum,
         'created_at' => time_zone('date_time'),
         'created_by' => $this->session->userdata('id_user'),
      ];

      $this->m_action->insertData('produk_hukum', $insert, null);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah bertambah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('hukum/detail_regulasi/' . $slug);
   }

   public function simpan_perubahan($slug)
   {
      $query = $this->db->get_where('rel_regulasi', ['slug_regulasi' => $slug])->row_array();

      $id_hukum = $this->input->post('id_hukum');
      $old_doc = $this->input->post('old_doc');
      $dokumen_hukum = $_FILES['dokumen_hukum'];

      if ($this->input->post('ubah_dokumen')) {
         if ($old_doc != 'default.pdf') {
            unlink(FCPATH . 'assets/upload/doc/' . $old_doc);
         }

         $config['upload_path'] = './assets/upload/doc/';
         $config['allowed_types'] = 'pdf';
         $config['encrypt_name']  = true;

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('dokumen_hukum')) {
            $dokumen_hukum = $this->upload->data('file_name');
         } else {
            echo "Upload Gagal!!";
            die();
         }
      } else {
         $dokumen_hukum = $old_doc;
      }

      $update = [
         'regulasi_id' => $query['id'],
         'regulasi_slug' => $query['slug_regulasi'],
         'nm_dokumen' => $this->input->post('nm_dokumen'),
         'dokumen_hukum' => $dokumen_hukum,
         'update_at' => time_zone('date_time'),
         'update_by' => $this->session->userdata('id_user'),
      ];

      $where = array(
         "id_hukum" => $id_hukum
      );

      $this->m_action->insertData('produk_hukum', $update, $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('hukum/detail_regulasi/' . $slug);
   }

   public function hapus()
   {
      $id_hukum = $this->secure->decrypt_url($this->uri->segment('4'));
      $doc = $this->db->get_where('produk_hukum', ['id_hukum' => $id_hukum])->row_array();

      $old_doc = $doc['dokumen_hukum'];
      if ($old_doc != 'default.pdf') {
         unlink(FCPATH . 'assets/upload/doc/' . $old_doc);
      }

      $where = array('id_hukum' => $id_hukum);
      $this->m_action->deleteData('produk_hukum', $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah dihapus..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('hukum/detail_regulasi/' . $this->uri->segment('3'));
   }
}
