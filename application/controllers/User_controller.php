<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *  Sing Nggawe : [
 * 		Name : Pandu Aldi Pratama
 *  ]
 */

class User_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('user_model'));

		$this->load->library('form_validation');

		if ($this->session->userdata('u_login') == false) {
			redirect('login','refresh');
		}

	}

	public function index()
	{
		$params['select'] = 'user.*';
		$data = array(
						"title" => "Data User",
						"user" => $this->user_model->user_join($params)
					);

		$this->template->display('backend/user/user_list', $data);
	}

	public function add()
	{
		$data = array(
						"title" => "Tambah User"	
					);

		$this->__rules();

		if ($this->form_validation->run() == true) 
		{

			$rec = array(
							"user_id" => "",
							"user_name" => $this->input->post('username'),
							"user_nik" => $this->input->post('nik'),
							"user_full_name" => $this->input->post('nama'),
							"user_email" => $this->input->post('email'),
							"user_jk" => $this->input->post('jk'),
							"role_id" => 1,
							"user_password" => sha1($this->input->post('password')),
							"user_created_date" => date('Y-m-d H:i:s'),
							"user_last_login" => date("Y-m-d H:i:s")
						);				
		

			$this->user_model->add($rec);
			$rec_log = array(
							'log_id' => '',
							'log_date' => date("Y-m-d H:i:s"),
							'ip_address' => $_SERVER['REMOTE_ADDR'],
							'log_module' => 'tambah',
							'log_activity' => 'user : '.$this->input->post('nama'),
							'user_id' => $this->session->userdata('u_username')
						);

			$this->log_model->add($rec_log);
			$this->session->set_flashdata('notif', 'Tambah User Berhasil');
			redirect('user','refresh');
		
		}

		$this->template->display('backend/user/add_user', $data);
	}

	public function edit($id)
	{
		$data = array(
						"title" => "Edit User",
						"user" => $this->user_model->user_join(array("id" => $id, 'select' => 'user.*'))
					);

		if ($this->form_validation->run() == true) 
		{
			$rec = array(
							"user_name" => $this->input->post('username'),
							"user_full_name" => $this->input->post('nama'),
							"user_nik" => $this->input->post('nik'),
							"user_email" => $this->input->post('email'),
							"user_jk" => $this->input->post('jk'),
							"user_password" => sha1($this->input->post('password')),
							"user_created_date" => date('Y-m-d H:i:s'),
							"user_last_login" => date("y-m-d H:i:s")
						);

			$this->user_model->edit($rec, $id);
			$rec_log = array(
							'log_id' => '',
							'log_date' => date("Y-m-d H:i:s"),
							'ip_address' => $_SERVER['REMOTE_ADDR'],
							'log_module' => 'edit',
							'log_activity' => 'user : '.$this->input->post('username'),
							'user_id' => $this->session->userdata('u_username')
						);

			$this->log_model->add($rec_log);
			$this->session->set_flashdata('notif', 'Edit User Berhasil');
			redirect('data-user','refresh');
		}

		$this->template->display('user/edit_user', $data);
	}

	public function del()
	{
		$id = $this->input->post('id');
		$bid = $this->user_model->get(array('id' => $id));
		
		$rec_log = array(
							'log_id' => '',
							'log_date' => date("Y-m-d H:i:s"),
							'ip_address' => $_SERVER['REMOTE_ADDR'],
							'log_module' => 'hapus',
							'log_activity' => 'User : '.$bid['user_name'],
							'user_id' => $this->session->userdata('u_username')
						);
		$this->log_model->add($rec_log);

		$this->user_model->del($id);
		$this->session->set_flashdata('notif', 'Data berhasil dihapus');
	}

	public function view($id)
	{
		$data = array(
						"title" => "Detail User",
						"view" => $this->user_model->user_join(array('select' => 'user.*', 'id' => $id))
					);
		$this->template->display('backend/user/detail_user', $data);
	}


	public function reset_password()
	{
		$id  = $this->input->post('id');
		$data = $this->user_model->get(array('id' => $id));

		$rec = array(
						"user_password" => sha1('operator123')
					);
		$this->user_model->edit($rec, $id);

		$rec_log = array(
							'log_id' => '',
							'log_date' => date("Y-m-d H:i:s"),
							'ip_address' => $_SERVER['REMOTE_ADDR'],
							'log_module' => 'Reset',
							'log_activity' => 'Password : '.$data['user_name'],
							'user_id' => $this->session->userdata('u_username')
						);
		$this->log_model->add($rec_log);
		$this->session->set_flashdata('notif', 'Reset Password Berhasil. Password : operator123');

	}

	public function __rules()
	{
		$config = array(
							array(
									"field" => 'nama',
									"label" => "Nama",
									"rules" => "required|trim|xss_clean"
								),
							array(
									"field" => 'nik',
									"label" => 'NIK',
									"rules" => "required|trim|xss_clean"
								),
							array(
									"field" => 'username',
									"label" => "Username",
									"rules" => "required|trim|xss_clean"
								),
							array(
									"field" => "jk",
									"label" => "Jenis Kelamin",
									"rules" => "required|trim|xss_clean"
								),
							array(
									"field" => 'email',
									"label" => "Email",
									"rules" => "required|trim|xss_clean"
								),
							array(
									"field" => 'password',
									"label" => "Password",
									"rules" => "required|trim|xss_clean"
								)
						);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_message('required', '{field} Tidak Boleh Kosong');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */