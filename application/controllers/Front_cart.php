<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('produk_model'));
		$this->load->library(array('cart'));

	}

	public function index()
	{
		$data['title'] = "Keranjang Belanja";

		$this->template->display('frontend/keranjang_belanja', $data);

	}

	public function add()
	{
		$id = $this->input->post('kode');

		$cek = $this->produk_model->get(array('kode' => $id));

		$data = array(
						'id' => $cek['kode_produk'],
						'name' => $cek['nama'],
						'qty' => 5,
						'price' => $cek['harga'],
						'options' => array('img' => $cek['img'])
					);

		$this->cart->insert($data);

	}

	public function edit()
	{
		$total  = $this->cart->contents();
		$id = $this->input->post('id');
		$qty = $this->input->post('qty');

		for ($i=0; $i < count($total) ; $i++)
		{
			$data = array(
					'rowid' => $id[$i],
					'qty' => $qty[$i]
			);

			$this->cart->update($data);
		}

		redirect('keranjang-belanja', 'refresh');
	}

	public function delete($id)
	{
		$data = array(
						"rowid" => $id,
						"qty" => 0
					);

		$this->cart->update($data);

		redirect('keranjang-belanja');
	}

}

/* End of file front_cart.php */
/* Location: ./application/controllers/front_cart.php */
