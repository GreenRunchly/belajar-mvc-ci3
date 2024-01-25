<?php
class model_barang extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function lihatBarangSatu($kodebarang = false) {

        $this->db->select('tbl_barang.*,tbl_barang_stock.*');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_barang_stock', 'tbl_barang.barang_kode = tbl_barang_stock.stock_barang_kode', 'inner'); 
        $this->db->like(array('barang_kode' => $kodebarang));
        $query = $this->db->get();
  
        return $query->result_array();
    }

    public function lihatBarangSemua() {

        $this->db->select('tbl_barang.*,tbl_barang_stock.*');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_barang_stock', 'tbl_barang.barang_kode = tbl_barang_stock.stock_barang_kode', 'inner'); 
        $query = $this->db->get();

        return $query->result_array();
    }

	public function ubahKuantitasBarang($kodebarang = false, $kuantitasPerubahan = 0) {

		$hasil = null;

		// Mengambil informasi satu barang
        $dataBarangSatu = $this->model_barang->lihatBarangSatu($kodebarang);

		// Cek jika ada barangnya atau tidak
		if (!empty($dataBarangSatu)){

			// Mengurangi kuantitas lama
			$kuantitasBaru = ( $dataBarangSatu[0]['stock_quantity'] + ($kuantitasPerubahan) );
			
			// Melakukan update kuantitas pada database
			$this->db->where( array('stock_barang_kode' => $kodebarang) );
			$this->db->update('tbl_barang_stock', array('stock_quantity' => $kuantitasBaru) );
			
			$hasil = $this->db->affected_rows();
			
		}

        return $hasil;
    }

	public function ubahHargaBarang($kodebarang = false, $hargaPerubahan = 0) {

		$hasil = null;

		// Mengambil informasi satu barang
        $dataBarangSatu = $this->model_barang->lihatBarangSatu($kodebarang);

		// Cek jika ada barangnya atau tidak
		if (!empty($dataBarangSatu)){

			// Mengurangi kuantitas lama
			$kuantitasBaru = $hargaPerubahan;
			
			// Melakukan update kuantitas pada database
			$this->db->where( array('stock_barang_kode' => $kodebarang) );
			$this->db->update('tbl_barang_stock', array('stock_quantity' => $kuantitasBaru) );
			
			$hasil = $this->db->affected_rows();
			
		}

        return $hasil;
    }

}
    