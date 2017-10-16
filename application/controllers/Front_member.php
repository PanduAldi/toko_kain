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
						$this->session->set_userdata('m_nama', $v['nama']);
						$this->session->set_userdata('m_email', $v['email']);
						$this->session->set_userdata('m_id_prov', $v['id_prov']);
						$this->session->set_userdata('m_provinsi', $v['provinsi']);
						$this->session->set_userdata('m_id_kab', $v['id_kab']);
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

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('beranda');
	}

}

/* End of file front_member.php */
/* Location: ./application/controllers/front_member.php */
