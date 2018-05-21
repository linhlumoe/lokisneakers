<?php
class Product_detail extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('product_detail_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	//lay danh sach chi tiet san pham
	function index() {
		
		$this->load->model('product_model');
		$product_id = $this->uri->rsegment('3');
		$product_id  = intval($product_id);
		$where = array('product_id' => $product_id);
		
		//kiem tra san pham co ton tai khong
		$info_pd = $this->product_model->get_info($product_id);
		if(!$info_pd) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('product'));
		}

		$list = $this->product_detail_model->get_list_($product_id);
		$this->data['list'] = $list;
		
		$input['where'] = array('product_id' => $product_id);
		$total = $this->product_detail_model->get_total($input);
		$this->data['total'] = $total;
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['product_id'] = $product_id;
		
		$this->data['temp'] = 'admin/product_detail/index';
		$this->data['tmp'] = 'admin/product_detail/insert';
		$this->load->view('admin/main', $this->data);
	}
	
	//kiem tra username da ton tai chua
	function check_size() {
		$product_id = $this->uri->rsegment('3');
		$product_id  = intval($product_id);
		$size = $this->input->post('num_size');
		$where = array('size' => $size, 'product_id' => $product_id);
		if($this->product_detail_model->check_exists($where)) {
			$this->form_validation->set_message(__FUNCTION__, '* Size vừa nhập đã tồn tại');
			return false;
		}
		return true;
	}
	
	function check_size_upd() {
		$size = $this->input->post('num_size');
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		
		$query = $this->product_detail_model->get_info($id);
		$product_id = $query->product_id;
		 
		$sql = "select * from product_detail where size = '$size' and product_id = '$product_id' and pd_detail_id != $id";
		$result = $this->db->query($sql);
		if($result->num_rows() > 0 ) {
			$this->form_validation->set_message(__FUNCTION__, '* Size vừa nhập đã tồn tại');
			return false;
		}
		return true;
	}
	
	//them chi tiet san pham
	function insert() {
		$this->load->model('product_model');
		$product_id = $this->uri->rsegment('3');
		$product_id  = intval($product_id);
		
		//kiem tra san pham co ton tai khong
		$info_pd = $this->product_model->get_info($product_id);
		if(!$info_pd) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			echo $product_id;
			redirect(admin_url('product'));
		}
		
		if($this->input->post()) {
			$this->form_validation->set_rules('num_quantity', 'Số lượng', 'greater_than_equal_to[0]|max_length[10]');
			$this->form_validation->set_rules('num_size', 'Size', 'greater_than[0]|less_than_equal_to[50]|callback_check_size');

			if($this->form_validation->run()) {
				$size = $this->input->post('num_size');
				$quantity = $this->input->post('num_quantity');
	
				$data = array (
					'product_id' => $product_id,
					'size' => $size,
					'quantity' => $quantity
				);
				if($this->product_detail_model->create($data)) {
					$this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
				} else {
					$this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
				}
				
				redirect(admin_url('product_detail/index/'.$product_id));
			} else {
				$this->index();
			}
		}
	}
	
	//sua chi tiet san pham
	function edit() {
		$pd_detail_id = $this->uri->rsegment('3');
		$pd_detail_id  = intval($pd_detail_id);
		
		//kiem tra chi tiet san pham co ton tai khong
		$info = $this->product_detail_model->get_info($pd_detail_id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('product_detail/index/'.$product_id));
		}
		
		//lay danh sach chi tiet san pham
		$input['where'] = array('product_id' => $info->product_id);
		$total = $this->product_detail_model->get_total($input);
		$list = $this->product_detail_model->get_list_($info->product_id);
		$message = $this->session->flashdata('message');
		
		$data = array (
			'pd_detail_id' => $info->pd_detail_id,
			'product_id' => $info->product_id,
			'size' => $info->size,
			'quantity' => $info->quantity,
			'total' => $total,
			'list' => $list,
			'message' => $message
		);
				
		if($this->input->post()) {
			$this->form_validation->set_rules('num_quantity', 'Số lượng', 'greater_than_equal_to[0]|max_length[10]');
			$this->form_validation->set_rules('num_size', 'Size', 'greater_than_equal_to[0]|less_than_equal_to[50]|callback_check_size_upd');
		
			if($this->form_validation->run()) {
				$size = $this->input->post('num_size');
				$quantity = $this->input->post('num_quantity');
	
				$data = array (
					'product_id' => $info->product_id,
					'size' => $size,
					'quantity' => $quantity
				);
				
				if($this->product_detail_model->update($pd_detail_id, $data)) {
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công!');
				} else {
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
				}
						
				redirect(admin_url('product_detail/index/'.$info->product_id));
			}
		}
		
		$data['temp'] = 'admin/product_detail/index';
		$data['tmp'] = 'admin/product_detail/edit';
		$this->load->view('admin/main', $data);
	}
	
	//xoa admin
	function delete() {
		
		$pd_detail_id = $this->uri->rsegment('3');
		$pd_detail_id  = intval($pd_detail_id);
		
		//kiem tra chi tiet san pham co ton tai khong
		$info = $this->product_detail_model->get_info($pd_detail_id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('product'));
		}
		
		//thuc hien xoa
		if($this->product_detail_model->delete($pd_detail_id)) {
			$this->session->set_flashdata('message', 'Xoá dữ liệu thành công!');
		} else {
			$this->session->set_flashdata('message', 'Xoá dữ liệu thành công!');
		}
		
		redirect(admin_url('product_detail/index/'.$info->product_id));
	}
}