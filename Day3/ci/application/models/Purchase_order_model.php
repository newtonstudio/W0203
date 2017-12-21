<?php
class Purchase_order_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function get_where($where){
		$this->db->where($where);
		$query = $this->db->get("purchase_order");
		return $query->result_array(); //return multiple result with indexed array
	}

	public function getOne($where) {
		$this->db->where($where);
		$query = $this->db->get("purchase_order");
		return $query->row_array(); //return one result with associative array

	}

	public function insert($insert_array) {
		$this->db->insert('purchase_order', $insert_array);
		return $this->db->insert_id();
	}

	public function update($where_array, $update_array) {
		$this->db->where($where_array);
		$this->db->update("purchase_order", $update_array);

	}

}
?>