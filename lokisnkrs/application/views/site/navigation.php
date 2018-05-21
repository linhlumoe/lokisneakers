<?php ob_start(); ?>
<div class="container">
	<div class="row ">
        <nav class="navbar navbar-default " role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url();?>">
                    <img src="<?php echo base_url();?>/upload/Home_24px.png" style="padding-left:5px;"/></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav nav-tabs nav-justified navbar-static-top" style="padding-top:8px; font-size:14px;">
                        <li><a href="<?php echo base_url('home/intro'); ?>">Giới thiệu</a></li>
                        <li><a href="<?php echo base_url('product/all_product'); ?>">Sản phẩm</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hướng dẫn <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('home/size_guide'); ?>">Hướng dẫn chọn size</a></li>
                        		<li><a href="<?php echo base_url('home/shop_guide'); ?>">Hướng dẫn mua hàng</a></li>
                            </ul>
                    	</li>
                        <li><a href="<?php echo base_url('home/news'); ?>">Tin tức</a></li>
                        <li><a href="<?php echo base_url('home/contact'); ?>">Liên hệ</a></li>
					<?php if ($member_name == ''):?>
                        <li><a href="<?php echo base_url('member/register'); ?>">Đăng ký tài khoản</a></li>
                    <?php else:?>
                    	<li><a href="<?php echo base_url('member/edit'); ?>">Tài khoản</a></li>
                        <li><a href="<?php echo base_url('order/info'); ?>">Đơn hàng</a></li>
                    <?php endif ;?>
                    </ul>
                </div><!-- /.navbar-collapse -->           	         
        </nav></div></div><?php ob_end_flush(); ?>