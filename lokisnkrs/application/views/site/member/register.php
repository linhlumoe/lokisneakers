
<div class="container-fluid"> 
    <div class="row" style="margin-top:20px;"> 
        <div class="col-xs-12 col-sm-12 col-md-10 well well-sm col-md-offset-1" style="margin-top:20px;"> 
            <legend><i class="glyphicon glyphicon-globe"></i> <strong>ĐĂNG KÝ THÀNH VIÊN</strong></legend> 
            <form action="<?php base_url('member/register')?>" method="post" class="form" role="form" enctype="multipart/form-data"> 
                <div class="row"> 
                    <div class="col-xs-6 col-md-6">
                    	<label for=""> Họ tên</label> 
                        <input style="margin-top:10px;" class="form-control" name="txt_name" placeholder="Nhập họ và tên" required="" autofocus="" type="text"> 
                        <div name="member_name_error" style="font-size:12px; color:#F00;"><?php echo form_error('txt_name');?></div>                   
                    </div>                      
                    <div class="col-xs-6 col-md-6"> 
                    	<label for=""> Số điện thoại</label>
                    	<input style="margin-top:10px;" class="form-control" name="num_phone" placeholder="Nhập số điện thoại" required="" type="number"> 
                        <div name="member_name_phone" style="font-size:12px; color:#F00;"><?php echo form_error('num_phone');?></div>
                    </div> 
                </div> 
                <label style="margin-top:10px;" for=""> Email</label>
                <input style="margin-top:10px;" class="form-control" name="im_email" placeholder="Nhập email" type="email">
                <label style="margin-top:10px;" for=""> Địa chỉ</label>
                <input style="margin-top:10px;" class="form-control" name="txt_address" placeholder="Nhập địa chỉ" required="" type="text"> 
                <div name="product_name_error" style="font-size:12px; color:#F00;"><?php echo form_error('txt_address');?></div>
                <label style="margin-top:10px;" for=""> Mật khẩu</label>
                <input style="margin-top:10px;" class="form-control" name="pw_password" placeholder="Nhập mật khẩu" type="password"> 
                <div name="product_name_error" style="font-size:12px; color:#F00;"><?php echo form_error('pw_password');?></div>
                <label style="margin-top:10px;" for=""> Nhập lại mật khẩu</label>
                <input style="margin-top:10px;" class="form-control" name="pw_retype" placeholder="Nhập lại mật khẩu" type="password">
                <div name="product_name_error" style="font-size:12px; color:#F00;"><?php echo form_error('pw_retype');?></div>
                <div class="row"> 
                    <div class="col-xs-6 col-md-6">
                    	<label style="margin-top:10px;" for=""> Ngày sinh</label> 
                        <input style="margin-top:10px;" class="form-control" name="date_dob" type="date">
                    </div> 
                    <div class="col-xs-6 col-md-6"> 
                    	<label style="margin-top:10px;" for=""> Giới tính</label>
                    	<select name="slt_gender" style=" margin-top:10px;height:33px;border-radius:4px;font-size:14px;" class="col-xs-12 col-md-12 col-sm-12">
                        	<option value="1">Nam</option>
                        	<option value="0">Nữ</option>
                        </select>
                    </div> 
                </div
                ><br> 
                <br> 
                <button class="btn btn-lg btn-primary btn-block" name="btn_register" type="submit"> Đăng ký</button> 
            </form> 
        </div>  
    </div>
</div>