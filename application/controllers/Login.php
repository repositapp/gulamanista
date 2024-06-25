<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
   public function index()
   {
      if ($this->session->userdata('GM_LOGGED_IN')) {
         if ($this->session->userdata('role_id') == '4') {
            redirect('dashboard');
         } else {
            redirect('auth/logout');
         }
      }

      $data['title'] = 'Login';
      $data['treeview'] = 'Login';
      $data['aplikasi'] = $this->m_action->getDataASC('set_aplikasi', null, 'id', null)->row_array();

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('login', $data);
      $this->load->view('_templates/utama/_footer');
   }
}
