<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modul extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_modul');
   }

   public function index()
   {
      $data['title'] = 'Modul';
      $data['treeview'] = 'Pengaturan';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_modul'] = $this->m_modul->getListModul();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('setting/modul/web_modul', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function sub_modul($id)
   {
      $data['title'] = 'Modul';
      $data['treeview'] = 'Pengaturan';
      $data['sub_menu'] = 'Sub Modul';
      $data['menu_link'] = 'modul';
      $data['sub_modul'] = $this->m_modul->getListSubModul($this->secure->decrypt_url($id));

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('setting/modul/sub_modul', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function ubah($id)
   {
      $data['title'] = 'Modul';
      $data['treeview'] = 'Pengaturan';
      $data['sub_menu'] = 'Ubah Data';
      $data['menu_link'] = 'modul';
      $data['modul'] = $this->m_modul->getDetailModul($this->secure->decrypt_url($id))->row_array();
      $data['list_icon'] = $this->m_modul->list_icon();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('setting/modul/ubah_modul', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function simpan_perubahan()
   {
      $id = $this->input->post('id');

      $update = [
         'modul' => $this->input->post('modul'),
         'icon' => $this->input->post('icon'),
         'modul_active' => $this->input->post('modul_active')
      ];

      $where = array(
         "id" => $id
      );

      $this->m_action->insertData('set_modul', $update, $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('modul/ubah/' . $this->secure->encrypt_url($id));
   }

   public function modul_nonactive($id)
   {
      $id = $this->secure->decrypt_url($id);

      $update = [
         'modul_active' => '0'
      ];

      $where = array('id' => $id);
      $this->m_action->insertData('set_modul', $update, $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Modul telah dinonaktifkan..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('modul');
   }

   public function modul_active($id)
   {
      $id = $this->secure->decrypt_url($id);

      $update = [
         'modul_active' => '1'
      ];

      $where = array('id' => $id);
      $this->m_action->insertData('set_modul', $update, $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Modul telah diaktifkan..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('modul');
   }
}
