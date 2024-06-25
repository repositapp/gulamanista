<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Klinik extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_klinik');
   }

   public function index()
   {
      $data['title'] = 'Layanan Klinik';
      $data['treeview'] = 'Layanan Klinik';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_klinik'] = $this->m_klinik->getListKlinik();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('layanan_klinik/list_layanan', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function tambah()
   {
      $data['title'] = 'Layanan Klinik';
      $data['treeview'] = 'Layanan Klinik';
      $data['sub_menu'] = 'Tambah Data';
      $data['menu_link'] = 'klinik';

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('layanan_klinik/layanan_add', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function ubah($id)
   {
      $data['title'] = 'Layanan Klinik';
      $data['treeview'] = 'Layanan Klinik';
      $data['sub_menu'] = 'Ubah Data';
      $data['menu_link'] = 'klinik';
      $data['klinik'] = $this->m_klinik->getDetailKlinik($this->secure->decrypt_url($id))->row_array();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('layanan_klinik/layanan_update', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function simpan_data()
   {
      $img_klinik = $_FILES['img_klinik'];
      if ($img_klinik) {
         $config['upload_path'] = './assets/upload/img/';
         $config['allowed_types'] = 'png|jpg|jpeg|svg|gif';
         $config['encrypt_name']  = true;

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('img_klinik')) {
            $img_klinik = $this->upload->data('file_name');
         } else {
            echo "Upload Gagal!!";
            die();
         }
      }

      $insert = [
         'title_klinik' => $this->input->post('title_klinik'),
         'deskripsi' => $this->input->post('deskripsi'),
         'isi_layanan' => $this->input->post('isi_layanan'),
         'slug_klinik' => slug($this->input->post('title_klinik', TRUE)),
         'img_klinik' => $img_klinik,
         'is_active' => '1',
         'created_at' => time_zone('date_time'),
         'created_by' => $this->session->userdata('id_user'),
      ];

      $this->m_action->insertData('layanan_klinik', $insert, null);

      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah bertambah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('klinik');
   }

   public function simpan_perubahan()
   {
      $id_klinik = $this->input->post('id_klinik');
      $old_image = $this->input->post('old_image');
      $img_klinik = $_FILES['img_klinik'];

      if ($this->input->post('ubah_foto')) {
         if ($old_image != 'layanan-klinik.gif') {
            unlink(FCPATH . 'assets/upload/img/' . $old_image);
         }

         $config['upload_path'] = './assets/upload/img/';
         $config['allowed_types'] = 'png|jpg|jpeg|svg|gif';
         $config['encrypt_name']  = true;

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('img_klinik')) {
            $img_klinik = $this->upload->data('file_name');
         } else {
            echo "Upload Gagal!!";
            die();
         }
      } else {
         $img_klinik = $old_image;
      }

      $update = [
         'title_klinik' => $this->input->post('title_klinik'),
         'deskripsi' => $this->input->post('deskripsi'),
         'isi_layanan' => $this->input->post('isi_layanan'),
         'slug_klinik' => slug($this->input->post('title_klinik', TRUE)),
         'img_klinik' => $img_klinik,
         'is_active' => '1',
         'update_at' => time_zone('date_time'),
         'update_by' => $this->session->userdata('id_user'),
      ];

      $where = array(
         "id" => $id_klinik
      );

      $this->m_action->insertData('layanan_klinik', $update, $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('klinik');
   }

   public function hapus($id)
   {
      $id_klinik = $this->secure->decrypt_url($id);
      $gbr = $this->db->get_where('layanan_klinik', ['id' => $id_klinik])->row_array();

      $old_image = $gbr['img_klinik'];
      if ($old_image != 'layanan-klinik.gif') {
         unlink(FCPATH . 'assets/upload/img/' . $old_image);
      }

      $where = array('id' => $id_klinik);
      $this->m_action->deleteData('layanan_klinik', $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah dihapus..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('klinik');
   }

   public function detail($slug)
   {
      $data['title'] = 'Detail Layanan';
      $data['treeview'] = 'Klinik UMKM';
      $data['data_klinik'] = $this->m_klinik->getListKlinik();
      $data['layanan'] = $this->m_klinik->getDetailLayanan($slug)->row_array();

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('layanan_klinik', $data);
      $this->load->view('_templates/utama/_footer');
   }

   public function layanan_umkm()
   {
      $data['title'] = 'Layanan UMKM';
      $data['treeview'] = 'Layanan UMKM';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_klinik'] = $this->m_klinik->getListKlinik();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('layanan_klinik/layanan_umkm', $data);
      $this->load->view('_templates/dashboard/_footer');
   }
}
