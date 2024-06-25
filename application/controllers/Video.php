<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Video extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_video');
      $this->load->library('pagination');
   }

   public function index()
   {
      $data['title'] = 'Video';
      $data['treeview'] = 'Galeri';

      $config['base_url'] = site_url('/video');
      $config['page_query_string'] = TRUE;
      $config['total_rows'] = $this->m_video->get_published_count();
      $config['per_page'] = 9;

      $config['full_tag_open'] = '<nav class="blog-pagination justify-content-center d-flex">';
      $config['full_tag_close'] = '</nav>';

      $this->pagination->initialize($config);
      $limit = $config['per_page'];
      $offset = html_escape($this->input->get('per_page'));

      $data['list_video'] = $this->m_video->get_published($limit, $offset);

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('video', $data);
      $this->load->view('_templates/utama/_footer');
   }
}
