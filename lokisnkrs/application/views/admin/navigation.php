<!--NAVIGATION : START -->
<div class="container-fluid">
	<nav class="navbar navbar-default" role="navigation">
    	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
            	<a class="navbar-brand" href="<?php echo admin_url('home');?>"><img src="<?php echo base_url();?>upload/Home_24px.png" style="padding-left:5px;"/></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav nav-tabs nav-justified navbar-static-top" style="padding-top:8px; font-size:14px;">
                    <li><a href="<?php echo admin_url('catalog');?>">Loại sản phẩm</a></li>
                    <li><a href="<?php echo admin_url('product');?>">Sản phẩm</a></li>
                    <li><a href="<?php echo admin_url('member');?>">Thành viên</a></li>
                    <li><a href="<?php echo admin_url('admin');?>">Admin</a></li>
                    <li><a href="<?php echo admin_url('news');?>">Tin tức</a></li>
                    <li class="dropdown">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Đơn hàng <span class="caret"></span></a>
                      	<ul class="dropdown-menu">
                        	<li><a href="<?php echo admin_url('order/new_order');?>">Đơn hàng mới</a></li>
                            <li><a href="<?php echo admin_url('order');?>">Tất cả đơn hàng</a></li>
                            <li><a href="<?php echo admin_url('order/cancel_order');?>">Đơn hàng đã huỷ</a></li>
                      	</ul>
                    </li>
                    <li><a href="<?php echo admin_url('report');?>">Báo cáo</a></li>
                </ul>
		    </div><!-- /.navbar-collapse -->           	         
	</nav>
</div><!-- /.container-->
   <!--NAVIGATION : END -->