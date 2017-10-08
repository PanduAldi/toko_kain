<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_model extends CI_Model {

	var $table = "bank";
	var $id    = "id_bank";

	public function get($params=array())
	{
		if (isset($params['select']))
		{
			$this->db->select($params['select']);
		}

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

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */