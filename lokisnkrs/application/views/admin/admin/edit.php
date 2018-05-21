<div class="container ">
	<?php
		$this->load->view('admin/message');
	?>
    <div class="col-xs-12 col-sm-12 col-md-6 well well-sm col-md-offset-3">
        <legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-info"></i> THÔNG TIN NGƯỜI DÙNG</legend> 
        <form action="<?php echo admin_url('admin/edit');?>" enctype="multipart/form-data" method="post" class="form" role="form" >
            <label for="">Họ tên</label> 
            <input class="form-control" name="txt_admin_name" type="text" style="margin-top:10px;" disabled="disabled" value="<?php echo $admin_name;?>">
            <label for="" style="margin-top:12px;">Tên đăng nhập</label> <br>
            <input class="form-control" name="txt_username" type="text" style="margin-top:10px;" disabled="disabled" value="<?php echo $username;?>">
            <label for="" style="margin-top:12px;">Mật khẩu</label> <br>
            <input class="form-control" name="pw_password" type="password" style="margin-top:10px;" required="required" value="<?php echo $password;?>">
            <label for="" style="margin-top:12px;">Xác nhận mật khẩu</label> <br>
            <input class="form-control" name="pw_retype" type="password" style="margin-top:10px;" required="required" value="<?php echo $password;?>">
            <button class="btn btn-primary col-xs-12 col-md-12 col-sm-12" type="submit" name="btn_edit" style="margin-top:18px;margin-bottom:13px;">Lưu</button>
            <span></span> 
        </form>  
        <br />
    </div>
</div>

