<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-plus-sign"></i> THÊM ADMIN</legend> 
<form action="<?php echo admin_url('admin/insert')?>" enctype="multipart/form-data" method="post" class="form" role="form" >

    <label for="">Họ tên</label> 
    <input class="form-control" name="txt_admin_name" type="text" style="margin-top:10px;" required="required" value="<?php //echo set_value('txt_admin_name')?>">
    <div name="name_error" style="font-size:12px; color:#F00;"><?php echo form_error('txt_admin_name');?></div>
    
    <label for="" style="margin-top:12px;">Tên đăng nhập</label> <br>
    <input class="form-control" name="txt_username" type="text" style="margin-top:10px;" required="required" value="<?php //echo set_value('txt_username')?>">
    <div name="username_error" style="font-size:12px; color:#F00;"><?php echo form_error('txt_username');?></div>
    
    <label for="" style="margin-top:12px;">Mật khẩu</label> <br>
    <input class="form-control" name="pw_password" type="password" style="margin-top:10px;" required="required">
    <div name="pw_error" style="font-size:12px; color:#F00;"><?php echo form_error('pw_password');?></div>
    
    <label for="" style="margin-top:12px;">Nhập lại mật khẩu</label> <br>
    <input class="form-control" name="pw_retype" type="password" style="margin-top:10px;" required="required">
    <div name="pwrt_error" style="font-size:12px; color:#F00;"><?php echo form_error('pw_retype');?></div>
    
    <label for="" style="margin-top:12px;">Phân quyền</label> <br/>
    <div class="row">

    <?php foreach ($config_permission as $controller => $actions):?>
    	<div class="col-md-4">
       	<input name="permission[<?php echo $controller?>]" value="index" type="checkbox" style="margin-top:10px;" ><strong style="text-transform:capitalize;"> <?php echo $controller?></strong>
    </div>
    <?php endforeach;?>
    </div>
    <button class="btn btn-primary col-xs-12 col-md-12 col-sm-12" type="submit" name="btn_insert" style="margin-top:18px;margin-bottom:13px;">Thêm</button>
    <span></span> 
</form>  
<br />
