<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('produk_model', 'p_m');
		$this->load->library(array('form_validation', 'upload'));

		if ($this->session->userdata('u_login') == false) 
		{
			redirect('login-admin','refresh');
		}

	}

	public function index()
	{
		$data['title'] = 'Produk';

		$select = "id_produk, kode_produk, produk.nama as nama_produk, img, harga, stok, terjual, kategori.nama as kategori";

		$data['view'] = $this->p_m->get(array("select" => $select));

		$this->template->admin_display('backend/produk/view_produk', $data);

	}

	public function add()
	{
		$this->load->model('kategori_model');

		$data['title'] = "Tambah Produk";
		$data['kategori'] = $this->kategori_model->get();

		$this->__rules();

		if ($this->form_validation->run() == true) 
		{
			$config['upload_path'] = './media/img/produk/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size']  = '8000';
			$config['max_width']  = '2024';
			$config['max_height']  = '1768';
			$config['remove_spaces'] = true;
			
			$this->upload->initialize($config);		
			if ( ! $this->upload->do_upload('img'))
			{
				$this->session->set_flashdata('notif_img', $this->upload->display_errors());
			}
			else
			{
				$rec = array(
								'id_produk'	=> '',
								'kode_produk' => $this->input->post('kode'),
								'nama' => $this->input->post('nama'),
								'img' => $this->upload->data('file_name'),
								'deskripsi' => $this->input->post('stok'),
								'id_kategori' => $this->input->post('kategori'),
								'terjual' => 0,
								'stok' => $this->input->post('stok'),
								'harga' => $this->input->post('harga'),
								'create_date' => date('Y-m-d H:i:s'),
								'date_update' => date('Y-m-d H:i:s'),
								'user_create' => $this->session->userdata('u_username'),
								'user_update' => '-'
							);

				$this->p_m->add($rec);

				$this->session->set_flashdata('notif', '<div class="alert alert-success"><i class="fa fa-check"></i> Tambah produk berhasil</div>');
				redirect('setting-produk','refresh');
			}
		}

		$this->template->admin_display('backend/produk/add_produk', $data);
	}

	public function edit($id)
	{
		$this->load->model('kategori_model');

		$data['title'] = "Edit Produk";
		$select = "produk.*, kategori.nama as kategori";
		$data['v'] = $this->p_m->get(array('select' => $select,'id' => $id));

		$this->__rules();

		if ($this->form_validation->run() == true) 
		{
			$config['upload_path'] = './media/img/produk/';
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
								'deskripsi' => $this->input->post('deskripsi'),
								'stok' => $this->input->post('stok'),
								'harga' => $this->input->post('harga'),
								'date_update' => date('Y-m-d H:i:s'),
								'user_update' => $this->session->userdata('u_username')
							);

				$this->p_m->edit($rec, $id);

				$this->session->set_flashdata('notif', '<div class="alert alert-success"><i class="fa fa-check"></i> Edit produk berhasil</div>');
				redirect('setting-produk','refresh');				
			}
			else
			{
				unlink('./media/img/produk/'.$data['v']['img']);

				$rec = array(
								'nama' => $this->input->post('nama'),
								'img' => $this->upload->data('file_name'),
								'deskripsi' => $this->input->post('deskripsi'),
								'stok' => $this->input->post('stok'),
								'harga' => $this->input->post('harga'),
								'date_update' => date('Y-m-d H:i:s'),
								'user_update' => $this->session->userdata('u_username')
							);

				$this->p_m->edit($rec, $id);

				$this->session->set_flashdata('notif', '<div class="alert alert-success"><i class="fa fa-check"></i> Edit produk berhasil</div>');
				redirect('setting-produk','refresh');	
			}
		}

		$this->template->admin_display('backend/produk/edit_produk', $data);
	}

	public function delete()
	{
		$id = $this->input->post('id');
 
		$d = $this->p_m->get(array('id' => $id));

		unlink('./media/img/produk/'.$d['img']);

		$this->p_m->del($id);
	}

	public function __rules()
	{

		$this->form_validation->set_rules('kode', 'kode', 'required|trim|xss_clean');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|xss_clean');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim|xss_clean');
		$this->form_validation->set_rules('stok', 'stok', 'required|trim|xss_clean');
		$this->form_validation->set_rules('kategori', 'kategori', 'required|trim|xss_clean');
		$this->form_validation->set_rules('harga', 'harga', 'required|trim|xss_clean');
		

	}

	public function ambil_kode()
	{
		$id = $this->input->post('id');

		$this->load->model('kategori_model');

		$get = $this->kategori_model->get(array('id' => $id));

		$data['kode'] = $this->p_m->auto_number(3, $get['kode'], $id);

		echo json_encode($data);
	}
}

/* End of file  */
/* Location: ./application/controllers/ */