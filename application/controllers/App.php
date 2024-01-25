<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	// Halaman Utama domain.local
	public function index(){
		
		// Init DB
		$this->load->database();
		$this->load->view('parts/header');
		$this->load->view('parts/navbar');
		$this->load->view('view_main');
		
	}

}
