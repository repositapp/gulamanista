<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Regulasi extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_hukum');
   }

   public function list($slug)
   {
      $data['regulasi'] = $this->m_action->getDataASC('rel_regulasi', array('slug_regulasi' => $slug), 'id', null)->row_array();
      $data['title'] = $data['regulasi']['nama_regulasi'];
      $data['treeview'] = 'Regulasi';
      $data['data_produk_hukum'] = $this->m_hukum->getListProdukHukum($slug);
      $data['data_regulasi'] = $this->m_hukum->getListRegulasi();

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('produk_hukum', $data);
      $this->load->view('_templates/utama/_footer');
   }
}
