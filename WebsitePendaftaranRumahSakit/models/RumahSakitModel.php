<?php 

	class RumahSakitModel extends CI_model{
		public function get_data($table){ 
			return $this->db->get($table);
		}

		public function getWhere($where,$table) {
			$this->db->where($where);
			return $this->db->get($table);
		}

		public function insertData($data,$table) {
			$this->db->insert($table,$data);
		}

		public function updateData($table, $data,$where) {
			$this->db->update($table,$data,$where);
		}

		public function deleteData($where,$table) {
			$this->db->where($where);
			$this->db->delete($table);
		}

		public function getNumRows($table) {
			return $this->db->get($table)->num_rows();
		}

		public function getNumRowsWhere($table, $where) {
			return $this->db->where($where)->get($table)->num_rows();
		}

		public function getPasienUser($where) {
			$this->db->select('*');
      $this->db->from('pasien pas');
      $this->db->join('user us', 'us.id_user=pas.id_user');
			$this->db->where($where);
			return $this->db->get();
		}

		public function getDokterPoli() {
			$this->db->select('*');
      $this->db->from('dokter dok');
      $this->db->join('poli pol', 'dok.id_poli=pol.id_poli');
			return $this->db->get();
		}

		public function getTransaksi($where) {
			$this->db->select('*');
      $this->db->from('detail_transaksi dt');
      $this->db->join('transaksi trans', 'trans.id_transaksi=dt.id_transaksi');
      $this->db->join('pendaftaran daft', 'trans.kode_pendaftaran=daft.kode_pendaftaran');
      $this->db->join('obat ob', 'dt.id_obat=ob.id_obat');
			$this->db->where($where);
			return $this->db->get();
		}

		public function getSumTransaksi($id) {
			return $this->db->query("SELECT SUM(harga) as total FROM detail_transaksi JOIN obat ON obat.id_obat=detail_transaksi.id_obat WHERE id_transaksi=" . $id);
		}

		public function getPendaftaranDokter($where) {
			$this->db->select('*');
      $this->db->from('dokter dok');
      $this->db->join('pendaftaran pd', 'dok.id_poli=pd.id_poli');
      $this->db->join('poli pol', 'dok.id_poli=pol.id_poli');
			$this->db->where($where);
			return $this->db->get();
		}

		public function getPendaftaranDokterPoli($where) {
			$this->db->select('pd.kode_pendaftaran, pol.nama_poli, pd.tgl_daftar, dok.shift, pd.status_periksa, trans.id_transaksi, dok.nama_dokter');
      $this->db->from('pendaftaran pd');
      $this->db->join('poli pol', 'pol.id_poli=pd.id_poli');
      $this->db->join('dokter dok', 'dok.id_dokter=pd.id_dokter');
      $this->db->join('transaksi trans', 'trans.kode_pendaftaran=pd.kode_pendaftaran', 'left');
			$this->db->where($where);
			return $this->db->get();
		}

		public function getPendaftaranPasienPoli() {
			$this->db->select('pd.kode_pendaftaran, pas.nama_pasien, pol.nama_poli, pd.tgl_daftar, pd.pembayaran, pd.status_periksa, trans.id_transaksi');
      $this->db->from('pasien pas');
      $this->db->join('pendaftaran pd', 'pas.id_pasien=pd.id_pasien');
      $this->db->join('poli pol', 'pol.id_poli=pd.id_poli');
      $this->db->join('transaksi trans', 'trans.kode_pendaftaran=pd.kode_pendaftaran', 'left');
			return $this->db->get();
		}

	}
