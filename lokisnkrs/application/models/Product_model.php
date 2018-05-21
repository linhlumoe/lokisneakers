<?php
class Product_model extends MY_Model {
	var $table = 'product';
	var $key = 'product_id';
	
	function get_list_($start, $num) {
		$sql = "select * from product join catalog on product.catalog_id = catalog.catalog_id order by product_id desc limit $start, $num";
		$result = $this->db->query($sql);
		return $result->result();
	}
}