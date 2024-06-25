<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_konsultasi');
      $this->load->model('m_klinik');
   }

   public function inbox()
   {
      $data['title'] = 'Konsultasi Saya';
      $data['treeview'] = 'Konsultasi Saya';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_inbox'] = $this->m_konsultasi->getAllInbox($this->session->userdata('id_user'));

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('umkm/konsultasi_inbox', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function view($id_konsul)
   {
      $cek = $this->db->get_where('konsultasi', ['id_konsultasi' => $id_konsul])->row_array();

      if ($cek['is_read'] == '0') {
         $update = [
            'is_read' => '1'
         ];

         $where = array(
            "id_konsultasi" => $id_konsul
         );

         $this->m_action->insertData('konsultasi', $update, $where);

         $data['id_konsultasi'] = $this->secure->encrypt_url($id_konsul);
      } else {
         $data['id_konsultasi'] = $this->secure->encrypt_url($id_konsul);
      }
      echo json_encode($data);
   }

   public function read_inbox($id)
   {
      $data['title'] = 'Konsultasi Saya';
      $data['treeview'] = 'Konsultasi Saya';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['read'] = $this->m_konsultasi->getReadInbox($this->secure->decrypt_url($id))->row_array();
      $data['petugas'] = $this->db->get_where('user', ['id_user' => $data['read']['pengirim']]);

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('umkm/konsultasi_read_inbox', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function reply($id)
   {
      $data['title'] = 'Konsultasi Saya';
      $data['treeview'] = 'Konsultasi Saya';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['inbox'] = $this->m_konsultasi->getReadInbox($this->secure->decrypt_url($id))->row_array();
      $data['kode_berkas'] = $this->m_konsultasi->kodeBerkas(16);

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('umkm/konsultasi_reply', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function kirim_balasan()
   {
      $insert = [
         'kode_pesan' => $this->input->post('kode_pesan'),
         'kode_berkas' => $this->input->post('kode_berkas'),
         'kategori' => $this->input->post('kategori'),
         'isi_pesan' => $this->input->post('isi_pesan'),
         'pengirim' => $this->input->post('pengirim'),
         'penerima' => $this->input->post('penerima'),
         'parent' => $this->input->post('parent'),
         'status' => '2',
         'is_read' => '0',
         'tgl_pengiriman' => time_zone('date_time')
      ];

      $this->m_action->insertData('konsultasi', $insert, null);

      $update = [
         'is_read' => '1'
      ];

      $where = array(
         "id_konsultasi" => $this->input->post('parent')
      );

      $this->m_action->insertData('konsultasi', $update, $where);

      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Pesan anda terkirim..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('konsultasi/sent');
   }

   public function layanan()
   {
      $data['title'] = 'Konsultasi Saya';
      $data['treeview'] = 'Konsultasi Saya';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_klinik'] = $this->m_klinik->getListKlinik();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('umkm/konsultasi_layanan', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function tulis($id)
   {
      $data['title'] = 'Konsultasi Saya';
      $data['treeview'] = 'Konsultasi Saya';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['klinik'] = $this->m_klinik->getDetailKlinik($this->secure->decrypt_url($id))->row_array();
      $data['kode_inbox'] = $this->m_konsultasi->kodeInbox(16);
      $data['kode_berkas'] = $this->m_konsultasi->kodeBerkas(16);

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('umkm/konsultasi_tulis', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function kirim_baru()
   {
      $insert = [
         'kode_pesan' => $this->input->post('kode_pesan'),
         'kode_berkas' => $this->input->post('kode_berkas'),
         'kategori' => $this->input->post('kategori'),
         'isi_pesan' => $this->input->post('isi_pesan'),
         'pengirim' => $this->session->userdata('id_user'),
         'status' => '1',
         'is_read' => '0',
         'tgl_pengiriman' => time_zone('date_time')
      ];

      $this->m_action->insertData('konsultasi', $insert, null);

      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Pesan anda terkirim..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('konsultasi/sent');
   }

   public function sent()
   {
      $data['title'] = 'Konsultasi Saya';
      $data['treeview'] = 'Konsultasi Saya';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_sent'] = $this->m_konsultasi->getAllSent($this->session->userdata('id_user'));

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('umkm/konsultasi_sent', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function read_sent($id)
   {
      $data['title'] = 'Konsultasi Saya';
      $data['treeview'] = 'Konsultasi Saya';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['read'] = $this->m_konsultasi->getReadSent($this->secure->decrypt_url($id))->row_array();
      $data['petugas'] = $this->db->get_where('user', ['id_user' => $data['read']['penerima']]);

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('umkm/konsultasi_read_sent', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function hapus_sent($id)
   {
      $id_konsultasi = $this->secure->decrypt_url($id);

      $where = array('id_konsultasi' => $id_konsultasi);
      $this->m_action->deleteData('konsultasi', $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Pesan terkirim telah dihapus..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('konsultasi/sent');
   }
}
