<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('cart');
		$this->load->model(array('kategori_model', 'produk_model'));
	}

	public function index()
	{
		$data['title'] = "Beranda";
		$data['kategori'] = $this->kategori_model->get();
		$data['random_produk'] = $this->db->query("SELECT * FROM produk ORDER BY RAND() LIMIT 10")->result_array();
		$data['best_seller'] = $this->db->query("SELECT * FROM produk ORDER BY terjual DESC LIMIT 2")->result_array();
		
		$this->template->display('frontend/beranda', $data);
	}

	public function tentang_kami()
	{
		$data['title'] = "tentang Kami";
		$this->template->display('frontend/tentang_kami', $data);
	}

	public function cara_belanja()
	{
		$data['title'] = "Cara Belanja";
		$this->template->display('frontend/cara_belanja', $data);
	}

	public function hubungi_kami()
	{
		$data['title'] = "Hubungi Kami";

		$this->template->display('frontend/hubungi_kami');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */