<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_informasi');
   }

   public function list()
   {
      $data['title'] = 'Agenda';
      $data['treeview'] = 'Informasi';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_agenda'] = $this->m_informasi->getAgenda(null);

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('informasi/agenda/agenda_list', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function tambah()
   {
      $data['title'] = 'Agenda';
      $data['treeview'] = 'Informasi';
      $data['sub_menu'] = 'Tambah Data';
      $data['menu_link'] = 'agenda/list';

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('informasi/agenda/agenda_add', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function ubah($id)
   {
      $data['title'] = 'Agenda';
      $data['treeview'] = 'Informasi';
      $data['sub_menu'] = 'Ubah Data';
      $data['menu_link'] = 'agenda/list';
      $data['agenda'] = $this->m_informasi->getAgenda(array('id' => $this->secure->decrypt_url($id)))->row_array();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('informasi/agenda/agenda_update', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function simpan_data()
   {
      $insert = [
         'judul_kegiatan' => $this->input->post('judul_kegiatan'),
         'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
         'waktu_kegiatan' => $this->input->post('waktu_kegiatan'),
         'lokasi_kegiatan' => $this->input->post('lokasi_kegiatan'),
         'created_at' => time_zone('date_time')
      ];

      $this->m_action->insertData('agenda', $insert, null);

      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah bertambah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('agenda/list');
   }

   public function simpan_perubahan()
   {
      $id_agenda = $this->input->post('id_agenda');

      $update = [
         'judul_kegiatan' => $this->input->post('judul_kegiatan'),
         'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
         'waktu_kegiatan' => $this->input->post('waktu_kegiatan'),
         'lokasi_kegiatan' => $this->input->post('lokasi_kegiatan')
      ];

      $where = array(
         "id" => $id_agenda
      );

      $this->m_action->insertData('agenda', $update, $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('agenda/list');
   }

   public function hapus($id)
   {
      $id_agenda = $this->secure->decrypt_url($id);

      $where = array('id' => $id_agenda);
      $this->m_action->deleteData('agenda', $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah dihapus..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('agenda/list');
   }
}
