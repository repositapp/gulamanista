<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Login Sistem Klinik UMKM';

		$this->load->view('_templates/auth/_header', $data);
		$this->load->view('authentication', $data);
		$this->load->view('_templates/auth/_footer');
	}

	public function login()
	{
		$output = array('error' => false);

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = $this->db->get_where('user', ['username' => $username])->row_array();

		if ($data) {
			if ($data['is_active'] == 1) {
				if (password_verify($password, $data['password'])) {
					$this->_lastLogged($data['id_user']);

					$data = [
						'GM_LOGGED_IN' => 'true',
						'id_user'    => $data['id_user'],
						'username'   => $data['username'],
						'role_id'    => $data['role_id']
					];
					$this->session->set_userdata($data);
					$output['message'] = '<strong>Masuk</strong>. Harap Tunggu...';
				} else {
					$output['error'] = true;
					$output['message'] = '<strong>Login Salah</strong>. Kata Sandi Salah';
				}
			} else {
				$output['error'] = true;
				$output['message'] = '<strong>Login Salah</strong>. Pengguna tidak aktif';
			}
		} else {
			$output['error'] = true;
			$output['message'] = '<strong>Login Salah</strong>. Pengguna tidak ditemukan';
		}

		echo json_encode($output);
	}

	private function _lastLogged($id)
	{
		$update = [
			'last_login' => time_zone('date_time')
		];

		$where = array(
			"id_user" => $id
		);

		$this->m_action->insertData('user', $update, $where);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}

	public function blocked()
	{
		$this->load->view('errors/404_error');
	}

	public function daftar()
	{
		$output = array('error' => false);

		$username = $this->input->post('username');
		$nama_usaha = $this->input->post('nama_usaha');

		$data = $this->db->get_where('user', ['username' => $username])->row_array();

		if ($data) {
			$output['error'] = true;
			$output['message'] = '<strong>Username sudah terdaftar!!!</strong>';
		} else {
			$cek_usaha = $this->db->get_where('umkm', ['nama_usaha' => $nama_usaha])->row_array();

			if ($cek_usaha) {
				$output['error'] = true;
				$output['message'] = '<strong>Nama usaha sudah terdaftar!!!</strong>';
			} else {
				$this->_addAkun();
				$this->_addUmkm();
				$output['message'] = '<strong>Pendaftaran Berhasil</strong>. Mohon tunggu sebentar, anda akan dialihkan ke halaman login...';
			}
		}

		echo json_encode($output);
	}

	private function _addAkun()
	{
		$insert = [
			'nama_user' => $this->input->post('nama_pemilik'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'img_user' => 'petugas.png',
			'role_id' => '4',
			'petugas_pelayanan' => '0',
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
}
