<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('cart', 'pagination'));
		$this->load->model(array('produk_model'));
	}

	public function by_kategori($id, $offset=null)
	{
		$limit = 5;

		$select = "kategori.nama AS nama_kat, produk.*";
		$data['produk'] = $this->produk_model->get(array('limit' => $limit, 'offset' => $offset,  'kategori' => $id));

		$kat = $this->db->get('kategori', array('id_kategori' => $id))->row_array();

		$data['title'] = "Kategori ".$kat['nama'];

		$config['base_url'] = site_url('kategori/'.$id."/");
		$config['total_rows'] = $this->produk_model->hitung($id);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['page'] =  $this->pagination->create_links();

		$this->template->display('frontend/produk_by_kategori', $data);

	}

	public function detail($id)
	{

		$e = explode('_', $id);

		$select = "kategori.nama AS kategori, produk.*";
		$data['d'] = $this->produk_model->get(array('select' => $select,'kode' => $e[0]));

		$data['title'] = $data['d']['nama'];

		$this->template->display('frontend/lihat_produk', $data);
	}

	public function cari_produk()
	{
		$key = $this->input->get('key');
		$data['title'] = "Cari : ".$key;

		$select = "produk.*";
		$data['produk'] = $this->produk_model->get(array('select' => $select,'key' => $key));

		$this->template->display('frontend/cari', $data);
	}

}

/* End of file front_produk.php */
/* Location: ./application/controllers/front_produk.php */
