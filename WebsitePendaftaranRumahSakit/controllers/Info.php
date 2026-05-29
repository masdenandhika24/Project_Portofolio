<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {
	public function index() {
		$dataDb = $this->RumahSakitModel->get_data('poli')->result();

		$data = [
			'title' => 'Rumah Sakit Sehat Banget',
			'dbResult' => $dataDb
		];

		$this->load->view('templateUsers/header', $data);
		$this->load->view('welcome', $data);
		$this->load->view('templateUsers/footer');
	}

	public function listDokter() {
		$joinRel = $this->RumahSakitModel->getDokterPoli()->result();

		$data = [
			'title' => 'List Dokter',
			'dbResult' => $joinRel
		];

		$this->load->view('templateUsers/header', $data);
		$this->load->view('listDokter', $data);
		$this->load->view('templateUsers/footer');
	}

	public function jadwalDokter() {
		$joinRel = $this->RumahSakitModel->getDokterPoli()->result();

		$data = [
			'title' => 'Jadwal Dokter',
			'dbResult' => $joinRel
		];

		$this->load->view('templateUsers/header', $data);
		$this->load->view('jadwalDokter', $data);
		$this->load->view('templateUsers/footer');
	}
	
}
