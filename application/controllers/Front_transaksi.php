<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front_transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('transaksi_model','member_model'));
		$this->load->library('cart');

	}

	public function konfirmasi_order()
	{
		$data['title'] = "Konfirmasi Order";
		$data['belanja'] = $this->cart->contents();
		$data['u'] = $this->member_model->get(array('id' => $this->session->userdata('m_id')));

		$this->template->display('frontend/konfirmasi_order', $data);

	}

}

/* End of file  */
/* Location: ./application/controllers/ */