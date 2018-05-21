<?php
//tao ra cac link trong site
function admin_url($url = '') {
	return base_url('site/'.$url);
}