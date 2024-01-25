<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    // Redirect ke halaman utama
	public function index(){
		
		redirect('/', 'refresh');
		
	}

	// domain.local/barang/lihat/{all}
	public function lihat($pilihan='all'){
		
		// Init DB
		$this->load->database();

		switch ($pilihan) {
			case 'all':
				// Ambil data barang semua
				$this->load->model('model_app_barang');
				$data['listing'] = $this->model_app_barang->getBarangSemua();
				break;
			
			default:
				// Ambil data barang satu saja
				$this->load->model('model_app_barang');
				$data['listing'] = $this->model_app_barang->getBarangSatu($pilihan);
				break;
		}

		// Tampilkan Halaman
		$this->load->view('parts/header');
		$this->load->view('parts/navbar');
		$this->load->view('view_app_barang', $data);

	}

    // domain.local/barang/tambah/{idbarang}
	public function tambah(){
		
		// Init DB
		$this->load->database();

	}

}
