<?php
class Upload_library {
	var $CI = '';
	function __construct() {
		$this->CI = & get_instance();
	}
	
	//$upload_path: duong dan luu file
	//$file_name: ten the input upload file
	function upload($upload_path = '', $file_name = '') {
		$config = $this->config($upload_path);
		$this->CI->load->library('upload', $config);
		
		if($this->CI->upload->do_upload($file_name)) {
			$data = $this->CI->upload->data();
		} else {
			$data = $this->CI->upload->display_errors();
		}
		return $data;
	}
	
	//upload nhieu file
	function upload_files($upload_path = '', $file_name = '') {
		$config = $this->config($upload_path);
		
		$file = $_FILES['file_image_list'];
		$count = count($file['name']);
		
		$image_list = array();
		for($i = 0; $i < $count; $i++) {
			$_FILES['userfile']['name'] = $file['name'][$i];
			$_FILES['userfile']['type'] = $file['type'][$i];
			$_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i];
			$_FILES['userfile']['error'] = $file['error'][$i];
			$_FILES['userfile']['size'] = $file['size'][$i];
			
			$this->CI->load->library('upload', $config);
			if($this->CI->upload->do_upload()) {
				$data = $this->CI->upload->data();
				$image_list[] = $data['file_name'];
			}
		}
		return $image_list;
	}
	
	function config($upload_path = '') {
		//Khai bao bien cau hinh
         $config = array();
         //thuc mục chứa file
         $config['upload_path']   = $upload_path;
         //Định dạng file được phép tải
         $config['allowed_types'] = 'jpg|jpeg|png|gif';
         //Dung lượng tối đa
         $config['max_size']      = '5000';
         //Chiều rộng tối đa
         $config['max_width']     = '3000';
         //Chiều cao tối đa
         $config['max_height']    = '3000';
		 //ghi đè
		 $config['overwrite']    = true;
         
		 return $config;
	}
}