<?php
class Home extends MY_Controller {
	function index() {
		$username = $this->session->userdata('login_admin');
		$this->load->model('admin_model');
		$admin = $this->admin_model->get_info_rule(array('username' => $username));
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['admin_name'] = $admin->admin_name;
		$this->data['temp'] = 'admin/home/index';
		$this->load->view('admin/main', $this->data);
	}
	
		//dang xuat
	function logout() {
		if(null !== $this->session->userdata('login_admin')) {
			$this->session->unset_userdata('login_admin');
			$this->session->unset_userdata('permission');
		}
		redirect(base_url());
	}
	
	function search() {
		$keyword = $this->input->get('keyword');
		$this->load->model('product_model');
		$total = $this->product_model->get_total();
		$this->data['total'] = $total;
		
		$this->load->library('pagination');
		$config = array();
		$config['total_rows'] = $total;
		$config['base_url'] = admin_url('product/index');
		$config['per_page'] = 5; //so luong san pham tren moi trang
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

		$input = array();
		$input['limit'] = array($config['per_page'], $segment);
		$input = array();
		$input['like'] = array('product_name', $keyword);
		$list = $this->product_model->get_list($input);
		//
		$input['where'] = array();
		$id = $this->input->get('id');
		$id = intval($id);
		if($id > 0) {
			$input['where']['product_id'] = $id;
		}
		$name = $this->input->get('name');
		if($name) {
			$input['like'] = array('product_name', $name);
		}
		$this->load->model('catalog_model');
		$catalog_id = $this->input->get('catalog');
		$catalog_id = intval($catalog_id);
		if($catalog_id > 0) {
			$input['where']['catalog_id'] = $catalog_id;
		}
		
		$list = $this->product_model->get_list($input);
		foreach($list as $p) {
			$c = $this->catalog_model->get_info($p->catalog_id);
			$p->catalog_name = $c->catalog_name;
		}
		$this->data['list'] = $list;
		
		$this->data['keyword'] = $keyword;
		$this->data['temp'] = 'admin/home/search';
		$this->load->view('admin/main', $this->data);
	}

}