<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
   public function index()
   {
      $data['title'] = 'Dashboard';
      $data['treeview'] = 'Dashboard';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['aplikasi'] = $this->m_action->getDataASC('set_aplikasi', null, 'id', null)->row_array();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      if ($this->session->userdata('role_id') == '4') {
         $this->load->view('home/dashboard', $data);
      } else {
         $this->load->view('home/dashboard_umkm', $data);
      }
      $this->load->view('_templates/dashboard/_footer');
   }
}
