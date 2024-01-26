<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    // Redirect ke halaman utama
	public function index(){
		
		redirect('/', 'refresh');
		
	}

	public function test(){

		// Init DB dan Load JSON
		$this->load->database();
		$this->load->model('model_json');
		$this->model_json->pick();

		// Set response
		$this->model_json->setStatus(true);
		$this->model_json->setKode('OK');
		$this->model_json->setPesan('Berhasil!');

		// Kirim Respon
		$this->model_json->put();

	}

	// domain.local/barang/lihat/{all}
	public function lihat($pilihan = false){
		
		// Init DB dan Load JSON
		$this->load->database();
		$this->load->model('model_json');
		$this->model_json->pick();
		// Load Model
		$this->load->model('model_barang');

		switch ($pilihan) {
			case 'all':
				// Ambil data barang semua
				$hasil = $this->model_barang->lihat();
				$this->model_json->setData($hasil);

				// Set respon JSON
				$this->model_json->setStatus(true);
				$this->model_json->setKode('OK');
				$this->model_json->setPesan('Berhasil!');
				break;
			
			default:
				// Ambil data barang satu saja spesifik
				$kodebarang = $this->input->get('kode_barang');
				
				$hasil = $this->model_barang->lihatSingle($kodebarang);
				$this->model_json->setData($hasil);

				// Set respon JSON
				$this->model_json->setStatus(true);
				$this->model_json->setKode('OK');
				$this->model_json->setPesan('Berhasil!');
				break;
		}

		// Kirim Respon
		$this->model_json->put();
	}

}
