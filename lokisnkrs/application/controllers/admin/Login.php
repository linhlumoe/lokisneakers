<?php
class Login extends MY_Controller {
	
	function index() {
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		if($this->input->post()) {
			$this->form_validation->set_rules('login', 'login', 'callback_check_login');
			if($this->form_validation->run()) {
				$this->session->set_userdata('login_admin', $this->input->post('txt_username'));
				redirect(admin_url('home'));
			}
		}
		
		$this->load->view('admin/login/index');
	}
	
	//kiem tra username va password
	function check_login() {
		$username = $this->input->post('txt_username');
		$password = $this->input->post('pw_password');
		
		$this->load->model('admin_model');
		$where = array('username' => $username, 'password' => $password);
		$admin = $this->admin_model->get_info_rule($where); 
		if($admin) {
			$this->session->set_userdata('permission', json_decode($admin->permission));
			$this->session->set_userdata('admin_id', json_decode($admin->admin_id));
			return true;
		}
		$this->form_validation->set_message(__FUNCTION__, '* Tên đăng nhập hoặc mật khẩu không đúng!');
		return false;
	}
}