<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function display($template, $data=null)
	{
		$data = array(
						"_content" => $this->ci->load->view($template, $data, true)
					);

		$this->ci->load->view('frontend/template', $data);
	}

	public function admin_display($template, $data=null)
	{
		$data = array(
						"_content" => $this->ci->load->view($template, $data, true)
					 );

		$this->ci->load->view('backend/template', $data);
	}

}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
