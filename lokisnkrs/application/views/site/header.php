<div class="container">
    <div class="top ">
        <div class="row">
            <div class="logo col-md-2 col-sm-3 col-xs-4"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>upload/logo.png" alt="LOGO"/></a></div>                   
            <form class="navbar-form col-md-4 col-sm-6 col-xs-4" method="get" enctype="multipart/form-data" style="margin-top: 22px; margin-left: 50px;" action="<?php echo base_url('product/search');?>">
                <div class="row">
                    <input type="text" name="keyword" class="form-control" placeholder="Nhập sản phẩm cần tìm">
                    <button type="submit" class="btn btn-default">Tìm kiếm</button>
                </div>
                
            </form>
		<?php if ($member_name == ''):?>

            <div class="col-md-3 col-sm-6 col-xs-6" style="margin-top: 26px; color:#191919;"><!--gio hang-->
                <a href="<?php echo base_url('cart');?>" style="float:right;">
                    <strong><div style="color:#333;"><img src="<?php echo base_url();?>upload/ShoppingCart_gr.png" alt="Cart"/> Giỏ hàng của bạn <span class="label label-danger"><?php echo $total_items;?></span></div></strong>
                                               
                </a>
            </div>
            
            <div class="col-md-2 col-sm-6 col-xs-6" style="margin-top: 26px; margin-left:50px;"><!--dang nhap-->
                <a href="<?php echo base_url('member/login');?>">
                    <strong><div style="color:#333;"><img src="<?php echo base_url();?>upload/User_26px.png" alt="Login"/>  Đăng nhập</div></strong>                           
                </a>	
            </div>
            
		<?php else: ?>
            
            <div class="col-md-3 col-sm-6 col-xs-6" style="margin-top: 26px; color:#191919;"><!--gio hang-->
                <a href="<?php echo base_url('cart');?>" style="float:right;">
                    <strong><div style="color:#333;"><img src="<?php echo base_url();?>upload/ShoppingCart_gr.png" alt="Cart"/> Giỏ hàng của bạn <span class="label label-danger"><?php echo $total_items;?></span></div></strong>
                                               
                </a>
            </div>
                        
            <div class="col-md-2 col-sm-2 col-xs-2" style="float: right;margin-top: 26px; color:#191919;"><!--dang xuat-->
                <a href="<?php echo base_url('member/logout');?>" >
                
                    <strong><div style="color:#333;"><img src="<?php echo base_url();?>upload/Exit_24px.png" alt="Exit"/> Đăng xuất</div></strong>                    
                </a>
            </div>
            <span class="label label-danger" style="float:right; margin-top:10px; font-size:12px;"> Xin chào <?php echo $member_name;?></span>
            
		<?php endif; ?>
       
            <div class="clearfix"></div>
        </div>
    </div><!--.row-->            
</div><!--.container-->