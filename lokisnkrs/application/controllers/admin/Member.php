<?php
class member extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('member_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	function index() {
		$input = array();		
		$list = $this->member_model->get_list($input);
		$this->data['list'] = $list;

		$total = $this->member_model->get_total();
		$this->data['total'] = $total;
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['temp'] = 'admin/member/index';
		$this->data['tmp'] = 'admin/member/insert';
		
		$this->load->view('admin/main', $this->data);
	}
	//sua member
	function edit() {
		$member_id = $this->uri->rsegment('3');
		$member_id = intval($member_id);
		
		//lay thong tin admin
		$info = $this->member_model->get_info($member_id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('member'));
		}
		$input = array();		
		$list = $this->member_model->get_list($input);
		$message = $this->session->flashdata('message');
		
		if($this->input->post()) {
			$this->form_validation->set_rules('txt_name', 'Tên thành viên', 'min_length[3]|max_length[40]');
			$this->form_validation->set_rules('num_phone', 'Số điện thoại', 'min_length[10]|max_length[15]');
			$this->form_validation->set_rules('txt_address', 'Địa chỉ', 'min_length[5]|max_length[50]');		
			$this->form_validation->set_rules('pw_password', 'Mật khẩu', 'min_length[3]|max_length[30]');			
			if($this->form_validation->run()) {
				$member_name = $this->input->post('txt_name');
				$phone = $this->input->post('num_phone');
				$email = $this->input->post('im_email');
				$address = $this->input->post('txt_address');
				$password = $this->input->post('pw_password');
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
				redirect(admin_url('member'));
			} 	
		}
		$info = $this->member_model->get_info($member_id);
		$this->data['member']=$info;
		$this->data['message']=$this->session->flashdata('message');
		$this->data['temp'] = 'admin/member/index';
		$this->data['tmp'] = 'admin/member/edit';
		$this->data['list']=$list;
		$this->load->view('admin/main', $this->data);
	}
	//xoa catalog
	function delete() {
		
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		
		//lay thong tin meểm
		$info = $this->member_model->get_info($id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('member'));
		}
		
		//kiem tra orders co member_id chưa
		$this->load->model('order_model');
		$orders = $this->order_model->get_info_rule(array('member_id' => $id), 'orders_id');
		if($orders){
			$this->session->set_flashdata('message', 'Vui lòng xoá tất cả đơn hàng có khách hàng này trước khi xoá!');
			redirect(admin_url('member'));
		}
				
		if($this->member_model->delete($id)) {
			$this->session->set_flashdata('message', 'Xoá dữ liệu thành công!');
		} else {
			$this->session->set_flashdata('message', 'Xoá dữ liệu thất bại!');
		}
		redirect(admin_url('member'));
	}
}
