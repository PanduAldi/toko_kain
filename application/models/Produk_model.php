<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	var $table = "produk";
	var $id    = "id_produk";

	public function get($params=array())
	{
		if (isset($params['select'])) 
		{
			$this->db->select($params['select']);
		}

		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');


		if(isset($params['id'])) {
			$this->db->where($this->id, $params['id']);
		}

		if (isset($params['id'])) 
		{
			return $this->db->get($this->table)->row_array();
		}
		else
		{
			return $this->db->get($this->table)->result_array();
		}
	}

	public function add($record)
	{
		$this->db->insert($this->table, $record);
	}

	public function edit($record, $id)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $record);
	}

	public function del($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

	public function auto_number($lebar=0, $awalan=null, $id_kategori)
	{
		$this->db->select('kode_produk')
				 ->from($this->table)
				 ->limit(1)
				 ->where('id_kategori', $id_kategori)
				 ->order_by('id_produk', 'desc');
		$query = $this->db->get();

		$row = $query->row_array();
		$cek = $query->num_rows();
		
		if ($cek == 0) 
		{
			$nomor = 1;
		}
		else
		{
			
			$nomor = intval(substr($row['kode_produk'], strlen($awalan)))+1;	
			
		}

		if ($lebar > 0)
		{
			$result = $awalan.str_pad($nomor, $lebar, "0", STR_PAD_LEFT);
		}
		else
		{
			$result = $awalan.$nomor;
		}

		return $result;
	}

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */