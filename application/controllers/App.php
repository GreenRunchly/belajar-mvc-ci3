<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	// Redirect ke halaman utama
	public function index(){
		
		// Init DB, Load JSON, dan ketahui metode request
		$this->load->database();
		$this->load->model('model_json');
		$this->model_json->pick();

		// Metode yang diperbolehkan
		$metodeRequest = $this->model_json->getMetodeRequest();

		// Set response
		$this->model_json->setStatus(false);
		$this->model_json->setKode('NOT_FOUND');
		$this->model_json->setPesan('Metode ' . $metodeRequest . ' digunakan.');

		// Kirim Respon
		$this->model_json->put();
		
	}

}
