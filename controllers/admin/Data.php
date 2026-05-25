<?php

class Data extends CI_Controller
{
  public function pasien()
  {
    $where = array (
      "us.role" => "user",
    );
    $data = array(
      "title" => "Data Pasien",
      "allPasien" => $this->RumahSakitModel->getPasienUser($where)->result(),
    );

    $this->load->view('templateAdmins/header', $data);;
    $this->load->view('admin/dataPages/dataPasien', $data);;
    $this->load->view('templateAdmins/footer');;
    // var_dump($data);
  }









  public function pendaftar()
  {
    $data = array(
      "title" => "Data Pendaftar",
      "allPendaftar" => $this->RumahSakitModel->getPendaftaranPasienPoli()->result(),
    );

    $this->load->view('templateAdmins/header', $data);;
    $this->load->view('admin/dataPages/dataPendaftar', $data);;
    $this->load->view('templateAdmins/footer');;
    // var_dump($data);
  }










  public function poli()
  {
    $data = array(
      "title" => "Data Poli",
      "allPoli" => $this->RumahSakitModel->get_data('poli')->result(),
    );

    $this->load->view('templateAdmins/header', $data);;
    $this->load->view('admin/dataPages/dataPoli', $data);;
    $this->load->view('templateAdmins/footer');;
  }

  public function poliEdit()
  {
    $data = array(
      "nama_poli" => $this->input->post('nama'),
    );
    $where = array(
      "id_poli" => $this->input->post('id'),
    );

    $this->RumahSakitModel->updateData('poli', $data, $where);

    redirect(base_url('admin/data/poli'));
    // return var_dump($data);;
  }

  public function tambahPoli()
  {
		$this->_rulesPoli();
		if($this->form_validation->run() == FALSE) {
      $data = array(
        "title" => "Data Poli",
        "allPoli" => $this->RumahSakitModel->get_data('poli')->result(),
      );
  
      $this->load->view('templateAdmins/header', $data);;
      $this->load->view('admin/dataPages/dataPoli', $data);;
      $this->load->view('templateAdmins/footer');;
    } else {
    $id = $this->input->post('id', true);
    $nama = $this->input->post('nama', true);
    $upload_image = $_FILES['image']['name'];

    $config['upload_path'] = './assets/img/poliImage/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 2048000;
    $config['file_name'] = 'pro' . time();
    $config['max_width'] = 102400;
    $config['max_height'] = 100000;
                
    $this->load->library('upload', $config);
                
    if ($this->upload->do_upload('image')) {
      $gambar_baru = $this->upload->data('file_name');
  
      $data = array(
        "id_poli" => $id,
        "nama_poli" => $nama,
        "poli_image" => $gambar_baru,
      );
  
      $this->RumahSakitModel->insertData($data, 'poli');
      redirect(base_url('admin/data/poli'));
    } else {
      // redirect(base_url('admin/data/poli'));
      return var_dump(array('error' => $this->upload->display_errors()));
    }
  }
    
  }

  public function hapusPoli($id_poli)
  {
    $data = array(
      "id_poli" => $id_poli,
    );

    $this->RumahSakitModel->deleteData($data, 'poli');
    redirect(base_url('admin/data/poli'));
  }









  public function dokter()
  {
    $data = array(
      "title" => "Data Dokter",
      "allDokter" => $this->RumahSakitModel->getDokterPoli()->result(),
      "allPoli" => $this->RumahSakitModel->get_data('poli')->result(),
    );

    $this->load->view('templateAdmins/header', $data);;
    $this->load->view('admin/dataPages/dataDokter', $data);;
    $this->load->view('templateAdmins/footer');;
  }
  public function dokterEdit()
  {
    $data = array(
      "nik" => $this->input->post('nik'),
      "nama_dokter" => $this->input->post('dokter'),
      "shift" => $this->input->post('shift'),
      "jenis_kelamin" => $this->input->post('kelamin'),
      "ttl" => $this->input->post('ttl'),
      "alamat" => $this->input->post('alamat'),
      "id_poli" => $this->input->post('poli'),
      "image" => $this->input->post('image'),
    );
    $where = array(
      "id_dokter" => $this->input->post('id'),
    );

    $this->RumahSakitModel->updateData('dokter', $data, $where);

    redirect(base_url('admin/data/dokter'));
    // return var_dump($data);;
  }

  public function tambahDokter()
  {
		$this->_rulesDokter();
		if($this->form_validation->run() == FALSE) {
      $data = array(
        "title" => "Data Dokter",
        "allDokter" => $this->RumahSakitModel->getDokterPoli()->result(),
        "allPoli" => $this->RumahSakitModel->get_data('poli')->result(),
      );
      
      $this->load->view('templateAdmins/header', $data);;
      $this->load->view('admin/dataPages/dataDokter', $data);;
      $this->load->view('templateAdmins/footer');;
    } else {
    if ($this->input->post('jenis_kelamin') == 'Perempuan') {
      $gambar = 'Woman.png';
    } else {
      $gambar = 'Man.png';
    }
    $data = array(
      "id_poli" => $this->input->post('poli'),
      "nik" => $this->input->post('nik'),
      "nama_dokter" => $this->input->post('nama'),
      "shift" => $this->input->post('shift'),
      "jenis_kelamin" => $this->input->post('jenis_kelamin'),
      "ttl" => $this->input->post('ttl'),
      "alamat" => $this->input->post('alamat'),
      "image" => $gambar,
    );

    $this->RumahSakitModel->insertData($data, 'dokter');
    redirect(base_url('admin/data/dokter'));
  }

  }

  public function hapusDokter($id_dokter)
  {
    $data = array(
      "id_dokter" => $id_dokter,
    );

    $this->RumahSakitModel->deleteData($data, 'dokter');
    redirect(base_url('admin/data/dokter'));
  }










  public function obat()
  {
    $data = array(
      "title" => "Data Obat",
      "allObat" => $this->RumahSakitModel->get_data('obat')->result(),
    );

    $this->load->view('templateAdmins/header', $data);;
    $this->load->view('admin/dataPages/dataObat', $data);;
    $this->load->view('templateAdmins/footer');;
  }

  public function obatEdit()
  {
    $data = array(
      "nama_obat" => $this->input->post('nama'),
      "harga" => $this->input->post('harga'),
    );
    $where = array(
      "id_obat" => $this->input->post('id'),
    );

    $this->RumahSakitModel->updateData('obat', $data, $where);

    redirect(base_url('admin/data/obat'));
    // return var_dump($where);
  }

  public function tambahObat()
  {
		$this->_rulesObat();
		if($this->form_validation->run() == FALSE) {
      $data = array(
        "title" => "Data Obat",
        "allObat" => $this->RumahSakitModel->get_data('obat')->result(),
      );
  
      $this->load->view('templateAdmins/header', $data);;
      $this->load->view('admin/dataPages/dataObat', $data);;
      $this->load->view('templateAdmins/footer');;
    } else {
    $data = array(
      "nama_obat" => $this->input->post('nama'),
      "harga" => $this->input->post('harga'),
    );

    $this->RumahSakitModel->insertData($data, 'obat');
    redirect(base_url('admin/data/obat'));
  }
  }
  public function hapusObat($idObat)
  {
    $data = array(
      "id_obat" => $idObat,
    );

    $this->RumahSakitModel->deleteData($data, 'obat');
    redirect(base_url('admin/data/obat'));
  }




  public function pilihObat($kode_daftar)
  {
    $data = array(
      "title" => "Pilih Obat",
      "kode_daftar" => $kode_daftar,
      "allObat" => $this->RumahSakitModel->get_data('obat')->result(),
    );

    $this->load->view('templateAdmins/header', $data);;
    $this->load->view('admin/pilihObat', $data);;
    $this->load->view('templateAdmins/footer');;
  }

  public function tambahTransaksiObat($kode_daftar, $id_obat)
  {
    $where = array(
      "kode_pendaftaran" => $kode_daftar,
    );

    $pendaftaranOnDb = $this->RumahSakitModel->getWhere($where, 'pendaftaran')->result();
    $transaksiOnDb = $this->RumahSakitModel->getWhere($where, 'transaksi')->result();
    
    if (!$transaksiOnDb) {
      $data = array(
        "kode_pendaftaran" => $kode_daftar,
        "id_dokter" => $pendaftaranOnDb[0]->id_dokter,
        "status_pembayaran" => "Tagihan Pembayaran",
      );
      $this->RumahSakitModel->insertData($data, 'transaksi');
    }

    $transaksi = $this->RumahSakitModel->getWhere($where, 'transaksi')->result();
    $dataTrans = array(
      "id_transaksi" => $transaksi[0]->id_transaksi,
      "id_obat" => $id_obat,
    );
    $this->RumahSakitModel->insertData($dataTrans, 'detail_transaksi');

    redirect(base_url('admin/data/pilihObat/') . $kode_daftar);
    // return var_dump($transaksiOnDb);
  }

  public function lanjutTagihanDaftar($kode_daftar)
  {
    $where = array(
      "kode_pendaftaran" => $kode_daftar,
    );
    $data = array(
      "status_periksa" => 'Tagihan Pembayaran',
    );
    $this->RumahSakitModel->updateData('pendaftaran', $data, $where);
    redirect(base_url('admin/data/pendaftar'));
  }

  public function selesaiDaftar($kode_daftar)
  {
    $where = array(
      "kode_pendaftaran" => $kode_daftar,
    );
    $data = array(
      "status_periksa" => "Selesai",
    );

    $wheree = array(
      "kode_pendaftaran" => $kode_daftar,
      "status_pembayaran" => "Tagihan Pembayaran",
    );
    $transData = $this->RumahSakitModel->getWhere($wheree, 'transaksi')->result();
    $where2 = array(
      "id_transaksi" => $transData[0]->id_transaksi,
    );
    $data2 = array(
      "status_pembayaran" => "Selesai",
    );

    $this->RumahSakitModel->updateData('pendaftaran', $data, $where);
    $this->RumahSakitModel->updateData('transaksi', $data2, $where2);
    redirect(base_url('admin/data/pendaftar'));
  }







  public function _rulesObat() {
		$this->form_validation->set_rules('nama','Nama Obat','trim|required');
		$this->form_validation->set_rules('harga','Harga Obat','required');
	}
  public function _rulesPoli() {
		$this->form_validation->set_rules('id','Id Poli','trim|required');
		$this->form_validation->set_rules('nama','Nama Poli','required');
		// $this->form_validation->set_rules('image','Gambar','required');
	}
  public function _rulesDokter() {
		$this->form_validation->set_rules('nik','NIK','required');
		$this->form_validation->set_rules('poli','Poli','required');
		$this->form_validation->set_rules('nama','Nama Dokter','required');
		$this->form_validation->set_rules('shift','Shift','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('ttl','TTL','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
	}
}
