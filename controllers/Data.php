<?php

class Data extends CI_Controller {

  public function daftar() {
    $where = array(
      'id_pasien' => $this->session->userdata('id_pasien'),
    );
    $joinRel = $this->RumahSakitModel->getPendaftaranDokterPoli($where)->result();
    $data = array(
      'title' => 'Data Daftar',
      'dataPendaftar' => $joinRel
    );

		$this->load->view('dataDaftar', $data);;
    // return var_dump($joinRel);
  }

  public function daftarPDF() {
    $where = array(
      'id_pasien' => $this->session->userdata('id_pasien'),
    );
    $joinRel = $this->RumahSakitModel->getPendaftaranDokterPoli($where)->result();
    $data = array(
      'title' => 'Data Daftar',
      'dataPendaftar' => $joinRel
    );

    $this->load->library('dompdf_gen');

		$this->load->view('ExportToPDF/PDF-dataDaftar', $data);;
    $paper_size = 'A4'; // ukuran kertas
    $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper_size, $orientation);
    //Convert to PDF
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("data-daftar.pdf", array('Attachment' => 0));
    // nama file pdf yang di hasilkan
    // return var_dump($joinRel);
  }

  public function hapus($kode_daftar) {
    $where = array(
      'kode_pendaftaran' => $kode_daftar,
    );
    
    $this->RumahSakitModel->deleteData($where, 'pendaftaran');

		redirect(base_url('data/daftar'));
    // return var_dump($joinRel);
  }

  public function pembayaran($id_trans) {
    $where = array(
      'dt.id_transaksi' => $id_trans,
    );
    $joinRel = $this->RumahSakitModel->getTransaksi($where)->result();
    $sum = $this->RumahSakitModel->getSumTransaksi($id_trans)->result();
    $data = array(
      'title' => 'Data Daftar',
      'transaksi' => $joinRel,
      'sum' => $sum,
      'id' => $id_trans,
    );

		$this->load->view('transaksi', $data);;
    // return var_dump($joinRel);
  }

  public function pembayaranPDF($id_trans) {
    $where = array(
      'dt.id_transaksi' => $id_trans,
    );
    $joinRel = $this->RumahSakitModel->getTransaksi($where)->result();
    $sum = $this->RumahSakitModel->getSumTransaksi($id_trans)->result();
    $data = array(
      'title' => 'Data Daftar',
      'transaksi' => $joinRel,
      'sum' => $sum,
    );

    $this->load->library('dompdf_gen');

		$this->load->view('ExportToPDF/PDF-transaksi', $data);;
    $paper_size = 'A4'; // ukuran kertas
    $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper_size, $orientation);
    //Convert to PDF
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("transaksi.pdf", array('Attachment' => 0));
    // nama file pdf yang di hasilkan
    // return var_dump($joinRel);
  }
}
