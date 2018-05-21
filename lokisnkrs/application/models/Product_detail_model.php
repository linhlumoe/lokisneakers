<?php
class Product_detail_model extends MY_Model {
	var $table = 'product_detail';
	var $key = 'pd_detail_id';
	
	function get_list_($where) {
		$sql = "select * 
		from product join product_detail on product.product_id = product_detail.product_id 
		where product_detail.product_id = $where order by size";
		$result = $this->db->query($sql);
		return $result->result();
	}
}