<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pelayanan extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_pelayanan');
      $this->load->model('m_klinik');
   }

   public function inbox()
   {
      $data['title'] = 'Layanan Konsultasi';
      $data['treeview'] = 'Layanan Konsultasi';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['petugas_layanan'] = $this->m_user->getPetugasLayanan($this->session->userdata('id_user'))->row_array();
      $data['data_inbox'] = $this->m_pelayanan->getAllInbox($data['petugas_layanan']['petugas_pelayanan']);

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('pelayanan/layanan_inbox', $data);
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
      $data['title'] = 'Layanan Konsultasi';
      $data['treeview'] = 'Layanan Konsultasi';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['read'] = $this->m_pelayanan->getReadInbox($this->secure->decrypt_url($id))->row_array();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('pelayanan/layanan_read_inbox', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function reply($id)
   {
      $data['title'] = 'Layanan Konsultasi';
      $data['treeview'] = 'Layanan Konsultasi';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['inbox'] = $this->m_pelayanan->getReadInbox($this->secure->decrypt_url($id))->row_array();
      $data['kode_berkas'] = $this->m_pelayanan->kodeBerkas(16);

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('pelayanan/layanan_reply', $data);
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

      $cek = $this->db->get_where('konsultasi', ['id_konsultasi' => $this->input->post('parent')])->row_array();

      if ($cek['penerima'] == '') {
         $update = [
            'penerima' => $this->input->post('pengirim'),
            'is_read' => '1'
         ];

         $where = array(
            "id_konsultasi" => $this->input->post('parent')
         );

         $this->m_action->insertData('konsultasi', $update, $where);
      }

      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Pesan anda terkirim..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('pelayanan/sent');
   }

   public function sent()
   {
      $data['title'] = 'Layanan Konsultasi';
      $data['treeview'] = 'Layanan Konsultasi';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_sent'] = $this->m_pelayanan->getAllSent($this->session->userdata('id_user'));

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('pelayanan/layanan_sent', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function read_sent($id)
   {
      $data['title'] = 'Layanan Konsultasi';
      $data['treeview'] = 'Layanan Konsultasi';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['read'] = $this->m_pelayanan->getReadSent($this->secure->decrypt_url($id))->row_array();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('pelayanan/layanan_read_sent', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function hapus_sent($id)
   {
      $id_konsultasi = $this->secure->decrypt_url($id);

      $where = array('id_konsultasi' => $id_konsultasi);
      $this->m_action->deleteData('konsultasi', $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Pesan terkirim telah dihapus..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('pelayanan/sent');
   }
}
