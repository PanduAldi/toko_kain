<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('bank_model', 'bank');
		$this->load->library(array('upload', 'form_validation'));

		if ($this->session->userdata('u_login') == false)
		{
			redirect('login-admin','refresh');
		}

	}

	public function index()
	{
		$data['title'] = "Setting Kategori";
		$data['view'] = $this->bank->get();

		$this->template->admin_display('backend/bank/view_bank', $data);
	}

	public function add()
	{
		$data['title'] = "Tambah Bank";

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('no_rek', 'Nomor Rekening',  'trim|required|xss_clean');
    $this->form_validation->set_rules('an', 'Atas Nama', 'trim|required|xss_clean');

		if ($this->form_validation->run() == true)
		{
      $config['upload_path'] = './media/img/bank/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size']  = '8000';
			$config['max_width']  = '9024';
			$config['max_height']  = '4768';
			$config['remove_spaces'] = true;

			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('img'))
			{
				$this->session->set_flashdata('notif_img', $this->upload->display_errors());
			}
			else
			{
				$rec = array(
								'id_bank'	=> '',
								'nama' => $this->input->post('nama'),
								'no_rek' => $this->input->post('no_rek'),
                'an' => $this->input->post('an'),
								'img' => $this->upload->data('file_name'),
							);

				$this->bank->add($rec);

				$this->session->set_flashdata('notif', '<div class="alert alert-success"><i class="fa fa-check"></i> Tambah bank berhasil</div>');
				redirect('setting-bank','refresh');
			}
		}

		$this->template->admin_display('backend/bank/add_bank', $data);
	}

	public function edit($id)
  {

		$data['title'] = "Edit Bank";
		$data['bank'] = $this->bank->get(array('id' => $id));

    $this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('no_rek', 'Nomor Rekening',  'trim|required|xss_clean');
    $this->form_validation->set_rules('an', 'Atas Nama', 'trim|required|xss_clean');

		if ($this->form_validation->run() == true)
		{
			$config['upload_path'] = './media/img/bank/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size']  = '8000';
			$config['max_width']  = '2024';
			$config['max_height']  = '1768';
			$config['remove_spaces'] = true;

			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('img'))
			{
				$rec = array(
								'nama' => $this->input->post('nama'),
								'no_rek' => $this->input->post('no_rek'),
								'an' => $this->input->post('an')
							);

				$this->bank->edit($rec, $id);

				$this->session->set_flashdata('notif', '<div class="alert alert-success"><i class="fa fa-check"></i> Edit bank berhasil</div>');
				redirect('setting-bank','refresh');
			}
			else
			{
				unlink('./media/img/bank/'.$data['v']['img']);

        $rec = array(
								'nama' => $this->input->post('nama'),
								'no_rek' => $this->input->post('no_rek'),
								'an' => $this->input->post('an'),
                'img' => $this->upload->data('file_name')
							);
				$this->bank->edit($rec, $id);

				$this->session->set_flashdata('notif', '<div class="alert alert-success"><i class="fa fa-check"></i> Edit produk berhasil</div>');
				redirect('setting-bank','refresh');
			}
		}

		$this->template->admin_display('backend/bank/edit_bank', $data);
	}

	public function delete()
	{
		$id = $this->input->post('id');

		$v = $this->bank->get(array('id' => $id));

		unlink('./media/img/bank/'.$v['img']);

		$this->bank->del($id);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */
