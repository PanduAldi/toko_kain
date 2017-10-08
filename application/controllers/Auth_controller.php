<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('user_model'));
		$this->load->library('form_validation');

	}

	public function index()
	{
		if ($this->session->userdata('u_login') == true)
		{
			redirect('dashboard','refresh');
		}
		else
		{
			$this->session->sess_destroy();
			$data['title'] = "Login Administrator";
			$this->template->admin_display('backend/login_panel', $data);
		}
	}

	public function do_login()
	{

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		# Space From Validation Message

		// End Space
		if ($this->form_validation->run() == true)
		{
			$username = $this->input->post('username');
			$password  = sha1($this->input->post('password'));

			$cek_login = $this->user_model->user_login($username, $password);

			if ($cek_login->num_rows() > 0)
			{
				//user get
				$u = $cek_login->row();

				//cek user blocke

					//update user last login
					$this->user_model->edit(array('user_last_login' => date('Y-m-d H:i:s')), $u->user_id);

					//session create
					$this->session->set_userdata('u_login', true);
					$this->session->set_userdata('u_id', $u->user_id);
					$this->session->set_userdata('u_username', $u->user_name);
					$this->session->set_userdata('u_fullname', $u->user_full_name);
					$this->session->set_userdata('u_email', $u->user_email);
					$this->session->set_userdata('u_last_login', $u->user_last_login);
					$this->session->set_userdata('u_status', $u->status);

					redirect('dashboard','refresh');

			}
			else
			{
				$this->session->set_flashdata('login_nofif', '<div class="alert alert-danger">Username / Password Salah</div>');
				redirect('login-admin','refresh');
			}
		}
		else
		{
			redirect('login-admin');
		}
	}


	public function _login_rule()
	{
		if ($this->session->userdata('u_login') == true)
		{
			redirect('dashboard','refresh');
		}
		else
		{
			redirect('login-admin');
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login-admin','refresh');
	}

}

/* End of file  */
/* Location: ./application/controllers/ */
