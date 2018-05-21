<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-info"></i> SỬA ADMIN</legend> 
<form action="<?php echo admin_url('admin/edit_all');?>" enctype="multipart/form-data" method="post" class="form" role="form" >
    <label for="">Họ tên</label> 
    <input class="form-control" name="txt_admin_name" type="text" style="margin-top:10px;" disabled="disabled" value="<?php echo $admin->admin_name;?>">
    <label for="" style="margin-top:12px;">Tên đăng nhập</label> <br>
    <input class="form-control" name="txt_username" type="text" style="margin-top:10px;" disabled="disabled" value="<?php echo $admin->username;?>">
    <label for="" style="margin-top:12px;">Mật khẩu</label> <br>
    <input class="form-control" name="pw_password" type="password" style="margin-top:10px;" required="required" value="<?php echo $admin->password;?>">
    <label for="" style="margin-top:12px;">Xác nhận mật khẩu</label> <br>
    <input class="form-control" name="pw_retype" type="password" style="margin-top:10px;" required="required" value="<?php echo $admin->password;?>">
    <label for="" style="margin-top:12px;">Phân quyền</label> <br/>
    <div class="row">
	
    <?php $permission = json_decode($admin->permission);?>
    <?php foreach ($config_permission as $controller => $actions): ?>
        <div class="col-md-4">
        <?php if(isset($permission->$controller) == 1):?>
        <input checked name="permission[<?php echo $controller?>]" value="index" type="checkbox" style="margin-top:10px;" ><strong style="text-transform:capitalize;"> <?php echo $controller?></strong>
        <?php else: ?>
        <input name="permission[<?php echo $controller?>]" value="index" type="checkbox" style="margin-top:10px;" ><strong style="text-transform:capitalize;"> <?php echo $controller?></strong>
        <?php endif; ?>
    	</div>
    <?php endforeach;?>
    </div>
    <button class="btn btn-primary col-xs-12 col-md-12 col-sm-12" type="submit" name="btn_edit" style="margin-top:18px;margin-bottom:13px;">Lưu</button>
    <span></span> 
</form>  
<br />