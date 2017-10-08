<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model(array('produk_model'));
	}

	public function index()
	{

	}

	public function by_kategori($id)
	{
		$ex = explode("_", $id);

		$cek = $this->db->query('select * from produk where id_kategori = '.$ex[0])->result_array();
		$data['title'] = "Kategori";

		print_r($cek);
	}

	public function detail($id)
	{

		$e = explode('_', $id);

		$select = "kategori.nama AS kategori, produk.*";
		$data['d'] = $this->produk_model->get(array('select' => $select,'kode' => $e[0]));

		$data['title'] = $data['d']['nama'];

		$this->template->display('frontend/lihat_produk', $data);
	}

}

/* End of file front_produk.php */
/* Location: ./application/controllers/front_produk.php */
