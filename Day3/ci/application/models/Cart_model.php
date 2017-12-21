<?php
class Cart_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function get_where($where){
		$this->db->where($where);
		$query = $this->db->get("cart");
		return $query->result_array(); //return multiple result with indexed array
	}

	public function getOne($where) {
		$this->db->where($where);
		$query = $this->db->get("cart");
		return $query->row_array(); //return one result with associative array

	}

	public function insert($insert_array) {

		/*
		INSERT INTO cart (col1, col2, col3....) VALUES ('$val1','$val2','$val3',...)

		$insert_array = array(
			'col1' => $val1,
			'col2' => $val2,
			'col3' => $val3
		);
		*/

		$this->db->insert('cart', $insert_array);

	}

	public function update($where_array, $update_array) {

		/*
	UPDATE cart SET col1 = '$val1', col2 = '$val2', col3 = '$val3',.... WHERE colA = '$valA' 

		*/

		$this->db->where($where_array);
		$this->db->update("cart", $update_array);

	}




}
?>