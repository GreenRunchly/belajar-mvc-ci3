<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	// domain.local/barang/lihat/{all}
	public function lihat(){
		

	}

    // domain.local/barang/tambah/{idbarang}
	public function tambah($kodebarang = false){

		$hasil = array(
			'status' => false,
			'kode' => 'missing',
			'pesan' => 'Ada yang tidak beres'
		);
		
		if ($kodebarang !== false) {

			// Load DB
			$this->load->database();

			// Ambil Model Keranjang dan melakukan penambahan barang ke keranjang
			$this->load->model('model_app_keranjang');
			$barangDitambahkan = $this->model_app_keranjang->tambahBarang($kodebarang);
			
			$hasil = array(
				'status' => true,
				'kode' => 'OK',
				'pesan' => 'Barang bernama ' .$barangDitambahkan['barang_nama']. ' berhasil dimasukan kedalam keranjang.',
				'data' => $barangDitambahkan
			);

			$hasil['kode'] = 'OK';
			$hasil['pesan'] = 'Barang bernama ' .$barangDitambahkan['barang_nama']. ' berhasil dimasukan kedalam keranjang.';
			$hasil['data'] = $barangDitambahkan;

		}else{
			$hasil['pesan'] = 'Kode barang belum ditentukan.';
		}

		$this->load->view('view_app_api', array('data' => $hasil));

	}

}