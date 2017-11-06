<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		$this->load->library('cart');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function sukses()
	{
		$this->template->display('frontend/order_sukses');
	}

	public function cart()
	{



		$data = array(
						'id' => 1,
						'name' => 'Macbook Air',
						'qty' => 1,
						'price' => 4000000,
						'options' => array("warna" => "merah")
					);

		$this->cart->insert($data);

	} 

	public function tampil_cart()
	{
		print_r($this->cart->contents());
	}

	public function tampil()
	{
		$this->load->view('frontend/template');
	} 

	public function ris()
	{
		$data['title'] = "RIS";
		$data['d'] = file_get_contents('http://10.33.29.20:8055/Ris/Ris/refresh_data');

		$this->template->display('ris', $data);
	}
}