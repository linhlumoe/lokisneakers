<?php
class Order extends MY_Controller {
	function __construct() {
		parent::__construct();
		//goi thu vien gio hang
		$this->load->library('cart');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('order_model');
	}
	
	//quan ly don hang o trang admin
	function index() {
		$type = $this->uri->rsegment('2');
		$type = intval($type);
		
		//lay thong tin don hang
		$input = array();
		$list = $this->order_model->get_list($input);
		$this->data['list'] = $list;
				
		if($type = 1) {
			$input['where'] = array('status_shipment' => 0);
			$list = $this->order_model->get_list($input);
		} elseif($type = 2) {
			$input['where'] = array('status_shipment' => 2);
			$list = $this->order_model->get_list($input);
		} else {
			redirect(admin_url('member'));
		}

		$total = $this->order_model->get_total();
		$this->data['total'] = $total;
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['temp'] = 'admin/order/index';
		//$this->data['tmp'] = 'admin/member/insert';
		
		$this->load->view('admin/main', $this->data);
	}
	
	function new_order() {
		//lay thong tin don hang
		$input = array();
		$input['where'] = array('status_shipment' => 0);
		$list = $this->order_model->get_list($input);
		$this->data['list'] = $list;

		$total = $this->order_model->get_total();
		$this->data['total'] = $total;
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['temp'] = 'admin/order/index';
		//$this->data['tmp'] = 'admin/member/insert';
		
		$this->load->view('admin/main', $this->data);
	}
	
	function cancel_order() {
		//lay thong tin don hang
		$input = array();
		$input['where'] = array('status_shipment' => 2);
		$list = $this->order_model->get_list($input);
		$this->data['list'] = $list;

		$total = $this->order_model->get_total();
		$this->data['total'] = $total;
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['temp'] = 'admin/order/index';
		//$this->data['tmp'] = 'admin/member/insert';
		
		$this->load->view('admin/main', $this->data);
	}
	
	//cap nhat don hang
	function edit() {
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		
		//lay thong tin tin tucc
		$info = $this->order_model->get_info($id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('order'));
		}
		
		$this->load->model('order_detail_model');
		$input = array();
		$input['where'] = array('orders_id' => $info->orders_id);
		$detail = $this->order_detail_model->get_list($input);
		$this->load->model('product_model');
		foreach($detail as $p) {
			$c = $this->product_model->get_info($p->product_id);
			$p->product_name = $c->product_name;
		}
		
		if($this->input->post()) {
			$this->form_validation->set_rules('txt_name', 'Tên khách hàng', 'min_length[3]|max_length[40]');
			$this->form_validation->set_rules('num_phone', 'Số điện thoại', 'min_length[10]|max_length[15]');
			$this->form_validation->set_rules('txt_address', 'Địa chỉ', 'min_length[5]|max_length[70]');		
		
			if($this->form_validation->run()) {
				$name = $this->input->post('txt_name');
				$phone = $this->input->post('num_phone');
				$email = $this->input->post('im_email');
				$address = $this->input->post('txt_address');
				$note = $this->input->post('txt_note');
				$stt_shipment = $this->input->post('slt_status');

				$data = array (
					'name' => $name,
					'phone' => $phone,
					'email' => $email,
					'address' => $address,
					'status_shipment' => $stt_shipment
				);
				
				if($stt_shipment == 1) {
					$data['status_payment'] = 1;
				}
						
				if($note != '') {
					$data['note'] = $note;
				}
				
				if(isset($member_id)) {
					$data['member_id'] = $member_id;
				}
				
				if($this->order_model->update($id, $data)) {
					if($stt_shipment == 1) {
						$this->load->model('product_detail_model');
						foreach($detail as $row) {
							$qty = $row->quantity;
							$pd_id = $row->product_id;
							$pd_size = $row->product_size;
							$sql = "update product_detail set quantity = (quantity - '$qty') where product_id = '$pd_id' and size = '$pd_size'";
							$this->db->query($sql);
						}
					}
					$this->session->set_flashdata('message', 'Cập nhật đơn hàng thành công!');
				} else {
					$this->session->set_flashdata('message', 'Cập nhật đơn hàng thất bại!');
				}

			} 
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['detail'] = $detail;
		$info = $this->order_model->get_info($id);
		$this->data['order'] = $info;
		$this->data['temp'] = 'admin/order/detail';
		$this->load->view('admin/main', $this->data);
	}
	
	//huy don hang
	function cancel() {
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		
		//lay thong tin don hang
		$info = $this->order_model->get_info($id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('order'));
		}

		$data = array (
			'status_payment' => 2,
			'status_shipment' => 2,
		);
		
		if($this->order_model->update($id, $data)) {
			$this->session->set_flashdata('message', 'Huỷ đơn hàng thành công!');
		} else {
			$this->session->set_flashdata('message', 'Huỷ đơn hàng thất bại!');
		}
		redirect(admin_url('order/cancel_order'));
	}
}
