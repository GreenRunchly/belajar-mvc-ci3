<?php
class model_json extends CI_Model {

	public $pesan;
	public $status;
	public $kode;
	public $data;

    public function pick() {
        $this->status = false;
		$this->kode = 'EMPTY';
		$this->pesan = 'Ada yang tidak beres, cek lagi...';
    }

	public function setStatus($status = null) {
		$this->status = $status;
	}

	public function getStatus() {
		return $this->status;
	}

	public function setKode($kode = null) {
		$this->kode = $kode;
	}

	public function getKode() {
		return $this->kode;
	}

	public function setPesan($pesan = null) {
		$this->pesan = $pesan;
	}

	public function getPesan() {
		return $this->pesan;
	}

	public function setData($data = null) {
		$this->data = $data;
	}

	public function getData() {
		return $this->data;
	}

	public function put() {

		$data['json'] = array(
			'status' => $this->status,
			'kode' => $this->kode,
			'pesan' => $this->pesan
		);

		$data['json']['data'] = $this->data;

		$this->load->view('view_api', $data);

    }
	
}
