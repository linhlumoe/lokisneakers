<?php
class Report extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('order_model');
		$this->load->model('product_model');
	}
	
	function index() {
		$username = $this->session->userdata('login_admin');
		$this->load->model('admin_model');
		$admin = $this->admin_model->get_info_rule(array('username' => $username));
		$this->data['admin_name'] = $admin->admin_name;
		$this->data['temp'] = 'admin/report/index';
		$this->load->view('admin/main', $this->data);
	}
	
	function order() {
		
		$order_id = $this->uri->rsegment('3');
		$order_id = intval($order_id);
		
		$order = $this->order_model->get_info($order_id);
		if(!$order) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('order'));
		}
		
		$sql = "select orders_id, product.product_id as product_id, product_name, product_size, quantity, final_price
		from orders_detail join product on orders_detail.product_id = product.product_id
		where orders_id = $order_id";
		$detail = $this->product_model->query($sql);
		$this->data['order'] = $order;
		$this->data['detail'] = $detail;
		//pre($this->data);
		$this->load->view('admin/report/order', $this->data);
	}
	
	function inventory() {
		$sql = "select product_name, size, quantity from product join product_detail on product.product_id = product_detail.product_id 
where quantity > 0 order by quantity desc, product_name";
		$detail = $this->product_model->query($sql);
		
		$sql_sum = "select sum(quantity) as sum from product_detail where quantity > 0";
		$sum = $this->product_model->query($sql_sum);
		$this->data['sum'] = $sum[0]->sum;
		
		$this->data['detail'] = $detail;
		//pre($this->data);
		$this->load->view('admin/report/inventory_report', $this->data);
	}
	
	function outofstock() {
		$sql = "select product_name, size, quantity from product join product_detail on product.product_id = product_detail.product_id 
where quantity <= 0 order by quantity desc, product_name";
		$detail = $this->product_model->query($sql);
				
		$this->data['detail'] = $detail;
		//pre($this->data);
		$this->load->view('admin/report/outofstock_report', $this->data);
	}
	
	function revenue_month() {
		if($this->input->get()) {
			$month = $this->input->get('month');
			$year = $this->input->get('year');
			
			$sql = "select product_name, product_size, quantity, final_price, orders.date as date 
			from orders join orders_detail on orders_detail.orders_id = orders.orders_id, product
			where status_shipment = 1 and month(orders.date) = '$month' and year(orders.date) = '$year' and product.product_id = orders_detail.product_id
			order by date";
			
			$detail = $this->product_model->query($sql);
			$this->data['detail'] = $detail;

			$sql_sum = "select sum(cost) as sum from orders 
			where status_shipment = 1 and month(orders.date) = '$month' and year(orders.date) = '$year'";
			$sum = $this->product_model->query($sql_sum);
			$this->data['sum'] = $sum[0]->sum;
			$this->load->view('admin/report/revenue_month_report', $this->data);
		}
	}

	function revenue_day() {
		if($this->input->get()) {
			$day = $this->input->get('day');
			
			$sql = "select product_name, product_size, quantity, final_price, orders.date as date 
				from orders join orders_detail on orders_detail.orders_id = orders.orders_id, product
				where orders.status_shipment = 1 and date(orders.date) = '$day' and product.product_id = orders_detail.product_id
				order by date";
			
			$detail = $this->product_model->query($sql);
			$this->data['detail'] = $detail;

			$sql_sum = "select sum(cost) as sum from orders where orders.status_shipment = 1 and date(orders.date) = '$day'";
			$sum = $this->product_model->query($sql_sum);
			$this->data['sum'] = $sum[0]->sum;
			$this->load->view('admin/report/revenue_day_report', $this->data);
		}
	}
}