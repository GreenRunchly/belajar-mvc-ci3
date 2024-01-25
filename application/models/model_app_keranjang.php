<?php
class model_app_keranjang extends CI_Model {

    // Load DB
    public function __construct() {
        $this->load->database();
    }

    public function tambahBarang($kodebarang=false) {

        $barangTerpilih = null;
        
        if ($kodebarang !== false){
            // Ambil informasi barang
            $this->load->model('model_app_barang');
            $barangTerpilih = $this->model_app_barang->getBarangSatu($kodebarang)[0];
        }

        return $barangTerpilih;
    }

    public function buangBarang() {

        
    }

    public function lihatIsiKeranjang() {

        
    }

    public function bayarIsiKeranjang() {

        
    }


}
    