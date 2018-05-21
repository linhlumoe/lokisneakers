<?php
class Product extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('catalog_model');
		$this->load->model('product_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	//lay danh sach san pham
	function index() {
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
		
		//kiem tra co loc du lieu khong
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
		
		
		$input = array();
		$input['order'] = array('catalog_name','asci');
		$input['where'] = array('parent_id' => null);
		$catalog = $this->catalog_model->get_list($input);
		foreach($catalog as $row) {
			$input['where'] = array('parent_id' => $row->catalog_id);
			$subs = $this->catalog_model->get_list($input);
			$row->subs = $subs;
		}
		$this->data['catalog'] = $catalog;
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['temp'] = 'admin/product/index';
		$this->data['tmp'] = 'admin/product/insert';
		
		$this->load->view('admin/main', $this->data);
	}
	
	//kiem tra ten san pham da ton tai chua
	function check_product_name() {
		$product_name = $this->input->post('txt_product_name');
		$where = array('product_name' => $product_name);
		if($this->product_model->check_exists($where)) {
			$this->form_validation->set_message(__FUNCTION__, '* Tên sản phẩm đã tồn tại');
			return false;
		}
		return true;
	}
	
	function check_product_name_upd() {
		$product_name = $this->input->post('txt_product_name');
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		 
		$sql = "select * from product where product_name = '$product_name' and product_id != $id";
		$result = $this->db->query($sql);
		if($result->num_rows() > 0 ) {
			$this->form_validation->set_message(__FUNCTION__, '* Tên sản phẩm đã tồn tại');
			return false;
		}
		return true;
	}
	
	function check_date() {
		$date = $this->input->post('date_date');
		$today = date('m/d/Y');
		if(strtotime($date) > strtotime($today)) {
			$this->form_validation->set_message(__FUNCTION__, '* Ngày nhập lớn hơn ngày hiện tại');
			return false;
		}
		return true;
	}
	
	//them san pham
	function insert() {

		if($this->input->post()) {
			$this->form_validation->set_rules('txt_product_name', 'Tên sản phẩm', 'min_length[3]|max_length[100]|callback_check_product_name');
			$this->form_validation->set_rules('num_price', 'Giá sản phẩm', 'greater_than_equal_to[0]|max_length[8]');
			$this->form_validation->set_rules('slt_catalog_id', 'Loại sản phẩm', 'required');
			$this->form_validation->set_rules('num_discount', 'Chiết khấu', 'less_than[100]|greater_than_equal_to[0]');
			$this->form_validation->set_rules('date_date', 'Ngày nhập', 'required|callback_check_date');
			
			if($this->form_validation->run()) {
				$catalog_id = $this->input->post('slt_catalog_id');
				$product_name = $this->input->post('txt_product_name');
				$price = $this->input->post('num_price');
				$description = $this->input->post('txt_description');
				$discount = $this->input->post('num_discount');
				$date = $this->input->post('date_date');
				
				$this->load->library('upload_library');
				
				//lay ten file anh upload
				$image = '';
				$upload_path = './upload/product';
				$upload_data = $this->upload_library->upload($upload_path, 'file_image');
				if(isset($upload_data['file_name'])) {
					$image = $upload_data['file_name'];
				}
				
				//upload danh sach anh
				$image_list = array();
				$image_list = $this->upload_library->upload_files($upload_path, 'file_image_list');
				$image_list = json_encode($image_list);
				
				$data = array (
					'catalog_id' => $catalog_id,
					'product_name' => $product_name,
					'price' => $price,
					'description' => $description,
					'discount' => $discount,
					'image' => $image,
					'image_list' => $image_list,
					'date' => $date
				);
				
				if($this->product_model->create($data)) {
					$this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
				} else {
					$this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
				}
				
				redirect(admin_url('product'));
			} else {
				$this->index();
			}
		}
	}
	
	//sua san pham
	function edit() {
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		
		//lay thong tin admin
		$info = $this->product_model->get_info($id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('product'));
		}
		
		$total = $this->product_model->get_total();
		
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

		$list = $this->product_model->get_list_($segment, $config['per_page']);
		
		//kiem tra co loc du lieu khong
		$input['where'] = array();
		$id_filter = $this->input->get('id');
		$id_filter = intval($id);
		if($id_filter > 0) {
			$input['where']['id'] = $id_filter;
		}
		
		$input = array();
		$input['order'] = array('catalog_name','asci');
		$input['where'] = array('parent_id' => null);
		$catalog = $this->catalog_model->get_list($input);
		foreach($catalog as $row) {
			$input['where'] = array('parent_id' => $row->catalog_id);
			$subs = $this->catalog_model->get_list($input);
			$row->subs = $subs;
		}
		
		$message = $this->session->flashdata('message');
		
		$data = array (
			'total' => $total,
			'list' => $list,
			'catalog' => $catalog,
			'message' => $message,
			'product_id' =>$info->product_id,
			'catalog_id' => $info->catalog_id,
			'product_name' => $info->product_name,
			'price' => $info->price,
			'description' => $info->description,
			'discount' => $info->discount,
			'image' => $info->image,
			'image_list' => $info->image_list,
			'date' => $info->date
		);
		
		if($this->input->post()) {
			$this->form_validation->set_rules('txt_product_name', 'Tên sản phẩm', 'min_length[3]|max_length[100]|callback_check_product_name_upd');
			$this->form_validation->set_rules('num_price', 'Giá sản phẩm', 'greater_than_equal_to[0]|max_length[8]');
			$this->form_validation->set_rules('slt_catalog_id', 'Loại sản phẩm', 'required');
			$this->form_validation->set_rules('num_discount', 'Chiết khấu', 'less_than[100]|greater_than_equal_to[0]');
			$this->form_validation->set_rules('date_date', 'Ngày nhập', 'required|callback_check_date');
			
			if($this->form_validation->run()) {
				$catalog_id = $this->input->post('slt_catalog_id');
				$product_name = $this->input->post('txt_product_name');
				$price = $this->input->post('num_price');
				$description = $this->input->post('txt_description');
				$discount = $this->input->post('num_discount');
				$date = $this->input->post('date_date');
				
				$this->load->library('upload_library');
				
				//lay ten file anh upload
				$image = '';
				$upload_path = './upload/product';
				$upload_data = $this->upload_library->upload($upload_path, 'file_image');
				if(isset($upload_data['file_name'])) {
					$image = $upload_data['file_name'];
				}
				
				//upload danh sach anh
				$image_list = array();
				$image_list = $this->upload_library->upload_files($upload_path, 'file_image_list');
				$image_list_json = json_encode($image_list);
				
				$data = array (
					'catalog_id' => $catalog_id,
					'product_name' => $product_name,
					'price' => $price,
					'description' => $description,
					'discount' => $discount,
					'date' => $date
				);
				
				//kiem tra hinh anh co duoc cap nhat khong
				if($image != '') {
					$data['image'] = $image;
				}
				
				if(!empty($image_list)) {
					$data['image_list'] = $image_list_json;
				}

				
				if($this->product_model->update($id, $data)) {
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công!');
				} else {
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
				}
				
				redirect(admin_url('product'));
			}
		}
		
		$data['temp'] = 'admin/product/index';
		$data['tmp'] = 'admin/product/edit';
		$this->load->view('admin/main', $data);
	}
	
	//xoa san pahm
	function delete() {
		
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		
		//lay thong tin admin
		$info = $this->product_model->get_info($id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('product'));
		}
		//kiem tra san pham chi tiet san pham khong
		$this->load->model('product_detail_model');
		$pd_detail = $this->product_detail_model->get_info_rule(array('product_id' => $id), 'pd_detail_id');
		if($pd_detail) {
			$this->session->set_flashdata('message', 'Vui lòng xoá tất cả chi tiết sản phẩm thuộc sản phẩm này trước khi xoá!');
			redirect(admin_url('product'));
		}
		
		//thuc hien xoa
		if($this->product_model->delete($id)) {
			$image = './upload/product/'.$info->image;
			if(file_exists($image)) {
				unlink($image);
			}
			$image_list = json_decode($info->image_list);
			if(is_array($image_list)) {
				foreach ($image_list as $img) {
					$image = './upload/product/'.$info->img;
					if(file_exists($image)) {
						unlink($image);
					}
				}
			}
			$this->session->set_flashdata('message', 'Xoá dữ liệu thành công!');
		} else {
			$this->session->set_flashdata('message', 'Xoá dữ liệu thành công!');
		}
		
		redirect(admin_url('product'));
	}
	
}