<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Informasi extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_informasi');
   }

   public function pojok_informasi()
   {
      $data['title'] = 'Pojok Informasi';
      $data['treeview'] = 'Pojok Informasi';
      $data['data_pojok'] = $this->m_informasi->getPojok(null);

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('pojok', $data);
      $this->load->view('_templates/utama/_footer');
   }

   public function agenda()
   {
      $data['title'] = 'Agenda';
      $data['treeview'] = 'Agenda';
      $data['data_agenda'] = $this->m_informasi->getAgenda(null);

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('agenda', $data);
      $this->load->view('_templates/utama/_footer');
   }
}
