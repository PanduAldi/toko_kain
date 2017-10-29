<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('member_model');
		$this->load->library(array('cart', 'form_validation'));
	}

	public function index()
	{
		if ($this->session->userdata('m_login') == true)
		{
			redirect('profil-anda');
		}
		else {
			$data['title'] = "Member Area";

			$this->template->display('frontend/member/member_area', $data);
		}
	}

	public function register()
	{
			if (isset($_POST['register']))
			{
					$prov = explode('|', $this->input->post('provinsi'));
					$kota = explode('|', $this->input->post('kota'));

					$rec = array(
								'id_pelanggan' => '',
								'nama' => $this->input->post('nama'),
								'jk' => $this->input->post('jk'),
								'email' => $this->input->post('email'),
								'password' => sha1($this->input->post('password')),
								'alamat' => $this->input->post('alamat'),
								'id_prov' => $prov[0],
								'provinsi' => $prov[1],
								'id_kab' => $kota[0],
								'kabupaten' => $kota[1],
								'telp' => $this->input->post('telp'),
								'create_date' => date('Y-m-d H:i:s')
					);

					$this->member_model->add($rec);
					$this->session->set_flashdata('notif_register', '<div class="alert alert-success"> <i class="fa fa-info"></i> Registrasi Anda berhasil. Silahkan login menggunakan email dan password yang telah anda daftarkan</div>');

					redirect('member-area');
			}
	}

	public function do_login()
	{
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			if ($this->form_validation->run() == true)
			{
					$email = $this->input->post('email');
					$password = sha1($this->input->post('password'));

					$cek = $this->member_model->login($email, $password);

					if ($cek->num_rows() > 0)
					{
						$v = $cek->row_array();

						$this->session->set_userdata('m_login', true);
						$this->session->set_userdata('m_id', $v['id_pelanggan']);
						$this->session->set_userdata('m_nama', $v['nama']);
						$this->session->set_userdata('m_email', $v['email']);
						$this->session->set_userdata('m_id_prov', $v['id_prov']);
						$this->session->set_userdata('m_provinsi', $v['provinsi']);
						$this->session->set_userdata('m_id_kab', $v['id_kab']);
						$this->session->set_userdata('m_jk', $v['jk']);
						$this->session->set_userdata('m_kabupaten', $v['kabupaten']);
						$this->session->set_userdata('m_telp', $v['telp']);
						$this->session->set_userdata('m_alamat', $v['alamat']);

						echo '<script>alert("Login Berhasil")</script>';
						redirect('profil-anda');
					}
					else {
						$this->session->set_flashdata('notif_login', '<div class="alert alert-danger"> Username atau Password Salah </div>');
						redirect('member-area');
					}
			}
			else {
				redirect('member-area');
				//echo validation_errors();
			}
	}

	public function profil()
	{
		if ($this->session->userdata('m_login') == false) {
			redirect('member-area');
		}
		$data['title'] = "Profil Anda";

		$this->template->display('frontend/member/profil', $data);
	}

	public function cari_kota()
	{
		$id = $this->input->post('id');

		$kota = file_get_contents(site_url('ambil-kota/'.$id));

		$json = json_decode($kota, true);

		echo '<option value=""> ==>Pilih Kota / Kabupaten <==  </option>';
		foreach ($json['rajaongkir']['results'] as $v) {
			echo '<option value="'.$v['city_id'].'|'.$v['city_name'].'">'.$v['city_name'].'</option>';
		}
	}

	public function edit_profil()
	{
		if ($this->session->userdata('m_login') == false) {
			redirect('member-area');
		}
			$data['title'] = "Edit Profil Anda";
			$data['v'] = $this->member_model->get(array('id' => $this->session->userdata('m_id')));

			$this->template->display('frontend/member/edit_profil', $data);

			if (isset($_POST['simpan']))
			{
					if ($this->input->post('password') == "")
					{
						$rec = array(
								'nama' => $this->input->post('nama'),
								'jk' => $this->input->post('jk'),
								'email' => $this->input->post('email'),
								'telp' => $this->input->post('telp')
						);
					}
					else {
						$rec = array(
								'nama' => $this->input->post('nama'),
								'jk' => $this->input->post('jk'),
								'email' => $this->input->post('email'),
								'password' => sha1($this->input->post('password')),
								'telp' => $this->input->post('telp')
						);
					}

					$this->member_model->edit($rec, $this->session->userdata('m_id'));
					$this->session->set_flashdata('notif', '<div class="alert alert-success">Edit Profil berhasil</div>');
					redirect('edit-profil','refresh');
			}
	}

	public function edit_alamat()
	{
		if ($this->session->userdata('m_login') == false) {
			redirect('member-area');
		}

		$data['title'] = "Edit Alamat";
		$data['d'] = $this->member_model->get(array('id' => $this->session->userdata('m_id')));

		$this->template->display('frontend/member/edit_alamat', $data);

		if (isset($_POST['simpan'])) 
		{
			$provinsi = explode('|', $this->input->post('provinsi'));
			$kabupaten = explode("|", $this->input->post('kota'));

			$rec = array(
							"alamat" => $this->input->post('alamat'),
							"id_prov" => $provinsi[0],
							"provinsi" => $provinsi[1],
							"id_kab" => $kabupaten[0],
							"kabupaten" => $kabupaten[1]
						);

			$this->member_model->edit($rec, $this->session->userdata('m_id'));
			$this->session->set_flashdata('notif', '<div class="alert alert-success">Edit Alamat Berhasil..!!</div>');
			redirect('edit-alamat','refresh');
		}


	}


	public function pemesanan_anda()
	{

		$data['title'] = "Pemesanan Anda";
		$data['pemesanan'] = $this->db->get_where('transaksi', array('id_pelanggan' => $this->session->userdata('m_id')))->result_array();

		$this->template->display('frontend/pemesanan_anda', $data);
		
	}

	public function lihat_pemesanan($id)
	{
		$data['title'] = 'Lihat Pemesanan Anda';

		$cari_pemesanan = $this->db->get_where('transaksi', array('id_transaksi' => $id))->row_array();
		//join pemesanan
		$this->db->join('produk', 'produk.id_produk = detail_transaksi.id_produk');
		$this->db->where('no_invoice', $cari_pemesanan['no_invoice']);

		$data['lihat'] = $this->db->get('detail_transaksi')->result_array();

		$data['inv'] = $cari_pemesanan['no_invoice'];

		$this->template->display('frontend/lihat_pemesanan', $data);

	}

	public function form_pembayaran($id)
	{
		$data['title'] = "Konfirmasi Pembayaran";
		$data['bank'] = $this->db->get('bank')->result_array();

		if (isset($_POST['simpan'])) 
		{
			$rec = array(
							'id_pembayaran' => '',
							'id_pelanggan' => $this->session->userdata('m_id'),
							'id_transaksi' => $id,
							'id_bank' => $this->input->post('id_bank'),
							'bank' => $this->input->post('bank'),
							'no_rek' => $this->input->post('no_rek'),
							'an' => $this->input->post('an'),
							'tgl_pembayaran' => date('Y-m-d H:i:s'),
							'status' => 'pending'
						);


			$this->db->insert('pembayaran', $rec);
			$this->session->set_flashdata('notif_pembayaran', '<div class="alert alert-success">Pembayaran anda telah dikirim</div>');
			redirect('pembayaran-anda');

		}

		$this->template->display('frontend/form_pembayaran', $data);
	}

	public function pembayaran_anda()
	{
		$data['title'] = "Pembayaran Anda ";
		$this->db->join('transaksi', 'transaksi.id_transaksi = pembayaran.id_transaksi');
		$data['pembayaran'] = $this->db->get_where('pembayaran', array('pembayaran.id_pelanggan' => $this->session->userdata('m_id')))->result_array();

		$this->template->display('frontend/pembayaran_anda', $data);

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('beranda');
	}

}

/* End of file front_member.php */
/* Location: ./application/controllers/front_member.php */
