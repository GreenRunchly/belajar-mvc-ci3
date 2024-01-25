<?php
class model_json extends CI_Model {

    public function init() {
        return array(
			'status' => false,
			'kode' => 'MISSING',
			'pesan' => 'Ada yang tidak beres, cek lagi...'
		);
    }
	
}
