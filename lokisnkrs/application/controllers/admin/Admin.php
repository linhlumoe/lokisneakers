<?php
class Admin extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	//lay danh sach admin
	function index() {
		
		$input = array();
		$list = $this->admin_model->get_list($input);
		$this->data['list'] = $list;
		
		$total = $this->admin_model->get_total();
		$this->data['total'] = $total;
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->config->load('permission', true);
		$config_permission = $this->config->item('permission');
		$this->data['config_permission'] = $config_permission;

		$this->data['tmp'] = 'admin/admin/insert';		
		$this->data['temp'] = 'admin/admin/index';
		$this->load->view('admin/main', $this->data);
		
	}
	
	//kiem tra username da ton tai chua
	function check_username() {
		$username = $this->input->post('txt_username');
		$where = array('username' => $username);
		if($this->admin_model->check_exists($where)) {
			$this->form_validation->set_message(__FUNCTION__, '* Tên đăng nhập đã tồn tại');
			return false;
		}
		return true;
	}
	
	//them admin
	function insert() {
		
		if($this->input->post()) {
			$this->form_validation->set_rules('txt_admin_name', 'Họ và tên', 'required|max_length[30]');
			$this->form_validation->set_rules('txt_username', 'Tên đăng nhập', 'required|min_length[3]|callback_check_username');
			$this->form_validation->set_rules('pw_password', 'Mật khẩu', 'required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('pw_retype', 'Nhập lại mật khẩu', 'required|matches[pw_password]');
		}
		
		if($this->form_validation->run()) {
			$admin_name = $this->input->post('txt_admin_name');
			$username = $this->input->post('txt_username');
			$password = $this->input->post('pw_password');
			$permission = $this->input->post('permission');
			$data = array (
				'admin_name' => $admin_name,
				'username' => $username,
				'password' => $password,
				'permission' => json_encode($permission)
			);
			if($this->admin_model->create($data)) {
				$this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
			} else {
				$this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
			}
			
			redirect(admin_url('admin'));
		} else {
			$this->index();
		}
	}
	
	//sua admin
	function edit() {
		$username = $this->session->userdata('login_admin');
		$where = array('username' => $username);
		$info = $this->admin_model->get_info_rule($where);
		$data = array (
			'admin_name' => $info->admin_name,
			'username' => $info->username,
			'password' => $info->password
		);

		$data['message'] = $this->session->flashdata('message');
		
		$data['temp'] = 'admin/admin/edit';
		$this->load->view('admin/main', $data);
		
		if($this->input->post()) {
			$this->form_validation->set_rules('pw_password', 'Mật khẩu', 'required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('pw_retype', 'Nhập lại mật khẩu', 'required|matches[pw_password]');
		}
		
		if($this->form_validation->run()) {
			$password = $this->input->post('pw_password');
			$data = array (
				'password' => $password
			);
			
			if($this->admin_model->update($info->admin_id, $data)) {
				$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công!');
			} else {
				$this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
			}
			redirect(admin_url('admin/edit'));
		} else {
			$this->index();
		}
	}
	
	//sua admin
	function edit_all() {
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		
		//lay thong tin admin
		$info = $this->admin_model->get_info($id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('admin'));
		}
		
		if($this->input->post()) {
			$this->form_validation->set_rules('txt_admin_name', 'Họ và tên', 'required|max_length[30]');
			//$this->form_validation->set_rules('txt_username', 'Tên đăng nhập', 'required|min_length[3]|callback_check_username');
			$this->form_validation->set_rules('pw_password', 'Mật khẩu', 'required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('pw_retype', 'Nhập lại mật khẩu', 'required|matches[pw_password]');
		}
		
		if($this->form_validation->run()) {
			$admin_name = $this->input->post('txt_admin_name');
			$username = $this->input->post('txt_username');
			$password = $this->input->post('pw_password');
			$permission = $this->input->post('permission');
			$data = array (
				'admin_name' => $admin_name,
				'username' => $username,
				'password' => $password,
				'permission' => json_encode($permission)
			);
			
			if($this->admin_model->update($info->admin_id, $data)) {
				$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công!');
			} else {
				$this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
			}
			redirect(admin_url('admin'));
		} 
		$this->data['admin'] = $info;
		
		$this->config->load('permission', true);
		$config_permission = $this->config->item('permission');
		$this->data['config_permission'] = $config_permission;
		
		$input = array();
		$list = $this->admin_model->get_list($input);
		$this->data['list'] = $list;
		
		$total = $this->admin_model->get_total();
		$this->data['total'] = $total;
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['tmp'] = 'admin/admin/edit_all';		
		$this->data['temp'] = 'admin/admin/index';
		$this->load->view('admin/main', $this->data);

	}
	
	//xoa admin
	function delete() {
		
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		
		//lay thong tin admin
		$info = $this->admin_model->get_info($id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('admin'));
		}
		
		//thuc hien xoa
		if($this->admin_model->delete($id)) {
			$this->session->set_flashdata('message', 'Xoá dữ liệu thành công!');
		} else {
			$this->session->set_flashdata('message', 'Xoá dữ liệu thành công!');
		}
		
		redirect(admin_url('admin'));
	}
	
}