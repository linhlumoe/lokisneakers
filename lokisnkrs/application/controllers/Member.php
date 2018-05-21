<?php
class Member extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('member_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	function index() {
		$input = array();		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		//$this->load->view('admin/main', $this->data);
	}
	//dang ky thanh vien
	function register() {
		if($this->input->post()) {
			$this->form_validation->set_rules('txt_name', 'Tên thành viên', 'min_length[3]|max_length[40]');
			$this->form_validation->set_rules('num_phone', 'Số điện thoại', 'min_length[10]|max_length[15]');
			$this->form_validation->set_rules('txt_address', 'Địa chỉ', 'min_length[5]|max_length[50]');		
			$this->form_validation->set_rules('pw_password', 'Mật khẩu', 'min_length[3]|max_length[30]');	
			$this->form_validation->set_rules('pw_retype', 'Mật khẩu', 'matches[pw_password]');		
			if($this->form_validation->run()) {
				$member_name = $this->input->post('txt_name');
				$phone = $this->input->post('num_phone');
				$email = $this->input->post('im_email');
				$address = $this->input->post('txt_address');
				$password = $this->input->post('pw_password');
				$retype_pw = $this->input->post('pw_retype');
				$dob = $this->input->post('date_dob');
				$gender = $this->input->post('slt_gender');
				$this->load->library('upload_library');
				$data = array (
					'member_name' => $member_name,
					'phone' => $phone,
					'email' => $email,
					'address' =>$address,
					'password' =>$password,
					'dob' =>$dob,
					'gender' =>$gender				
				);
				if($this->member_model->create($data)) {
					$this->session->set_flashdata('message', 'Đăng kí thành công!');
				} else {
					$this->session->set_flashdata('message', 'Đăng kí thất bại!');
				}
				redirect(base_url('Home'));
			} 
		}
			$this->data['temp'] = 'site/member/register';
			$this->load->view('site/layout', $this->data);
		
	}
	
	//sua thong tin thanh vien
	function edit() {
		$member_id=$this->session->userdata('login_member');
		//kiem tra member co ton tai khong
		$info = $this->member_model->get_info($member_id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(base_url('home'));
		}
		
		if($this->input->post()) {
			$this->form_validation->set_rules('txt_name', 'Tên thành viên', 'min_length[3]|max_length[40]');
			$this->form_validation->set_rules('num_phone', 'Số điện thoại', 'min_length[11]|max_length[15]');
			$this->form_validation->set_rules('txt_address', 'Địa chỉ', 'min_length[5]|max_length[50]');		
			$this->form_validation->set_rules('pw_password', 'Mật khẩu', 'min_length[3]|max_length[30]');	
			$this->form_validation->set_rules('pw_retype', 'Mật khẩu', 'matches[pw_password]');		
			if($this->form_validation->run()) {
				$member_name = $this->input->post('txt_name');
				$phone = $this->input->post('num_phone');
				$email = $this->input->post('im_email');
				$address = $this->input->post('txt_address');
				$password = $this->input->post('pw_password');
				$retype_pw = $this->input->post('pw_retype');
				$dob = $this->input->post('date_dob');
				$gender = $this->input->post('slt_gender');
				//$id=$this->session->userdata('login_member');
				$data = array (
					'member_name' => $member_name,
					'phone' => $phone,
					'email' => $email,
					'address' =>$address,
					'password' =>$password,
					'dob' =>$dob,
					'gender' =>$gender,
									
				);
				//$id=$this->session->userdata('login_member');
				if($this->member_model->update($member_id,$data)) {
					$this->session->set_flashdata('message', 'Cập nhật tài khoản thành công!');
				} else {
					$this->session->set_flashdata('message', "Cập nhật tài khoản thất bại!");
				}
				
			} 
		}	
		
		$info = $this->member_model->get_info($member_id);
		$this->data['member']=$info;
		$this->data['message']=$this->session->flashdata('message');
$this->data['temp'] = 'site/member/edit';
			$this->load->view('site/layout', $this->data);
	}
	
	//xoa thanh vien
	function delete() {
	
	}
	
	
	//dang nhap
	function login() {
		
		if($this->input->post()) {
			$this->form_validation->set_rules('login', 'login', 'callback_check_login');
			if($this->form_validation->run()) {
				redirect();
			}
		}
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['temp'] = 'site/member/login';
		$this->load->view('site/layout', $this->data);
	}
	
	//kiem tra username va password
	function check_login() {
		$username = $this->input->post('txt_username');
		$password = $this->input->post('pw_password');
		
		$this->load->model('admin_model');
		$where = array('username' => $username, 'password' => $password);
		$admin = $this->admin_model->get_info_rule($where); 
		if($admin) {
			$this->session->set_userdata('login_admin', $this->input->post('txt_username'));
			$this->session->set_userdata('permission', json_decode($admin->permission));
			$this->session->set_userdata('admin_id', json_decode($admin->admin_id));
			redirect('admin/home');
		}
		
		$this->load->model('member_model');
		
		$sql = "select * from member where (email = '$username' or phone = '$username') and password = '$password'";
		$member = $this->member_model->query($sql);

		if(empty($member) == false) {
			$this->session->set_flashdata('message', 'Đăng nhập thành công!');
			$this->session->set_userdata('login_member', $member[0]->member_id);
			return true;
		} else {
			$this->session->set_flashdata('message', 'Đăng nhập thất bại!');
			$this->form_validation->set_message(__FUNCTION__, '* Tên đăng nhập hoặc mật khẩu sai!');
			return false;
		}
	}
	
	function logout() {
		if(null !== $this->session->userdata('login_member')) {
			$this->session->unset_userdata('login_member');
			$this->session->set_flashdata('message', 'Đăng xuất thành công!');
		}
		redirect(base_url('member/login'));
	}
}