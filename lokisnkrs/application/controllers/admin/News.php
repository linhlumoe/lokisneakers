<?php
class news extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('news_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	//lay danh sach san pham
	function index() {
		$input = array();		
		$list = $this->news_model->get_list($input);
		$this->data['list'] = $list;

		$total = $this->news_model->get_total();
		$this->data['total'] = $total;
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['temp'] = 'admin/news/index';
		$this->data['tmp'] = 'admin/news/insert';
		
		$this->load->view('admin/main', $this->data);
	}

	//them san pham
	function insert() {
		if($this->input->post()) {
			$this->form_validation->set_rules('txt_title', 'Tiêu đề', 'min_length[3]|max_length[100]');
			$this->form_validation->set_rules('txt_content', 'Nội dung', 'min_length[3]|max_length[100]');		
			if($this->form_validation->run()) {
				$title = $this->input->post('txt_title');
				$content = $this->input->post('txt_content');
				$this->load->library('upload_library');
				
				//lay ten file anh upload
				$image = '';
				$upload_path = './upload/news';
				$upload_data = $this->upload_library->upload($upload_path, 'file_image');
				if(isset($upload_data['file_name'])) {
					$image = $upload_data['file_name'];
				}
				$data = array(
					'title'    => $title,
					'content'  => $content
				);
				//kiem tra hinh anh co duoc cap nhat khong
				if($image != '') {
					$data['image'] = $image;
				}
				if($this->news_model->create($data)) {
					$this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
				} else {
					$this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
				}
				redirect(admin_url('news'));
			}
			else{
				$this->index();
			}
			}
		}

	//sua san pham
	function edit() {
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		
		//lay thong tin tin tucc
		$info = $this->news_model->get_info($id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('news'));
		}
		
		$total = $this->news_model->get_total();
		$input = array();		
		$list = $this->news_model->get_list($input);
		$message = $this->session->flashdata('message');
		
		$data = array (
			'total' => $total,
			'list' => $list,
			'message' => $message,
			'news_id' =>$info->news_id,
			'image' =>$info->image,
			'content' =>$info->content,
			'title' =>$info->title,
			'date' =>$info->date
			
		);
		
		if($this->input->post()) {
			$this->form_validation->set_rules('txt_title', 'Tiêu đề', 'min_length[3]|max_length[100]');
			$this->form_validation->set_rules('txt_content', 'Nội dung', 'min_length[3]|max_length[100]');		
			if($this->form_validation->run()) {
				$title = $this->input->post('txt_title');
				$content = $this->input->post('txt_content');
				$this->load->library('upload_library');
				
				//lay ten file anh upload
				$image = '';
				$upload_path = './upload/news';
				$upload_data = $this->upload_library->upload($upload_path, 'file_image');
				if(isset($upload_data['file_name'])) {
					$image = $upload_data['file_name'];
				}
				$data = array(
					'title'    => $title,
					'content'  => $content
				);
				//kiem tra hinh anh co duoc cap nhat khong
				if($image != '') {
					$data['image'] = $image;
				}
				
				if($this->news_model->update($id, $data)) {
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công!');
				} else {
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
				}
				
				redirect(admin_url('news'));
			}
		}
		
		$data['temp'] = 'admin/news/index';
		$data['tmp'] = 'admin/news/edit';
		$this->load->view('admin/main', $data);
	}
	
	//xoa catalog
	function delete() {
		
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		
		//lay thong tin admin
		$info = $this->news_model->get_info($id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('news'));
		}
		if($this->news_model->delete($id)) {
			$this->session->set_flashdata('message', 'Xoá dữ liệu thành công!');
		} else {
			$this->session->set_flashdata('message', 'Xoá dữ liệu thành công!');
		}
		
		redirect(admin_url('news'));
	}
}
