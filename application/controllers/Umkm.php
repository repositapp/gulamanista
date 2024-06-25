<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Umkm extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_umkm');
   }

   public function list()
   {
      $data['title'] = 'UMKM';
      $data['treeview'] = 'UMKM';
      $data['sub_menu'] = null;
      $data['menu_link'] = null;
      $data['data_umkm'] = $this->m_umkm->getUmkm(null);

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('man_user/umkm_list', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function tambah()
   {
      $data['title'] = 'UMKM';
      $data['treeview'] = 'UMKM';
      $data['sub_menu'] = 'Tambah Data';
      $data['menu_link'] = 'umkm/list';

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('man_user/umkm_add', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function ubah($id)
   {
      $data['title'] = 'UMKM';
      $data['treeview'] = 'UMKM';
      $data['sub_menu'] = 'Ubah Data';
      $data['menu_link'] = 'umkm/list';
      $data['umkm'] = $this->m_umkm->getUmkm(array('id_umkm' => $this->secure->decrypt_url($id)))->row_array();

      $this->load->view('_templates/dashboard/_header', $data);
      $this->load->view('_templates/dashboard/_sidebar', $data);
      $this->load->view('man_user/umkm_update', $data);
      $this->load->view('_templates/dashboard/_footer');
   }

   public function simpan_data()
   {
      $this->_addAkun();
      $this->_addUmkm();

      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah bertambah..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('umkm/list');
   }

   private function _addAkun()
   {
      $insert = [
         'nama_user' => $this->input->post('nama_pemilik'),
         'username' => $this->input->post('username'),
         'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
         'img_user' => 'petugas.png',
         'role_id' => '4',
         'is_active' => '1',
         'user_created' => time_zone('date_time')
      ];

      $this->m_action->insertData('user', $insert, null);
   }

   private function _addUmkm()
   {
      $data = $this->m_user->getUserNew()->row_array();

      $insert = [
         'id_akun' => $data['id_user'],
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
         'tipe_kelas_digital' => $this->input->post('tipe_kelas_digital'),
         'umkm_created' => time_zone('date_time')
      ];

      $this->m_action->insertData('umkm', $insert, null);
   }

   public function simpan_perubahan()
   {
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
      redirect('umkm/list');
   }

   public function Hapus($id)
   {
      $id_umkm = $this->secure->decrypt_url($id);
      $cek = $this->db->get_where('umkm', ['id_umkm' => $id_umkm])->row_array();
      $id_akun = $cek['id_akun'];

      $whereumkm = array('id_umkm' => $id_umkm);
      $this->m_action->deleteData('umkm', $whereumkm);

      $whereuser = array('id_user' => $id_akun);
      $this->m_action->deleteData('user', $whereuser);

      $this->session->set_flashdata('msg', '$.toast({heading: "Berhasil !",text: "Data telah dihapus..",position: "top-right",loaderBg: "#fff",icon: "success",hideAfter: 5000,stack: 1});');
      redirect('umkm/list');
   }

   public function list_kota()
   {
      $data['title'] = 'UMKM Kota';
      $data['treeview'] = 'UMKM Kota';
      $data['umkm_kota'] = $this->m_umkm->getUmkmKota(null);

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('umkm_kota', $data);
      $this->load->view('_templates/utama/_footer');
   }

   public function list_kecamatan()
   {
      $data['title'] = 'UMKM Kecamatan';
      $data['treeview'] = 'UMKM Kecamatan';
      $data['umkm_kecamatan'] = $this->m_umkm->getUmkmKecamatan();

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('umkm_kecamatan', $data);
      $this->load->view('_templates/utama/_footer');
   }

   public function detail_kecamatan($kecamatan)
   {
      $data['title'] = 'Detail UMKM Kecamatan';
      $data['treeview'] = 'Detail UMKM Kecamatan';
      $data['umkm_kecamatan'] = $this->m_umkm->getDetailKecamatan($this->secure->decrypt_url($kecamatan));

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('detail_umkm_kecamatan', $data);
      $this->load->view('_templates/utama/_footer');
   }

   public function list_komoditas()
   {
      $data['title'] = 'UMKM Komoditas';
      $data['treeview'] = 'UMKM Komoditas';
      $data['umkm_komoditas'] = $this->m_umkm->getUmkmKomoditas();

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('umkm_komoditas', $data);
      $this->load->view('_templates/utama/_footer');
   }

   public function detail_komoditas($komoditas)
   {
      $data['title'] = 'Detail UMKM Komoditas';
      $data['treeview'] = 'Detail UMKM Komoditas';
      $data['umkm_komoditas'] = $this->m_umkm->getDetailKomoditas($this->secure->decrypt_url($komoditas));

      $this->load->view('_templates/utama/_header', $data);
      $this->load->view('detail_umkm_komoditas', $data);
      $this->load->view('_templates/utama/_footer');
   }
}
