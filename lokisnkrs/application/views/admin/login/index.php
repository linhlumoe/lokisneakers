<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Đăng nhập | Loki Store</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="<?php echo public_url();?>bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo public_url();?>bootstrap/css/bootstrap-theme.min.css"/> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo public_url();?>css/style.css"/>
    </head>
    
    <body> 
    	<div class="main">
        
            <div class="container" style="height:755px;">
                <div class="row" style="margin-top:200px;">
                    <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4" style="margin-top:20px;">
                        <legend><i class="glyphicon glyphicon-user"></i><strong> ĐĂNG NHẬP</strong></legend> 
                        <form action="" method="post" class="form" role="form" enctype="multipart/form-data">
                            <label for="">Tên đăng nhập</label> 
                            <input class="form-control" name="txt_username" placeholder="Nhập tên đăng nhập" required="" type="text">
                            <label for="">Mật khẩu</label> 
                            <input class="form-control" name="pw_password" placeholder="Nhập mật khẩu" type="password" required="required"> 
                            <br />
                            <div name="name_error" style="font-size:13px; color:#F00;"><?php echo form_error('login');?></div>
                            <button class="btn btn-lg btn-primary btn-block" name="btn_login" type="submit"> Đăng nhập</button> 
                        </form>  
                    </div>
                </div>
            </div>
            
    	</div><!--MAIN : END -->
        
    	<p>&nbsp;</p>
   	<p>&nbsp;</p>
    <script src="<?php echo public_url();?>bootstrap/js/jquery-3.2.0.min.js"></script>
    <script src="<?php echo public_url();?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo public_url();?>js/script.js"></script>
    </body>
</html>

