<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
   public function index()
   {
      $data['title'] = 'Pendaftaran';
      $data['treeview'] = 'Pendaftaran';

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('daftar', $data);
      $this->load->view('_templates/utama/_footer');
   }
}
