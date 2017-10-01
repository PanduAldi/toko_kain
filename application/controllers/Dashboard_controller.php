<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('u_login') == false) 
		{
			redirect('login-admin','refresh');
		}
	}

	public function index()
	{
		$data['title'] = "Dashboard";

		$this->template->admin_display('backend/dashboard', $data);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */