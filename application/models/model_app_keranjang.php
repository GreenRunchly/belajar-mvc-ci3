<?php
class model_app_keranjang extends CI_Model {

    // Load DB
    public function __construct() {
        $this->load->database();
    }

    public function tambahBarang($kodebarang=false, $stokDibeli=0) {

        $hasil = null;
        
        if ($kodebarang !== false){
            // Ambil informasi barang
            $this->load->model('model_app_barang');
            $infoBarang = $this->model_app_barang->getBarangSatu($kodebarang)[0];

			// Cek kuantitas apakah cukup dengan jumlah yang ingin dibeli
			$stockBarang = $infoBarang['stock_quantity'];
			if ($stockBarang > $stokDibeli){
				$stockTerjual = $stockBarang-$stokDibeli;
				
				$this->db->where('stock_barang_kode', $kodebarang);
				$hasil = $this->db->update('tbl_barang_stock', array(
					'stock_quantity' => $stockTerjual
				));
				
			}else{
				$hasil = false;
			}

        }

        return $hasil;
    }

    public function buangBarang() {

        
    }

    public function lihatIsiKeranjang() {

        
    }

    public function bayarIsiKeranjang() {

        
    }


}
    