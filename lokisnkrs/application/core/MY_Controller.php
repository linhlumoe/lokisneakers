<?php
class MY_Controller extends CI_Controller {
	
	//bien gui du lieu sang ben view
	public $data = array();
	
	function __construct() {
		//ke thua tu CI_Controller
		parent::__construct();
		
		$controller = $this->uri->segment(1);
		switch ($controller) {
			case 'admin' : {
				//xu ly cac du lieu khi truy cap vao trang admin
				$this->load->helper('admin');
				$this->_check_login();
				break;
			}
			default: {
				//xu ly du lieu o trang ngoai
				//lay danh muc san pham
				$this->load->model('catalog_model');
				$input = array();
				$input['order'] = array('catalog_name','asci');
				$input['where'] = array('parent_id' => null);
				$catalog_list = $this->catalog_model->get_list($input);
				foreach ($catalog_list as $row) {
					$input['where'] = array('parent_id' => $row->catalog_id);
					$subs = $this->catalog_model->get_list($input);
					$row->subs = $subs;
				}
				$this->data['catalog_list'] = $catalog_list;
				
				//goi thu vien cart
				$this->load->library('cart');
				$this->data['total_items'] = $this->cart->total_items();
				
				//lay thong tin thanh vien dang nhap
				$this->load->model('member_model');
				$member_id = $this->session->userdata('login_member');
				$member = $this->member_model->get_info($member_id);
				//pre($member);
				if(empty($member)) {
					$this->data['member_name'] = '';
				} else {
					$this->data['member_name'] = $member->member_name;
				}
			}
		}
	}
	
	//kiem tra trang thai dang nhap cua admin
	private function _check_login() {
		$controller = $this->uri->rsegment('1');
		$controller = strtolower($controller);
		
		$login = $this->session->userdata('login_admin');
		if($login == '' && $controller != 'login') {
			redirect(admin_url('login'));
		}
		
		$admin_id = $this->session->userdata('admin_id');
				
		if($login != '' && $controller == 'login') {
			redirect(admin_url('home'));
		} elseif (!in_array($controller, array('home', 'login'))) {
			//kiem tra quyen
			$root_admin = $this->config->item('root_admin');
			$check = true;
			if($root_admin != $admin_id) {
				$permission_admin = $this->session->userdata('permission');
				if(isset($permission_admin->$controller) == 0) {
					$check = false;
				}
				if(!$check ) {
					$this->session->set_flashdata('message', 'Bạn không có quyền thực hiện chức năng này!');
					redirect(admin_url('home'));
				}
			}
		}
	}

}