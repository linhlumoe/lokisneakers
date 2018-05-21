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
	
	//thong tin don hang o trang khach hang
	function info() {
		$member_id = $this->session->userdata('login_member');
		$input = array();
		$input['where'] = array('member_id' => $member_id);
		$list = $this->order_model->get_list($input);
		$this->load->model('order_detail_model');
		$this->load->model('product_model');
		foreach($list as $row) {
			$input['where'] = array('orders_id' => $row->orders_id);
			$subs = $this->order_detail_model->get_list($input);
			foreach($subs as $dt) {
				$product = $this->product_model->get_info($dt->product_id);
				$dt->product_name = $product->product_name;
				$dt->image = $product->image;
			}
			$row->subs = $subs;
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['list'] = $list;
		$this->data['temp'] = 'site/order/info';
		$this->load->view('site/layout', $this->data);
	}
	
	
	//huy don hang
	function cancel() {
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$info = $this->order_model->get_info($id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(base_url('order/info'));
		} else {
			$data = array (
				'status_payment' => 2,
				'status_shipment' => 2,
				'status' => 2
			);
			
			$this->order_model->update($id, $data);
			$this->session->set_flashdata('message', 'Huỷ đơn hàng thành công!');
			redirect(base_url('order/info'));
		}
	}

	//THANH TOAN GIO HANG
	function checkout() {
		//thong tin gio hang
		$cart = $this->cart->contents();
		if(empty($cart)) {
			$this->session->set_flashdata('message', 'Không có sản phẩm nào trong giỏ hàng!');
			redirect(base_url());
		}
		$total_cost = 0;
		foreach($cart as $row) {
			$total_cost += $row['subtotal']; 
		}
		
		//kiem tra thong tin dang nhap
		$member_id = $this->session->userdata('login_member');
		$member = '';
		if(isset($member_id)) {
			$this->load->model('member_model');
			$member = $this->member_model->get_info($member_id);
		}
		
		$this->data['member'] = $member;
		
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
				$payment = $this->input->post('slt_payment');

				$data = array (
					'name' => $name,
					'phone' => $phone,
					'email' => $email,
					'address' => $address,
					'cost' => $total_cost,
					'payment' => $payment,
					'status_payment' => 0,
					'status_shipment' => 0
				);
				
				if($note != '') {
					$data['note'] = $note;
				}
				
				if(isset($member_id)) {
					$data['member_id'] = $member_id;
				}
				
				//them vao bang don hang
				
				if($this->order_model->create($data)) {
					$orders_id = $this->db->insert_id();//lay id cua don hang vua them vao 
					//them vao bang chi tiet don hang
					$this->load->model('order_detail_model');
					foreach ($cart as $row) {						
						$data = array(
							'orders_id' => $orders_id,
							'product_id' => $row['id'],
							'product_size' => $row['size'],
							'price' => $row['price'],
							'quantity' => $row['qty']
						);
						$this->order_detail_model->create($data);
					}
					
				}
				
				//xoa gio hang
				$this->cart->destroy();
				
				//neu thanh toan tien mat
				if($payment == 'tienmat') {
					$this->session->set_flashdata('message', 'Bạn đã đặt hàng thành công! LokiSneaker sẽ liên hệ bạn trong thời gian sớm nhất!');
					redirect(base_url());
				} elseif($payment == 'baokim') { //thanh toan truc tuyen
					//load thu vien thanh toan
					$this->load->library('payment/baokim_payment');
					//chuyen sang cong thanh toan
					$this->baokim_payment->payment($orders_id, $total_cost);
				}
			} 
		}
		
		$this->data['temp'] = 'site/order/checkout';
		$this->load->view('site/layout', $this->data);
	}
	
	//Nhan ket qua tra ve tu cong thanh toan
	function result() {
		//load thu vien thanh toan
		$this->load->library('payment/Baokim_payment');
		$this->load->model('order_model');
		
		//id cua don hang
		$order_id = $this->input->post($order_id);
		//lay thong tin cua don hang
		$order = $this->order_model->get_info($order_id);
		
		if(!$order) {
			redirect();
		}
		
		//goi ham kiem tra trang thai thanh toan ben bao kim
		$status = $this->baokim_payment->result($order_id, $order->cost);
		if($status == true) {
			//cap nhat lai trang thai don hang la da thanh toan
			$data = array();
			$data['status_payment'] = 1;
			$this->order_model->update($order_id, $data);
		} elseif ($status == false) {
			//cap nhat trang thai don hang la khong thanh toan
			$data = array();
			$data['status_payment'] = 2;
			$this->order_model->update($order_id, $data);
		}
	}
}
















