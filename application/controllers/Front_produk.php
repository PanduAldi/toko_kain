<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_produk extends CI_Controller {

	public function __contstruct()
	{
		parent::__contstruct();
		$this->load->model(array('produk_model'));
	}

	public function index()
	{
		
	}

	public function by_kategori($id, $url)
	{
		$cek = $this->db->query('select * from');

		$data['title'] = "Kategori "
	}

}

/* End of file front_produk.php */
/* Location: ./application/controllers/front_produk.php */