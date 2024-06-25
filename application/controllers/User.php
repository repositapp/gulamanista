<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_klinik');
   }

   public function index()
   {
      $data['title'] = 'Pengguna';
      $data['treeview'] = 'Pengaturan';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_user'] = $this->m_user->getUser($this->session->userdata('id_user'));

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('man_user/pengguna', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function tambah()
   {
      $data['title'] = 'Pengguna';
      $data['treeview'] = 'Pengaturan';
      $data['sub_menu'] = 'Tambah Data';
      $data['menu_link'] = 'user';
      $data['data_role'] = $this->m_user->getRole();
      $data['data_klinik'] = $this->m_klinik->getListKlinik();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('man_user/pengguna_add', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function ubah($id)
   {
      $data['title'] = 'Pengguna';
      $data['treeview'] = 'Pengaturan';
      $data['sub_menu'] = 'Ubah Data';
      $data['menu_link'] = 'user';
      $data['user'] = $this->m_user->getDetailUser($this->secure->decrypt_url($id))->row_array();
      $data['data_role'] = $this->m_user->getRole();
      $data['data_klinik'] = $this->m_klinik->getListKlinik();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('man_user/pengguna_update', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function simpan_data()
   {
      if ($this->input->post('tambah_foto')) {
         $img_user = $_FILES['img_user'];
         if ($img_user) {
            $config['upload_path'] = './assets/upload/img/';
            $config['allowed_types'] = 'png|jpg|jpeg|svg|gif';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('img_user')) {
               $img_user = $this->upload->data('file_name');
            } else {
               echo "Upload Gagal!!";
               die();
            }
         }
      } else {
         $img_user = 'petugas.png';
      }

      $insert = [
         'nama_user' => $this->input->post('nama_user'),
         'telepon_user' => $this->input->post('telepon_user'),
         'email_user' => $this->input->post('email_user'),
         'username' => $this->input->post('username'),
         'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
         'img_user' => $img_user,
         'role_id' => $this->input->post('role_id'),
         'petugas_pelayanan' => $this->input->post('petugas_pelayanan'),
         'is_active' => '1',
         'user_created' => time_zone('date_time')
      ];

      $this->m_action->insertData('user', $insert, null);

      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah bertambah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('user');
   }

   public function simpan_perubahan()
   {
      $id_user = $this->input->post('id_user');
      $old_image = $this->input->post('old_image');
      $img_user = $_FILES['img_user'];

      if ($this->input->post('ubah_foto')) {
         if ($old_image != 'petugas.png') {
            unlink(FCPATH . 'assets/upload/img/' . $old_image);
         }

         $config['upload_path'] = './assets/upload/img/';
         $config['allowed_types'] = 'png|jpg|jpeg|svg|gif';
         $config['encrypt_name']  = true;

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('img_user')) {
            $img_user = $this->upload->data('file_name');
         } else {
            echo "Upload Gagal!!";
            die();
         }
      } else {
         $img_user = $old_image;
      }

      if (empty($this->input->post('password'))) {
         $update = [
            'nama_user' => $this->input->post('nama_user'),
            'telepon_user' => $this->input->post('telepon_user'),
            'email_user' => $this->input->post('email_user'),
            'username' => $this->input->post('username'),
            'img_user' => $img_user,
            'role_id' => $this->input->post('role_id'),
            'petugas_pelayanan' => $this->input->post('petugas_pelayanan'),
            'is_active' => '1'
         ];
      } else {
         $update = [
            'nama_user' => $this->input->post('nama_user'),
            'telepon_user' => $this->input->post('telepon_user'),
            'email_user' => $this->input->post('email_user'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'img_user' => $img_user,
            'role_id' => $this->input->post('role_id'),
            'is_active' => '1'
         ];
      }

      $where = array(
         "id_user" => $id_user
      );

      $this->m_action->insertData('user', $update, $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('user');
   }

   public function Hapus($id)
   {
      $id_user = $this->secure->decrypt_url($id);
      $gbr = $this->db->get_where('user', ['id_user' => $id_user])->row_array();

      $old_image = $gbr['img_user'];
      if ($old_image != 'petugas.png') {
         unlink(FCPATH . 'assets/upload/img/' . $old_image);
      }

      $where = array('id_user' => $id_user);
      $this->m_action->deleteData('user', $where);
      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah dihapus..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('user');
   }

   public function biodata()
   {
      $data['title'] = 'Biodata UMKM';
      $data['treeview'] = 'Biodata UMKM';
      $data['sub_menu'] = 'Biodata UMKM';
      $data['menu_link'] = null;
      $data['biodata'] = $this->m_user->getBioUMKM($this->session->userdata('id_user'))->row_array();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('umkm/biodata_umkm', $data);
      $this->load->view('_templates/dashboard/_footer');

      if ($this->input->post('ubah_data') == 'ubah') {
         $id_umkm = $this->input->post('id_umkm');

         $update = [
            'kecamatan' => $this->input->post('kecamatan'),
            'kelurahan' => $this->input->post('kelurahan'),
            'komoditas' => $this->input->post('komoditas'),
            'nama_usaha' => $this->input->post('nama_usaha'),
            'nama_pemilik' => $this->input->post('nama_pemilik'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat_pemilik' => $this->input->post('alamat_pemilik'),
            'alamat_usaha' => $this->input->post('alamat_usaha'),
            'tahun_berdiri' => $this->input->post('tahun_berdiri'),
            'ijin_usaha' => $this->input->post('ijin_usaha'),
            'tipe_kelas_digital' => $this->input->post('tipe_kelas_digital')
         ];

         $where = array(
            "id_umkm" => $id_umkm
         );

         $this->m_action->insertData('umkm', $update, $where);
         $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
         redirect('user/biodata');
      }
   }

   public function profil()
   {
      $data['title'] = 'Profil Anda';
      $data['treeview'] = 'Profil';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['user'] = $this->m_user->getAkun($this->session->userdata('id_user'))->row_array();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('man_user/profil', $data);
      $this->load->view('_templates/dashboard/_footer');

      if ($this->input->post('ubah_data') == 'ubah') {
         $id_user = $this->input->post('id_user');

         $old_image = $this->input->post('old_image');
         $img_user = $_FILES['img_user'];

         if ($this->input->post('ubah_foto')) {
            if ($old_image != 'petugas.png') {
               unlink(FCPATH . 'assets/upload/img/' . $old_image);
            }

            $config['upload_path'] = './assets/upload/img/';
            $config['allowed_types'] = 'png|jpg|jpeg|svg|gif';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('img_user')) {
               $img_user = $this->upload->data('file_name');
            } else {
               echo "Upload Gagal!!";
               die();
            }
         } else {
            $img_user = $old_image;
         }

         if ($this->session->userdata('role_id') != 4) {
            $telepon = $this->input->post('telepon_user');
            $email = $this->input->post('email_user');
         } else {
            $telepon = '';
            $email = '';
         }

         if ($this->input->post('password')) {
            $update = [
               'nama_user' => $this->input->post('nama_user'),
               'telepon_user' => $telepon,
               'email_user' => $email,
               'username' => $this->input->post('username'),
               'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
               'img_user' => $img_user
            ];
         } else {
            $update = [
               'nama_user' => $this->input->post('nama_user'),
               'telepon_user' => $telepon,
               'email_user' => $email,
               'username' => $this->input->post('username'),
               'img_user' => $img_user
            ];
         }

         $where = array(
            "id_user" => $id_user
         );

         $this->m_action->insertData('user', $update, $where);
         $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah diubah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
         redirect('user/profil');
      }
   }
}
