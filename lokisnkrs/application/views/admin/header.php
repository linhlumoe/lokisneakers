
<header>
	<div class="container-fluid">
    	<div class="row">
        	<div class="top ">
            	<div class="logo col-md-2 col-sm-2 col-xs-4"><a href="<?php echo admin_url('home');?>"><img src="<?php echo base_url();?>upload/logo.png" alt="LOGO"/></a></div>                   
                <form class="navbar-form navbar-left col-md-4 col-sm-4 col-xs-4" method="get" role="form" style="float: left;margin-top: 22px; margin-left: 50px;" action="<?php echo admin_url('home/search');?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="keyword" class="form-control" placeholder="Nhập sản phẩm cần tìm" required="required" style="width:250px;">
                        <button type="submit" class="btn btn-default">Tìm kiếm</button>
                    </div>
                    
                </form>

                <div class="col-md-2 col-sm-2 col-xs-4" style="float: right;margin-top: 26px; color:#191919;"><!--gio hang-->
                    <a href="<?php echo admin_url('home/logout');?>">
                        <div style="color:#333;"><img src="<?php echo base_url();?>upload/Exit_24px.png" alt="Cart"/> Đăng xuất</div>                           
                    </a>
                </div>
                
                <div class="col-md-2 col-sm-2 col-xs-4" style="float: right;margin-top: 21px;"><!--dang nhap-->
                    <a href="<?php echo admin_url('admin/edit');?>">
                        <div style="color:#333; padding-top:4px;"><img src="<?php echo base_url();?>upload/User_26px.png" alt="Login"/>  Đổi mật khẩu</div                           
                    ></a>	
                </div>
                
                <div class="clearfix"></div>
            </div>
    	</div><!--.row-->            
	</div><!--.container-->
</header>