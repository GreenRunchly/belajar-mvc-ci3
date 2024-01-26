<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function test(){

		// Init DB, Load JSON, dan ketahui metode request
		$this->load->database();
		$this->load->model('model_json');
		$this->model_json->pick();

		$metodeRequest = $this->model_json->getMetodeRequest();
		switch ($metodeRequest) {
			case 'GET':
				
				// Set response
				$this->model_json->setStatus(true);
				$this->model_json->setKode('OK');
				$this->model_json->setPesan('Berhasil! Metode ' . $metodeRequest . ' digunakan.');
				break;
		}

		// Kirim Respon
		$this->model_json->put();

	}

	// domain.local/barang/lihat
	public function lihat(){
		
		// Init DB dan Load JSON
		$this->load->database();
		$this->load->model('model_json');
		$this->model_json->pick();
		// Load Model
		$this->load->model('model_barang');

		// Data GET
		$kodebarang = $this->input->post('kode_barang');

		if (!empty($kodebarang)){
			// Ambil data barang satu saja spesifik
			$hasil = $this->model_barang->lihatSingle($kodebarang);
			$this->model_json->setData($hasil);

			// Set respon JSON
			$this->model_json->setStatus(true);
			$this->model_json->setKode('OK');
			$this->model_json->setPesan('Berhasil!');
		}else{
			// Ambil data barang semua
			$hasil = $this->model_barang->lihat();
			$this->model_json->setData($hasil);

			// Set respon JSON
			$this->model_json->setStatus(true);
			$this->model_json->setKode('OK');
			$this->model_json->setPesan('Berhasil!');
		}
		// Kirim Respon
		$this->model_json->put();
	}

}
