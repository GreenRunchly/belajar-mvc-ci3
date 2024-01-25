<?php
class model_app_barang extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function getBarangSatu($kodebarang = false) {

        $this->db->select('tbl_barang.*,tbl_barang_stock.*');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_barang_stock', 'tbl_barang.barang_kode = tbl_barang_stock.stock_barang_kode', 'inner'); 
        $this->db->like(array('barang_kode' => $kodebarang));
        $query = $this->db->get();
  
        return $query->result_array();
    }

    public function getBarangSemua() {

        $this->db->select('tbl_barang.*,tbl_barang_stock.*');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_barang_stock', 'tbl_barang.barang_kode = tbl_barang_stock.stock_barang_kode', 'inner'); 
        $query = $this->db->get();

        return $query->result_array();
    }

}
    