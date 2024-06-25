<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_klinik');
      $this->load->model('m_umkm');
   }

   public function index()
   {
      $data['title'] = 'Home';
      $data['treeview'] = 'Home';
      $data['sambutan'] = $this->m_action->getDataASC('sambutan', null, 'id', null)->row_array();
      $data['data_klinik'] = $this->m_klinik->getListKlinik();
      $data['total_umkm_kota'] = $this->m_umkm->getUmkmKota(null);
      $data['aplikasi'] = $this->m_action->getDataASC('set_aplikasi', null, 'id', null)->row_array();

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('home/utama', $data);
      $this->load->view('_templates/utama/_footer');
   }
}
