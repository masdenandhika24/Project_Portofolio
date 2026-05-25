<?php 

class Register extends CI_Controller{

	public function index()	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Register Account'
			];
			$this->load->view('register', $data);
		}else{
			$nik = $this->input->post('nik');
			$nama = $this->input->post('nama');
			$tgl_lahir = $this->input->post('tanggalLahir');
			$jk = $this->input->post('jk');
			$alamat = $this->input->post('alamat');
			$namaOrtu = $this->input->post('namaOrtu');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$role_id = 'user';
			$idUser = $this->UsersModel->get_id('user') + 1;

			$dataPasien = array (
				'nik' => $nik,
				'id_user' => $idUser,
				'nama_pasien' => $nama,
				'tanggal_lahir' => $tgl_lahir,
				'alamat' => $alamat,
				'nama_ortu' => $namaOrtu,
				'jenis_kelamin' => $jk
			);
			$dataUser = array (
				'id_user' => $idUser,
				'username' => $email,
				'password' => $password,
				'role' => $role_id,
			);

			$this->UsersModel->insert_data($dataPasien,'pasien');
			$this->UsersModel->insert_data($dataUser,'user');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Berhasil Register, Silahkan Login!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect(base_url('auth/login'));
		}
	}
	
	public function _rules() {
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|min_length[15]|max_length[17]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tanggalLahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('namaOrtu', 'Nama Orang Tua', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
	}
}