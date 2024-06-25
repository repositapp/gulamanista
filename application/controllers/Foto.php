<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Foto extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_photos');
      $this->load->library('pagination');
   }

   public function index()
   {
      $data['title'] = 'Foto';
      $data['treeview'] = 'Galeri';

      $config['base_url'] = site_url('/foto');
      $config['page_query_string'] = TRUE;
      $config['total_rows'] = $this->m_photos->get_published_count();
      $config['per_page'] = 9;

      $config['full_tag_open'] = '<nav class="blog-pagination justify-content-center d-flex">';
      $config['full_tag_close'] = '</nav>';

      $this->pagination->initialize($config);
      $limit = $config['per_page'];
      $offset = html_escape($this->input->get('per_page'));

      $data['list_gambar'] = $this->m_photos->get_published($limit, $offset);

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('photos', $data);
      $this->load->view('_templates/utama/_footer');
   }
}
