<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	
		$this->load->model('kategori_model', 'kat_m');
		$this->load->library('form_validation');

		if ($this->session->userdata('u_login') == false) 
		{
			redirect('login-admin','refresh');
		}

	}

	public function index()
	{
		$data['title'] = "Setting Kategori";
		$data['view'] = $this->kat_m->get();

		$this->template->admin_display('backend/kategori/view_kategori', $data);
	}

	public function add()
	{
		$data['title'] = "Tambah Kategori";

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kode', 'Kode',  'trim|required|xss_clean');
		

		if ($this->form_validation->run() == true) 
		{
			$rec = array(
							"nama" => $this->input->post('nama'),
							"kode" => strtoupper($this->input->post('kode'))
						);
		
			$this->kat_m->add($rec);

			$this->session->set_flashdata('notif', '<div class="alert alert-success"><i class="fa fa-check"></i> Tambah Kategori Berhasil!!!</div>');
			redirect('setting-kategori','refresh');
		}

		$this->template->admin_display('backend/kategori/add_kategori', $data);

	}

	public function edit($id)
	{
		$data['title'] = "Tambah Kategori";
		$data['v'] = $this->kat_m->get(array('id' => $id));

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kode', 'Kode',  'trim|required|xss_clean');
		

		if ($this->form_validation->run() == true) 
		{
			$rec = array(
							"nama" => $this->input->post('nama'),
							"kode" => $this->input->post('kode')
						);
		
			$this->kat_m->edit($rec, $id);

			$this->session->set_flashdata('notif', '<div class="alert alert-success"><i class="fa fa-check"></i> Edit Kategori Berhasil!!!</div>');
			redirect('setting-kategori','refresh');
		}

		$this->template->admin_display('backend/kategori/edit_kategori', $data);
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$this->kat_m->del($id);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */