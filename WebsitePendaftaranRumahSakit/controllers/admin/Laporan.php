<?php 

class Laporan extends CI_Controller{
  public function dokter()	{
    $data = array (
      "title" => "Laporan Dokter",
      "allDokter" => $this->RumahSakitModel->getDokterPoli()->result(), 
    );

    $this->load->view('templateAdmins/header', $data);;
		$this->load->view('admin/laporanPages/laporanDokter', $data);;
		$this->load->view('templateAdmins/footer');;
	}
  public function dokterXls()	{
    $data = array (
      "title" => "Laporan Dokter",
      "allDokter" => $this->RumahSakitModel->getDokterPoli()->result(), 
    );

    $this->load->view('templateAdmins/exportToExcel', $data);;
		$this->load->view('admin/laporanPages/laporanDokter', $data);;
	}
  public function dokterPdf()	{
    $data = array (
      "title" => "Laporan Dokter",
      "allDokter" => $this->RumahSakitModel->getDokterPoli()->result(), 
    );

    $this->load->library('dompdf_gen');
    
		$this->load->view('ExportToPDF/PDF-laporanDokter', $data);;
    $paper_size = 'A4'; // ukuran kertas
    $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper_size, $orientation);
    //Convert to PDF
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("laporanDokter.pdf", array('Attachment' => 0));
	}



  public function pasien()	{
    $where = array (
      "us.role" => "user",
    );
    $data = array (
      "title" => "Laporan Pasien",
      "allPasien" => $this->RumahSakitModel->getPasienUser($where)->result(),
    );

    $this->load->view('templateAdmins/header', $data);;
		$this->load->view('admin/laporanPages/laporanPasien', $data);;
		$this->load->view('templateAdmins/footer');;
	}
  public function pasienXls()	{
    $where = array (
      "us.role" => "user",
    );
    $data = array (
      "title" => "Laporan Pasien",
      "allPasien" => $this->RumahSakitModel->getPasienUser($where)->result(),
    );

    $this->load->view('templateAdmins/exportToExcel', $data);;
		$this->load->view('admin/laporanPages/laporanPasien', $data);;
	}
  public function pasienPdf()	{
    $where = array (
      "us.role" => "user",
    );
    $data = array (
      "title" => "Laporan Pasien",
      "allPasien" => $this->RumahSakitModel->getPasienUser($where)->result(),
    );

    $this->load->library('dompdf_gen');
    
		$this->load->view('ExportToPDF/PDF-laporanPasien', $data);;
    $paper_size = 'A4'; // ukuran kertas
    $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper_size, $orientation);
    //Convert to PDF
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("laporanPasien.pdf", array('Attachment' => 0));
	}


  
  public function pendaftar()	{
    $data = array (
      "title" => "Laporan Pendaftar",
      "allPendaftar" => $this->RumahSakitModel->getPendaftaranPasienPoli()->result(),
    );

    $this->load->view('templateAdmins/header', $data);;
		$this->load->view('admin/laporanPages/laporanPendaftar', $data);;
		$this->load->view('templateAdmins/footer');;
	}
  public function pendaftarXls()	{
    $data = array (
      "title" => "Laporan Pendaftar",
      "allPendaftar" => $this->RumahSakitModel->getPendaftaranPasienPoli()->result(),
    );

    $this->load->view('templateAdmins/exportToExcel', $data);;
		$this->load->view('admin/laporanPages/laporanPendaftar', $data);;
	}
  public function pendaftarPdf()	{
    $data = array (
      "title" => "Laporan Pendaftar",
      "allPendaftar" => $this->RumahSakitModel->getPendaftaranPasienPoli()->result(),
    );

    $this->load->library('dompdf_gen');
    
		$this->load->view('ExportToPDF/PDF-laporanPendaftar', $data);;
    $paper_size = 'A4'; // ukuran kertas
    $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper_size, $orientation);
    //Convert to PDF
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("laporanPendaftar.pdf", array('Attachment' => 0));
	}






  public function poli()	{
    $data = array (
      "title" => "Laporan Poli",
      "allPoli" => $this->RumahSakitModel->get_data('poli')->result(),
    );

    $this->load->view('templateAdmins/header', $data);;
		$this->load->view('admin/laporanPages/laporanPoli', $data);;
		$this->load->view('templateAdmins/footer');;
	}
  public function poliXls()	{
    $data = array (
      "title" => "Laporan Poli",
      "allPoli" => $this->RumahSakitModel->get_data('poli')->result(),
    );

    $this->load->view('templateAdmins/exportToExcel', $data);;
		$this->load->view('admin/laporanPages/laporanPoli', $data);;
	}
  public function poliPdf()	{
    $data = array (
      "title" => "Laporan Poli",
      "allPoli" => $this->RumahSakitModel->get_data('poli')->result(),
    );


    $this->load->library('dompdf_gen');
    
		$this->load->view('ExportToPDF/PDF-laporanPoli', $data);;
    $paper_size = 'A4'; // ukuran kertas
    $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper_size, $orientation);
    //Convert to PDF
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("laporanPoli.pdf", array('Attachment' => 0));
	}




  public function obat()	{
    $data = array (
      "title" => "Laporan Obat",
      "allObat" => $this->RumahSakitModel->get_data('obat')->result(),
    );

    $this->load->view('templateAdmins/header', $data);;
		$this->load->view('admin/laporanPages/laporanObat', $data);;
		$this->load->view('templateAdmins/footer');;
	}
  public function obatXls()	{
    $data = array (
      "title" => "Laporan Obat",
      "allObat" => $this->RumahSakitModel->get_data('obat')->result(),
    );

    $this->load->view('templateAdmins/exportToExcel', $data);;
		$this->load->view('admin/laporanPages/laporanObat', $data);;
	}
  public function obatPdf()	{
    $data = array (
      "title" => "Laporan Obat",
      "allObat" => $this->RumahSakitModel->get_data('obat')->result(),
    );

    $this->load->library('dompdf_gen');
    
		$this->load->view('ExportToPDF/PDF-laporanObat', $data);;
    $paper_size = 'A4'; // ukuran kertas
    $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper_size, $orientation);
    //Convert to PDF
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("laporanObat.pdf", array('Attachment' => 0));
	}
}