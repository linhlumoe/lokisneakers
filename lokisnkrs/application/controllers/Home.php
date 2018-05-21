<?php
class Home extends MY_Controller {

	function index() {
		$this->load->model('product_model');
		//lay san pham ban chay
		$sql_hot = "SELECT * FROM orders_detail join orders on orders_detail.orders_id = orders.orders_id,product 
					WHERE datediff(CURRENT_DATE(), orders.date) <= 30 and product.product_id = orders_detail.product_id 
					GROUP by orders_detail.product_id 
					ORDER BY sum(quantity) DESC, product.date desc 
					LIMIT 8;";
		$pd_hot = $this->product_model->query($sql_hot);
		$this->data['pd_hot'] = $pd_hot;
		
		//lay san pham giam gia
		$sql_discount = "select * from product where discount > 0 order by discount desc limit 8";
		$pd_discount = $this->product_model->query($sql_discount);
		$this->data['pd_discount'] = $pd_discount;
		
		//lay tin tuc moi nhat
 		$this->load->model('news_model');
		$input = array();
		$input['limit'] = array(3, 0);
		$news_list = $this->news_model->get_list($input);
		$this->data['news_list'] = $news_list;
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['temp'] = 'site/home/index';
		$this->load->view('site/layout', $this->data);
	}
	
	function news() {
		$this->load->model('news_model');
		$input = array();
		$total = $this->news_model->get_total($input);
		
		$this->load->library('pagination');
		$config = array();
		$config['total_rows'] = $total;
		$config['base_url'] = base_url('home/news/');
		$config['per_page'] = 5; //so luong san pham tren moi trang
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
		$news_list = $this->news_model->get_list($input);
		$this->data['news_list'] = $news_list;
		$this->data['temp'] = 'site/home/news';
		$this->load->view('site/layout', $this->data);	
	}
	
	function size_guide() {
		$this->data['temp'] = 'site/home/size_guide';
		$this->load->view('site/layout', $this->data);
	}
	
	function shop_guide() {
		$this->data['temp'] = 'site/home/shop_guide';
		$this->load->view('site/layout', $this->data);
	}
	
	function contact() {
		$this->data['temp'] = 'site/home/contact';
		$this->load->view('site/layout', $this->data);
	}
	
	function intro() {
		$this->data['temp'] = 'site/home/intro';
		$this->load->view('site/layout', $this->data);
	}
}