<?php
class Product extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('product_model');
	}
	
	function all_product() {
		//lay tat ca san pham
		$input = array();
		$total = $this->product_model->get_total($input);
		
		$this->load->library('pagination');
		$config = array();
		$config['total_rows'] = $total;
		$config['base_url'] = base_url('product/all_product/');
		$config['per_page'] = 16; //so luong san pham tren moi trang
		$config['uri_segment'] = 3; //phan doan hien thi trang thu may
		$config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>'; 
        $config['num_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
		//khoi tao cau hinh phan trang
		$this->pagination->initialize($config);
		
		$segment = $this->uri->segment('3');
		$segment = intval($segment);
		
		$input['limit'] = array($config['per_page'], $segment);
		$all_product = $this->product_model->get_list($input);
		$this->data['all_product'] = $all_product;
		$this->data['temp'] = 'site/product/all_product';
		$this->load->view('site/layout', $this->data);
	}
	
	function new_arrival() {
		//lay san pham moi ve
		$query_total = "SELECT count(*) as total FROM product WHERE datediff(CURRENT_DATE(), date) <= 7 order by date desc";
		$rs = $this->product_model->query($query_total);
		$this->load->library('pagination');
		$config = array();
		$config['total_rows'] = $rs[0]->total;
		$config['base_url'] = base_url('product/new_arrival/');
		$config['per_page'] = 16; //so luong san pham tren moi trang
		$config['uri_segment'] = 3; //phan doan hien thi trang thu may
		$config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>'; 
        $config['num_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
		//khoi tao cau hinh phan trang
		$this->pagination->initialize($config);
		
		$segment = $this->uri->segment('3');
		$segment = intval($segment);
		$query = "SELECT * FROM product WHERE datediff(CURRENT_DATE(), date) <= 7 order by date desc limit $segment, 16";
		$new_arrival = $this->product_model->query($query);
		$this->data['new_arrival'] = $new_arrival;
		$this->data['temp'] = 'site/product/new_arrival';
		$this->load->view('site/layout', $this->data);
	}
	
	function best_seller() {
		//lay san pham ban chay
		$query = "SELECT * FROM orders_detail join orders on orders_detail.orders_id = orders.orders_id,product 
				WHERE datediff(CURRENT_DATE(), orders.date) <= 30 and product.product_id = orders_detail.product_id 
				GROUP by orders_detail.product_id 
				ORDER BY sum(quantity) DESC, product.date desc 
				LIMIT 12;";
		$best_seller = $this->product_model->query($query);
		$this->data['best_seller'] = $best_seller;
		$this->data['temp'] = 'site/product/best_seller';
		$this->load->view('site/layout', $this->data);
	}
	
	function discount() {
				//lay san pham giam gia
		$query_total = "SELECT count(*) as total FROM product WHERE discount > 0 order by date desc";
		$rs = $this->product_model->query($query_total);
		$this->load->library('pagination');
		$config = array();
		$config['total_rows'] = $rs[0]->total;
		$config['base_url'] = base_url('product/new_arrival/');
		$config['per_page'] = 16; //so luong san pham tren moi trang
		$config['uri_segment'] = 3; //phan doan hien thi trang thu may
		$config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>'; 
        $config['num_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
		//khoi tao cau hinh phan trang
		$this->pagination->initialize($config);
		
		$segment = $this->uri->segment('3');
		$segment = intval($segment);
		$query = "SELECT * FROM product WHERE discount > 0 order by discount desc, date desc limit $segment, 16";
		$discount = $this->product_model->query($query);
		$this->data['discount'] = $discount;
		$this->data['temp'] = 'site/product/discount';
		$this->load->view('site/layout', $this->data);
	}
	
	function catalog() {
		$this->load->model('catalog_model');
		$catalog_id = intval($this->uri->rsegment('3'));
		$info = $this->catalog_model->get_info($catalog_id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(base_url('product'));
		}
		if($info->parent_id != null) {		
			$parent_info = $this->catalog_model->get_info($info->parent_id);
			$this->data['parent_name'] = $parent_info->catalog_name;
		} else {
			$this->data['parent_name'] = '';
		}
		
		$this->data['catalog_name'] = $info->catalog_name;
		$input = array();
		$input['where'] = array('catalog_id' => $catalog_id);		
		$total = $this->product_model->get_total($input);
		
		$this->load->library('pagination');
		$config = array();
		$config['total_rows'] = $total;
		$config['base_url'] = base_url('product/index');
		$config['per_page'] = 16; //so luong san pham tren moi trang
		$config['uri_segment'] = 4; //phan doan hien thi trang thu may
		$config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>'; 
        $config['num_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
		//khoi tao cau hinh phan trang
		$this->pagination->initialize($config);
		
		$segment = $this->uri->segment('4');
		$segment = intval($segment);
		$input['limit'] = array($config['per_page'], $segment);
		$list = $this->product_model->get_list($input);
		$this->data['catalog'] = $list;
		$this->data['temp'] = 'site/product/catalog';
		$this->load->view('site/layout', $this->data);
	}
	
	function detail() {
		//kiem tra san pham co ton tai khong
		$product_id = intval($this->uri->rsegment('3'));
		$info = $this->product_model->get_info($product_id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(base_url('product'));
		}
		//lay danh sach chi tiet san pham
		$this->load->model('product_detail_model');		
		$input = array();
		$input['where'] = array('product_id' => $product_id);
		$detail = $this->product_detail_model->get_list($input);
		
		//cap nhat luot view
		$data = array();
		$data['view'] = $info->view + 1;
		$this->product_model->update($product_id, $data);
		
		$this->data['product'] = $info;
		$this->data['detail_list'] = $detail;
		$this->data['temp'] = 'site/product/detail';
		$this->load->view('site/layout', $this->data);
	}
	
	function search() {
		$keyword = $this->input->get('keyword');
		$input = array();
		$input['like'] = array('product_name', $keyword);
		$list = $this->product_model->get_list($input);
		$this->data['list'] = $list;
		$this->data['keyword'] = $keyword;
		$this->data['temp'] = 'site/product/search';
		$this->load->view('site/layout', $this->data);
	}
}