<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_artikel');
   }

   public function index()
   {
      $data['title'] = 'Artikel';
      $data['treeview'] = 'Admin Web';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_artikel'] = $this->m_artikel->getWebArtikel(null);

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('web/artikel', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function tambah_artikel()
   {
      $data['title'] = 'Artikel';
      $data['treeview'] = 'Admin Web';
      $data['sub_menu'] = 'Tambah Data';
      $data['menu_link'] = 'web';
      $data['data_kategori'] = $this->m_artikel->getWebKategori(array('is_active' => 1));

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('web/artikel_add', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function ubah_artikel($id)
   {
      $data['title'] = 'Artikel';
      $data['treeview'] = 'Admin Web';
      $data['sub_menu'] = 'Ubah Data';
      $data['menu_link'] = 'web';
      $data['data_kategori'] = $this->m_artikel->getWebKategori(array('is_active' => 1));
      $data['artikel'] = $this->m_artikel->getWebArtikel(array('id_artikel' => $this->secure->decrypt_url($id)))->row_array();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('web/artikel_update', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function simpan_data()
   {
      $gambar_artikel = $_FILES['gambar_artikel'];
      if ($gambar_artikel) {
         $config['upload_path'] = './assets/upload/img/';
         $config['allowed_types'] = 'png|jpg|jpeg|svg|gif';
         $config['encrypt_name']  = true;

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('gambar_artikel')) {
            $gambar_artikel = $this->upload->data('file_name');
         } else {
            echo "Upload Gagal!!";
            die();
         }
      }

      $insert = [
         'id_kategori' => $this->input->post('id_kategori'),
         'judul' => $this->input->post('judul'),
         'slug_artikel' => slug($this->input->post('judul', TRUE)),
         'isi_artikel' => $this->input->post('isi_artikel'),
         'gambar_artikel' => $gambar_artikel,
         'visit' => '0',
         'penulis' => $this->session->userdata('id_user'),
         'enabled' => '1',
         'created_at' => time_zone('date_time')
      ];

      $this->m_action->insertData('artikel', $insert, null);

      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah bertambah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('web');
   }

   public function simpan_perubahan()
   {
      $id_artikel = $this->input->post('id_artikel');
      $old_image = $this->input->post('old_image');
      $gambar_artikel = $_FILES['gambar_artikel'];

      if ($this->input->post('ubah_foto')) {
         if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/upload/img/' . $old_image);
         }

         $config['upload_path'] = './assets/upload/img/';
         $config['allowed_types'] = 'png|jpg|jpeg|svg|gif';
         $config['encrypt_name']  = true;

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('gambar_artikel')) {
            $gambar_artikel = $this->upload->data('file_name');
         } else {
            echo "Upload Gagal!!";
            die();
         }
      } else {
         $gambar_artikel = $old_image;
      }

      $update = [
         'id_kategori' => $this->input->post('id_kategori'),
         'judul' => $this->input->post('judul'),
         'slug_artikel' => slug($this->input->post('judul', TRUE)),
         'isi_artikel' => $this->input->post('isi_artikel'),
         'gambar_artikel' => $gambar_artikel
      ];

      $where = array(
         "id_artikel" => $id_artikel
      );

      $this->m_action->insertData('artikel', $update, $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('web');
   }

   public function artikel_nonactive($id)
   {
      $id_artikel = $this->secure->decrypt_url($id);

      $update = [
         'enabled' => '0'
      ];

      $where = array('id_artikel' => $id_artikel);
      $this->m_action->insertData('artikel', $update, $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Artikel telah dinonaktifkan..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('web');
   }

   public function artikel_active($id)
   {
      $id_artikel = $this->secure->decrypt_url($id);

      $update = [
         'enabled' => '1'
      ];

      $where = array('id_artikel' => $id_artikel);
      $this->m_action->insertData('artikel', $update, $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Artikel telah diaktifkan..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('web');
   }

   public function hapus_artikel($id)
   {
      $id_artikel = $this->secure->decrypt_url($id);
      $gbr = $this->db->get_where('artikel', ['id_artikel' => $id_artikel])->row_array();

      $old_image = $gbr['gambar_artikel'];
      if ($old_image != 'default.jpg') {
         unlink(FCPATH . 'assets/upload/img/' . $old_image);
      }

      $where = array('id_artikel' => $id_artikel);
      $this->m_action->deleteData('artikel', $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah dihapus..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('web');
   }

   public function kategori()
   {
      $data['title'] = 'Artikel';
      $data['treeview'] = 'Admin Web';
      $data['sub_menu'] = 'Kategori';
      $data['menu_link'] = 'web';
      $data['data_kategori'] = $this->m_artikel->getWebKategori(null);

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('web/kategori', $data);
      $this->load->view('_templates/dashboard/_footer');

      if ($this->input->post('tambah_data') == 'tambah') {
         $insert = [
            'kategori' => $this->input->post('kategori'),
            'slug_kategori' => slug($this->input->post('kategori', TRUE)),
            'is_active' => 1,
         ];

         $this->m_action->insertData('kategori', $insert, null);

         $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah bertambah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
         redirect('web/kategori');
      }

      if ($this->input->post('ubah_data') == 'ubah') {
         $id_kategori = $this->input->post('id_kategori');

         $update = [
            'kategori' => $this->input->post('kategori'),
            'slug_kategori' => slug($this->input->post('kategori', TRUE))
         ];

         $where = array(
            "id" => $id_kategori
         );

         $this->m_action->insertData('kategori', $update, $where);
         $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
         redirect('web/kategori');
      }
   }

   public function kategori_nonactive($id)
   {
      $id_kategori = $this->secure->decrypt_url($id);

      $update = [
         'is_active' => '0'
      ];

      $where = array('id' => $id_kategori);
      $this->m_action->insertData('kategori', $update, $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Kategori telah dinonaktifkan..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('web/kategori');
   }

   public function kategori_active($id)
   {
      $id_kategori = $this->secure->decrypt_url($id);

      $update = [
         'is_active' => '1'
      ];

      $where = array('id' => $id_kategori);
      $this->m_action->insertData('kategori', $update, $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Kategori telah diaktifkan..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('web/kategori');
   }

   public function hapus_kategori($id)
   {
      $id_kategori = $this->secure->decrypt_url($id);

      $where = array('id' => $id_kategori);
      $this->m_action->deleteData('kategori', $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah dihapus..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('web/kategori');
   }
}
