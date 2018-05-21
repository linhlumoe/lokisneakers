<div class="container-fluid" style="height:755px;">
    <div class="row" style="margin-top:20px;">
        <div class="col-xs-12 col-sm-12 col-md-10 well well-sm col-md-offset-1" style="margin-top:20px;">
            <legend><i class="glyphicon glyphicon-user"></i><strong> ĐĂNG NHẬP</strong></legend> 
            <form action="" method="post" class="form" role="form" enctype="multipart/form-data">
                <label for="">Tên đăng nhập</label> 
                <input style="margin-top:10px;" class="form-control" name="txt_username" placeholder="Nhập email hoặc số điện thoại" required="" type="text">
                <label for="" style="margin-top:10px;">Mật khẩu</label> 
                <input style="margin-top:10px;" class="form-control" name="pw_password" placeholder="Nhập mật khẩu" type="password" required="required"> 
                <br />
                <div name="name_error" style="font-size:13px; color:#F00;"><?php echo form_error('login');?></div>
                <button class="btn btn-lg btn-primary btn-block" name="btn_login" type="submit"> Đăng nhập</button> 
            </form>  
        </div>
    </div>
</div>