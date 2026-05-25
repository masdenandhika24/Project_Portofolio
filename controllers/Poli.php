<?php 

class Poli extends CI_Controller{
  public function index()	{
		redirect(base_url());
	}

	public function daftar($idPoli)	{
    $this->_rules();
    
    $where = array (
      "id_poli" => $idPoli
    );
    $dataDokter = $this->RumahSakitModel->getWhere($where, 'dokter')->result();
    $data = array(
      'title' => 'Daftar Pasien',
      'idPoli' => $idPoli,
      'dataDokter' => $dataDokter
    );
    // return var_dump($dataDokter);

    if($this->form_validation->run() == FALSE) {
      $this->load->view('daftarPasien', $data);
		}else{
      $postData = array(
        'id_pasien' => $this->input->post('idPasien'),
        'id_poli' => $this->input->post('idPoli'),
        'tgl_daftar' => $this->input->post('tanggal'),
        'id_dokter' => $this->input->post('jadwal'),
        'pembayaran' => $this->input->post('pembayaran'),
      );
      $this->RumahSakitModel->insertData($postData, 'pendaftaran');
    
      redirect(base_url('data/daftar'));
      // return var_dump($postData);
		}

	}

  public function _rules() {
	  $this->form_validation->set_rules('idPasien', 'Login', 'trim|required');
		$this->form_validation->set_rules('idPoli', 'Login', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('jadwal', 'Jadwal', 'trim|required');
		$this->form_validation->set_rules('pembayaran', 'Pembayaran', 'trim|required');
	}
}