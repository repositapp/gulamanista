<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_artikel');
      $this->load->library('pagination');
   }

   public function list($id)
   {
      $query = $this->db->get_where('kategori', ['id' => $this->secure->decrypt_url($id)])->row_array();
      $data['title'] = $query['kategori'];
      $data['treeview'] = 'Berita';

      $data['list_artikel'] = $this->m_artikel->getWebArtikel(array('id_kategori' => $this->secure->decrypt_url($id)));
      $data['data_kategori'] = $this->m_artikel->getWebKategori(array('is_active' => 1));
      $data['data_new'] = $this->m_artikel->getWebNew(array('is_active' => 1));

      $this->load->view('_templates/utama/_header', $data);
      if (count($data['list_artikel']->result_array()) > 0) {
         $this->load->view('kategori', $data);
      } else {
         $data['empty_title'] = $query['kategori'];
         $this->load->view('web/empty');
      }
      $this->load->view('_templates/utama/_footer');
   }
}
