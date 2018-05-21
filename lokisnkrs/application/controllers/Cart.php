<?php
class Cart extends MY_Controller {
	function __construct() {
		parent::__construct();
		//goi thu vien gio hang
		$this->load->library('cart');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	function check_quantity() {
//		$product_name = $this->input->post('txt_product_name');
//		$where = array('product_name' => $product_name);
//		if($this->product_model->check_exists($where)) {
//			$this->form_validation->set_message(__FUNCTION__, '* Tên sản phẩm đã tồn tại');
//			return false;
//		}
		return true;
	}
	
	function add() {
		$this->load->model('product_model');
		$product_id = $this->uri->rsegment('3');
		$product = $this->product_model->get_info($product_id);
		if(!$product) {
			redirect();
		}
		
		if($this->input->post()) {
			$this->form_validation->set_rules('num_quantity', 'Số lượng', 'callback_check_quantity');
			
			if($this->form_validation->run()) {
				$size = $this->input->post('slt_size');
				$quantity = $this->input->post('num_quantity');
				
				$this->load->model('product_detail_model');
				$where = array('size' => $size, 'product_id' => $product_id);
				$detail = $this->product_detail_model->get_info_rule($where);
				$data = array ();
				$data['id'] = $product_id;
				$data['name'] = $product->product_name;
				$data['qty'] = $quantity;
				$data['price'] = $product->final_price;
				$data['image'] = $product->image;
				$data['size'] = $detail->size;
				
				$this->cart->insert($data);
				$this->session->set_flashdata('message', 'Thêm sản phẩm vào giỏ hàng thành công!');
				redirect(base_url('cart'));
			}
		} else {
			$this->session->set_flashdata('message', 'Số lượng sản phẩm trong đơn hàng quá lớn!');
			redirect();
		}
	}
	
	private function _check_rowid ($rowid) {
		$cart = $this->cart->contents();
		foreach ($cart as $key => $row) {
			if($rowid === $key) {
				return true;
			}
		}
		return false;
	}
		
	function update() {
		$rowid = $this->uri->rsegment('3');		
		if($this->_check_rowid($rowid) == false) {
			redirect(base_url('cart'));
		}
		
		if($this->input->post()) {
			$this->form_validation->set_rules('num_quantity', 'Số lượng', 'callback_check_quantity');
			
			if($this->form_validation->run()) {
				$quantity = $this->input->post('current_qty');
				
				$data['qty'] = $quantity;
				$data['rowid'] = $rowid;
				
				$this->cart->update($data);
				$this->session->set_flashdata('message', 'Cập nhật giỏ hàng thành công!');
			}
		} else {
			$this->session->set_flashdata('message', 'Số lượng sản phẩm trong đơn hàng quá lớn!');
		}
		redirect(base_url('cart'));
	}
	
	function delete() {
		$rowid = $this->uri->rsegment('3');
		$rowid = $this->uri->rsegment('3');		
		if($this->_check_rowid($rowid) == false) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu');
			redirect(base_url('cart'));
		}
		
		$data['qty'] = 0;
		$data['rowid'] = $rowid;
		
		$this->cart->update($data);
		$this->session->set_flashdata('message', 'Xoá sản phẩm khỏi giỏ hàng thành công!');
		
		redirect(base_url('cart'));
	}
	
	//hien thi danh sach san pham trong gio hang
	function index() {
		//thong tin gio hang
		$cart = $this->cart->contents();
		$this->data['cart'] = $cart;
		$this->data['temp'] = 'site/cart/index';
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->load->view('site/layout', $this->data);
	}
}