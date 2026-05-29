<?php 

class Dashboard extends CI_Controller{

  public function index()	{

    $data = array (
      "title" => "Dashboard",
      "pasienRecord" => $this->RumahSakitModel->getNumRows('pasien'),
      "dokterRecord" => $this->RumahSakitModel->getNumRows('dokter'),
      "pendaftarRecord" => $this->RumahSakitModel->getNumRows('pendaftaran'),
      "poliRecord" => $this->RumahSakitModel->getNumRows('poli'),
      "obatRecord" => $this->RumahSakitModel->getNumRows('obat'),
      "pembayaranRecord" => $this->RumahSakitModel->getNumRowsWhere('pendaftaran', ["status_periksa" => "Tagihan Pembayaran"]),
      "selesaiRecord" => $this->RumahSakitModel->getNumRowsWhere('pendaftaran', ["status_periksa" => "Selesai"]),
      "belumRecord" => $this->RumahSakitModel->getNumRowsWhere('pendaftaran', ["status_periksa" => "Belum Diperiksa"]),
    );

    $this->load->view('templateAdmins/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templateAdmins/footer', $data);
    // var_dump($data);
	}
}