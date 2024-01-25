<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    // Redirect ke halaman utama
	public function index(){
		
		redirect('/', 'refresh');
		
	}

    // domain.local/barang/tambah/{idbarang}
	public function tambah(){

		$kodebarang = $this->input->post('kode_barang');
		$kuantitas = $this->input->post('kuantitas');
		
		// Init DB
		$this->load->database();
		// Load Model Barang dan JSON
		$this->load->model('model_barang');
		$this->load->model('model_json');
		$data = $this->model_json->init();

		// Aksi
		$hasil = $this->model_barang->ubahKuantitasBarang($kodebarang, $kuantitas);
		if ($hasil !== null){
			$data['status'] = true; $data['kode'] = 'OK';
			$data['pesan'] = 'Berhasil menambah kuantitas barang!';
			$data['data'] = $hasil;
		}else{
			$data['kode'] = 'NOT_FOUND';
			$data['pesan'] = 'Tidak dapat menambah kuantitas barang!';
		}

		// Load View API JSON
		$this->load->view('view_api', array( 'data' => $data ));

	}

	// domain.local/barang/lihat/{all}
	public function lihat($pilihan='all'){
		
		// Init DB
		$this->load->database();
		// Load Model
		$this->load->model('model_app_barang');

		switch ($pilihan) {
			case 'all':
				// Ambil data barang semua
				$data['listing'] = $this->model_barang->getBarangSemua();
				break;
			
			default:
				// Ambil data barang satu saja
				$data['listing'] = $this->model_barang->getBarangSatu($pilihan);
				break;
		}

		// Tampilkan Halaman
		$this->load->view('parts/header');
		$this->load->view('parts/navbar');
		$this->load->view('view_api', $data);

	}

}
