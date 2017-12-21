<?php
class Product_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}


	public function record_count(){
		$this->db->select("COUNT(*) as total");
		$query = $this->db->get("products");
		$row = $query->row_array();
		return $row['total'];
	}

	public function fetch($start, $limit){

		//SELECT * FROM products LIMIT $start, $limit;

		$this->db->limit($limit, $start);
		$query = $this->db->get("products");
		return $query->result_array();
	}

	public function get_where($where){


		//SELECT * FROM products
		// $sql = mysqli_query($link, "SELECT * FROM products");
		// if( mysqli_num_rows($sql) > 0) {
		//     while($row = mysqli_fetch_array($sql)) {
		// 	   } 
		// }

		$this->db->where($where);
		$query = $this->db->get("products");
		return $query->result_array(); //return multiple result with indexed array
	}

	public function getOne($where) {

		$this->db->where($where);
		$query = $this->db->get("products");
		return $query->row_array(); //return one result with associative array

	}


}
?>