<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sosmed extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_sosmed');
   }

   public function index()
   {
      $data['title'] = 'Media Sosial';
      $data['treeview'] = 'Admin Web';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_sosmed'] = $this->m_sosmed->getSosmed();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('sosmed/list', $data);
      $this->load->view('_templates/dashboard/_footer');

      if ($this->input->post('ubah_data') == 'ubah') {
         $id_sosmed = $this->input->post('id_sosmed');

         $update = [
            'link_akun' => $this->input->post('link_akun')
         ];

         $where = array(
            "id" => $id_sosmed
         );

         $this->m_action->insertData('media_sosial', $update, $where);
         $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
         redirect('sosmed');
      }
   }
}
