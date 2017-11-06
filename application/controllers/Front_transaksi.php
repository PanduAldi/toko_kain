<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front_transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('transaksi_model','member_model'));
		$this->load->library('cart');

	}

	public function konfirmasi_order()
	{
		if ($this->session->userdata('m_login') == false) {
			redirect('beranda','refresh');
		}

		if (!$this->cart->contents()) 
		{
			$data['title'] = "Tidak Ada Barang";
			$this->template->display('transaksi_notif', $data);
		}
		else
		{
			$data['title'] = "Konfirmasi Order";
			$data['belanja'] = $this->cart->contents();
			$data['u'] = $this->member_model->get(array('id' => $this->session->userdata('m_id')));
			$data['inv'] = $this->transaksi_model->auto_number(4, 'INV/'.date('dmY')."/");

			$this->template->display('frontend/konfirmasi_order', $data);
		}

	}

	public function order_sukses()
	{
		if ($this->session->userdata('m_login') == false) {
			redirect('beranda','refresh');
		}
		else
		{
	  		// insert transaksi

	  		if (!$this->cart->contents()) 
	  		{	
	  			$data['title'] = "Tidak Ada Barang";
	  			$this->template->display('transaksi_notif', $data);
	  		}
	  		else
	  		{

				$data['title'] = "Order Success";

				$cek_kab = $this->db->get_where('pelanggan', array('id_pelanggan' => $this->session->userdata('m_id')))->row_array();
			
				$ongkir = file_get_contents(site_url('cek-ongkir/'.$cek_kab['id_kab']));

		  		$j = json_decode($ongkir, true);
		  		$cek = $j['rajaongkir']['results'][0]['costs'][1];
		  		
		  		$ong = $cek['cost'][0]['value'];	
	  			// $inv = $this->transaksi_model->auto_number(4, 'INV/'.date('dmY')."/");
		  		$inv  = $this->input->post('inv');


		  		$data['invoice'] = $inv;



	  			//insert transaksi
	  			$rec_trans = array(
	  								"id_transaksi" => '',
	  								"no_invoice" => $inv,
	  								"id_pelanggan" => $this->session->userdata('m_id'),
	  								"tgl_transaksi" => date('Y-m-d H:i:s'),
	  								"total_harga" => $this->cart->total(),
	  								"status" => 'pending',
	  								"ongkir" => $ong
	  							   );

	  			$this->transaksi_model->add($rec_trans);

	  			//insert detail transaksi
	  			foreach ($this->cart->contents() as $item) {
	  				$rec_item = array(
	  									"id_detail_transaksi" => '',
	  									"no_invoice" => $inv,
	  									"id_produk" => $item['options']['id_produk'],
	  									"jumlah" => $item['qty'],
	  									"subtotal" => $item['subtotal']
	  								);

	  				$this->db->insert('detail_transaksi', $rec_item);

	  				$rec_del = array(
	  									"rowid" => $item['rowid'],
	  									"qty" => 0
	  								);
	  				$this->cart->update($rec_del);
	  			}

	  			$data['trans'] = $this->db->get_where('transaksi', array('no_invoice' => $inv))->row_array();

	  			$this->template->display('frontend/order_sukses', $data);

	  		}
		}
  	}	

}

/* End of file  */
/* Location: ./application/controllers/ */