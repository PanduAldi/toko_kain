<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('transaksi_model'));

		if ($this->session->userdata('u_login') == false) 
		{
			redirect('login-admin','refresh');	
		}

	}

	public function index()
	{
		
	}

	public function setting_pemesanan()
	{
		$data['title'] = "Setting Pemesanan";
		
		$this->db->order_by('id_transaksi', 'desc');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan');
		$data['pemesanan'] = $this->db->get('transaksi')->result_array();

		$this->template->admin_display('backend/transaksi/setting_pemesanan', $data);

	}

	public function setting_pembayaran()
	{
		$data['title'] = "Pembayaran";
		
		$this->db->order_by('tgl_pembayaran', 'desc');
		$this->db->join('transaksi', 'transaksi.id_transaksi = pembayaran.id_transaksi');
		$data['pembayaran'] = $this->db->get('pembayaran')->result_array();

		$this->template->admin_display('backend/transaksi/setting_pembayaran', $data);
	}

	public function verifikasi_pembayaran($id)
	{
		$data['title'] = "Verifikasi Pembayaran";

		$q = $this->db->get_where('pembayaran', array('id_pembayaran' => $id))->row_array();

		$data['trans'] = $this->transaksi_model->get(array('id' => $q['id_transaksi']));
		$data['pemb'] = $q;

		$this->template->admin_display('backend/transaksi/verifikasi_pembayaran', $data);

		if (isset($_POST['verif'])) 
		{
			//update pembayaran
			$this->transaksi_model->edit_pembayaran(array('status' => 'pembayaran diverifikasi'), $id);
			$this->transaksi_model->edit(array('status' => 'pembayaran diterima'), $q['id_transaksi']);

			//update terjual
			$this->load->model('produk_model');

			$det = $this->db->get_where('detail_transaksi', array('no_invoice' => $data['trans']['no_invoice']))->result_array();

			foreach ($det as $d) 
			{
				$prod = $this->produk_model->get(array('id' => $d['id_produk']));
				$this->produk_model->edit(array('terjual' => $d['jumlah']+$prod['terjual']), $d['id_produk']);
			}

			$this->session->set_flashdata('notif', '<div class="alert alert-success">Verifikasi Pembayaran '.$data['trans']['no_invoice'].' berhasil.</div>');
			redirect('setting-pemesanan','refresh');
		}

	}

	public function cek_pembayaran()
	{
		$t = $this->input->post('t');
		$p = $this->input->post('p');

		$cek = $this->db->get_where('pembayaran', array('id_transaksi' => $t, 'id_pelanggan' => $p))->row_array();

		if(empty($cek))
		{
			echo '<h3 align="center">Tidak ada pembayaran untuk Transaksi ini</h3>';
		}
		else
		{
			if ($cek['status'] == 'pending') 
			{
				echo '<h4 align="center">Pembayaran belum di verifikasi. <br> <a href="'.site_url('verifikasi-pembayaran/'.$cek['id_pembayaran']).'" class="btn btn-success">Verifikasi Pembayaran</a></h4>';
			}
			else
			{
				echo '<h3 align="center">Pembayaran sudah diverifikasi</h3>';
			}
		}
	}


	public function konfirmasi_pengiriman()
	{
		$id = $this->input->post('id');
		$resi = $this->input->post('resi');

		$rec = array('resi' => $resi, 'status' => 'dalam pengiriman');
		$this->transaksi_model->edit($rec, $id);
	}

	public function konfirmasi_selesai()
	{
		$id = $this->input->post('id');

		$rec = array('status' => 'selesai');
		$this->transaksi_model->edit($rec, $id);
	}

	public function lihat_detail($id)
	{
		$data['title'] = 'Detail Pemesanan';

		$cari_pemesanan = $this->db->get_where('transaksi', array('id_transaksi' => $id))->row_array();
		//join pemesanan
		$this->db->join('produk', 'produk.id_produk = detail_transaksi.id_produk');
		$this->db->where('no_invoice', $cari_pemesanan['no_invoice']);

		$data['lihat'] = $this->db->get('detail_transaksi')->result_array();

		$data['inv'] = $cari_pemesanan['no_invoice'];

		$this->template->display('backend/transaksi/lihat_pemesanan', $data);

	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$cek = $this->transaksi_model->get(array('id' => $id));

		//hapus detalil pembayaran
		$cek_detail = $this->db->get_where('detail_transaksi', array('no_invoice' => $cek['no_invoice']))->result_array();

		foreach ($cek_detail as $d) {
			$this->db->where('id_detail_transaksi', $d['id_detail_transaksi']);
			$this->db->delete('detail_transaksi');
		}

		//hapus transkasi
		$this->transaksi_model->del($id);
	}
}

/* End of file  */
/* Location: ./application/controllers/ */