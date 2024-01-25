<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	// domain.local/barang/lihat/{all}
	public function lihat(){
		

	}

    // domain.local/barang/tambah/{idbarang}
	public function tambah(){

		$hasil = array(
			'status' => false,
			'kode' => 'EMPTY',
			'pesan' => 'Ada yang tidak beres'
		);

		$kodebarang = $this->input->post('kode_barang');
		$kuantitas = $this->input->post('kuantitas');
		
		if ($kodebarang !== false) {

			// Load DB
			$this->load->database();

			// Ambil Model Keranjang dan melakukan penambahan barang ke keranjang
			$this->load->model('model_app_keranjang');
			$apakahBerhasil = $this->model_app_keranjang->tambahBarang($kodebarang, $kuantitas);

			switch ($apakahBerhasil) {
				case true:
					$hasil['status'] = true; 
					$hasil['kode'] = 'OK';
					$hasil['pesan'] = 'Barang berhasil dimasukan kedalam keranjang.';
					break;
				case false:
					$hasil['status'] = 'OUT_OF_STOCK';
					$hasil['pesan'] = 'Barang sedang kosong.';	
					break;
			}

		}else{
			$hasil['kode'] = 'MISSING_PARAMETER';
			$hasil['pesan'] = 'Kode barang belum ditentukan.';
		}

		// Load View
		$this->load->view('view_app_api', array('data' => $hasil));

	}

}
