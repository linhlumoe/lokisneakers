<?php
class Catalog extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('catalog_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	//lay danh sach catalog
	function index() {
		
		$input = array();		
		$list = $this->catalog_model->get_list($input);
		$this->data['list'] = $list;
		
		$ip_0['where'] = array('parent_id' => null); 
		$this->data['list_0'] = $this->catalog_model->get_list($ip_0);

		$total = $this->catalog_model->get_total();
		$this->data['total'] = $total;
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['temp'] = 'admin/catalog/index';
		$this->data['tmp'] = 'admin/catalog/insert';
		
		$this->load->view('admin/main', $this->data);
	}
	
	//kiem tra ten loai san pham da ton tai chua
	function check_catalog_name() {
		$catalog_name = $this->input->post('txt_catalog_name');
		$where = array('catalog_name' => $catalog_name);
		if($this->catalog_model->check_exists($where)) {
			$this->form_validation->set_message(__FUNCTION__, '* Tên loại sản phẩm đã tồn tại');
			return false;
		}
		return true;
	}
	
	function check_catalog_name_upd() {
		$catalog_name = $this->input->post('txt_catalog_name');
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		 
		$sql = "select * from catalog where catalog_name = '$catalog_name' and catalog_id != $id";
		$result = $this->db->query($sql);
		if($result->num_rows() > 0 ) {
			$this->form_validation->set_message(__FUNCTION__, '* Tên loại sản phẩm đã tồn tại');
			return false;
		}
		return true;
	}
	
	//them catalog
	function insert() {
		
		if($this->input->post()) {
			$this->form_validation->set_rules('txt_catalog_name', 'Tên loại sản phẩm', 'min_length[3]|max_length[30]|callback_check_catalog_name');
		
		
			if($this->form_validation->run()) {
				$catalog_name = $this->input->post('txt_catalog_name');
				$parent_id = $this->input->post('slt_parent_id');
				
				if ($parent_id == 'null') {
					$data = array ('catalog_name' => $catalog_name);
				} else {
					$data = array (
						'catalog_name' => $catalog_name,
						'parent_id' => $parent_id
					);
				}
				
				if($this->catalog_model->create($data)) {
					$this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
				} else {
					$this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
				}
				
				redirect(admin_url('catalog'));
			} else {
				$this->index();
			}
		}
	}
	
	//sua catalog
	function edit() {
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		
		//lay thong tin admin
		$info = $this->catalog_model->get_info($id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('catalog'));
		}
		
		$input = array();		
		$list = $this->catalog_model->get_list($input);	
		$ip_0['where'] = array('parent_id' => null); 
		$total = $this->catalog_model->get_total();
		$message = $this->session->flashdata('message');
		
		$data = array (
			'catalog_id' => $info->catalog_id,
			'catalog_name' => $info->catalog_name,
			'parent_id' => $info->parent_id,
			'list_0' => $this->catalog_model->get_list($ip_0),
			'total' => $total,
			'list' => $list,
			'message' => $message
		);
		
		if($this->input->post()) {
			$this->form_validation->set_rules('txt_catalog_name', 'Tên loại sản phẩm', 'min_length[3]|max_length[30]|callback_check_catalog_name_upd');
		
		}
		if($this->form_validation->run()) {
			$catalog_name = $this->input->post('txt_catalog_name');
			$parent_id = $this->input->post('slt_parent_id');
			
			if ($parent_id == 'null') {
				$data = array ('catalog_name' => $catalog_name);
			} else {
				$data = array (
					'catalog_name' => $catalog_name,
					'parent_id' => $parent_id
				);
			}
			
			if($this->catalog_model->update($id, $data)) {
				$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công!');
			} else {
				$this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
			}
			
			redirect(admin_url('catalog'));
		} 
		$data['temp'] = 'admin/catalog/index';
		$data['tmp'] = 'admin/catalog/edit';
		$this->load->view('admin/main', $data);
	}
	
	//xoa catalog
	function delete() {
		
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		
		//lay thong tin admin
		$info = $this->catalog_model->get_info($id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('catalog'));
		}
		//kiem tra danh muc co san pham khong
		$this->load->model('product_model');
		$product = $this->product_model->get_info_rule(array('catalog_id' => $id), 'product_id');
		$catalog = $this->catalog_model->get_info_rule(array('parent_id' => $id), 'catalog_id');
		if($product) {
			$this->session->set_flashdata('message', 'Vui lòng xoá tất cả sản phẩm thuộc danh mục này trước khi xoá!');
			redirect(admin_url('catalog'));
		}
		
		if($catalog) {
			$this->session->set_flashdata('message', 'Vui lòng xoá tất cả danh mục con thuộc danh mục này trước khi xoá!');
			redirect(admin_url('catalog'));
		}
		//thuc hien xoa
		if($this->catalog_model->delete($id)) {
			$this->session->set_flashdata('message', 'Xoá dữ liệu thành công!');
		} else {
			$this->session->set_flashdata('message', 'Xoá dữ liệu thất bại!');
		}
		
		redirect(admin_url('catalog'));
	}
	
}