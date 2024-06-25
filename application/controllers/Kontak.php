<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kontak extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_informasi');
   }

   public function index()
   {
      $data['title'] = 'Kontak';
      $data['treeview'] = 'Kontak';
      $data['kontak'] = $this->db->get('set_kontak')->row_array();

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('kontak', $data);
      $this->load->view('_templates/utama/_footer');
   }
}
