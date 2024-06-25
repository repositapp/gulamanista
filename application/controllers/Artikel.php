<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Artikel extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_artikel');
      $this->load->library('pagination');
   }

   public function index()
   {
      $data['title'] = 'Berita';
      $data['treeview'] = 'Berita';

      $config['base_url'] = site_url('/artikel');
      $config['page_query_string'] = TRUE;
      $config['total_rows'] = $this->m_artikel->get_published_count();
      $config['per_page'] = 3;

      $config['full_tag_open'] = '<nav class="blog-pagination justify-content-center d-flex">';
      $config['full_tag_close'] = '</nav>';

      $this->pagination->initialize($config);
      $limit = $config['per_page'];
      $offset = html_escape($this->input->get('per_page'));

      $data['list_artikel'] = $this->m_artikel->get_published($limit, $offset);
      $data['data_kategori'] = $this->m_artikel->getWebKategori(array('is_active' => 1));
      $data['data_new'] = $this->m_artikel->getWebNew(array('is_active' => 1));

      $this->load->view('_templates/utama/_header', $data);

      if (count($data['list_artikel']) > 0) {
         $this->load->view('artikel', $data);
      } else {
         $data['empty_title'] = 'Berita';
         $this->load->view('web/empty');
      }

      $this->load->view('_templates/utama/_footer');
   }

   public function read($slug)
   {
      $data['title'] = 'Detail Berita';
      $data['treeview'] = 'Berita';
      $data['artikel'] = $this->m_artikel->getWebArtikel(array('slug_artikel' => $slug))->row_array();
      $data['category'] = $this->db->get_where('kategori', ['id' => $data['artikel']['id_kategori']])->row_array();
      $data['data_kategori'] = $this->m_artikel->getWebKategori(array('is_active' => 1));
      $data['data_new'] = $this->m_artikel->getWebNew(array('is_active' => 1));

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('artikel_read', $data);
      $this->load->view('_templates/utama/_footer');
   }
}
