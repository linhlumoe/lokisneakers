<div>
    <section class="row" id="sp_banchay"> <!---SAN PHAM BAN CHAY-->
        <h3 align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="#"><strong>SẢN PHẨM BÁN CHẠY</strong></a></h3>
        <div class="row" >

    	</div>
    	<br />
	<?php foreach($pd_hot as $row):
			if($row->discount >0):
	?>
        <div class="col-md-3"><span class="label label-danger" style="font-size:12px;">HOT</span>
            <div class="thumbnail"> 
                <div class="caption"> 
                    <h4 style=" text-transform:capitalize;"><?php echo $row->product_name ?></h4>
                     
                    <p class="price" style=" text-decoration:line-through; background-color:#C66;"> 
                        <?php echo number_format($row->price,0) ?> vnđ</p>
                    <p style="font-size:17px; font-weight:bold; text-transform:uppercase; background-color:#C33;"> 
                        <?php echo number_format($row->final_price,0) ?> vnđ</p>
                    <p style="margin-top:20px;">
                        <a href="<?php echo base_url('product/detail/'.$row->product_id); ?>" class="btn btn-success" rel="tooltip">Xem chi tiết</a> 
                </div> <img src="<?php echo base_url('upload/product/'.$row->image);?>"> 
            </div> 
        </div>
        <?php else: ?> 
        <div class="col-md-3"> <span class="label label-danger" style="font-size:12px;">HOT</span>
            <div class="thumbnail"> 
            <div class="caption"> 
                <h4 style=" text-transform:capitalize;"><?php echo $row->product_name ?></h4> 
                <p class="price" style="background-color:#C33;"> <?php echo number_format($row->price,0) ?> vnđ</p>
                <p><a href="<?php echo base_url('product/detail/'.$row->product_id); ?>" class="btn btn-success" rel="tooltip" >Xem chi tiết</a> 
            </div> <img src="<?php echo base_url('upload/product/'.$row->image);?>"> 
        	</div> 
        </div> 
		<?php endif;?>
      <?php endforeach;?>
        <p align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="<?php echo base_url('product/best_seller'); ?>" class="btn btn-info" rel="tooltip">Xem thêm >></a></p>

    </section><!--end sp ban chay-->
            
    <section class="row" id="sp_banchay"> <!---SAN PHAM GIAM GIA-->
        <h3 align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="#"><strong>SẢN PHẨM GIẢM GIÁ</strong></a></h3>
        <div class="row" >

    	</div>
    	<br />
	<?php foreach($pd_discount as $row):?>
		<div class="col-md-3"><span class="label label-danger" style="font-size:12px;">Sale <?php echo $row->discount ?>%</span>
            <div class="thumbnail"> 
                <div class="caption"> 
                    <h4 style=" text-transform:capitalize;"><?php echo $row->product_name ?></h4>
                    <p class="price" style=" text-decoration:line-through; background-color:#C66;"> 
                        <?php echo number_format($row->price,0) ?> vnđ</p>
                    <p style="font-size:17px; font-weight:bold; text-transform:uppercase; background-color:#C33;"> 
                        <?php echo number_format($row->final_price,0) ?> vnđ</p>
                    <p style="margin-top:20px;">
                        <a href="<?php echo base_url('product/detail/'.$row->product_id); ?>" class="btn btn-success" rel="tooltip">Xem chi tiết</a> 
                </div> <img src="<?php echo base_url('upload/product/'.$row->image);?>"> 
            </div> 
        </div>
	<?php endforeach;?>
        <p align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="<?php echo base_url('product/best_seller'); ?>" class="btn btn-info" rel="tooltip">Xem thêm >></a></p>

    </section><!--end sp giam gia-->
            
    <section class="row" id="tintuc"> <!---TIN TUC-->
        <h3 align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="#"><strong>TIN TỨC</strong></a></h3>
        <div class="row" ></div>
    	<br />
        <div id="news-slider" class="owl-carousel owl-theme" style="opacity: 1; display: block;"> 
            <div class="owl-wrapper-outer">
            <div class="owl-wrapper" style="left: 0px; display: block;">   
		<?php foreach($news_list as $news): ?>
                <div class="owl-item col-md-4 col-sm-4 col-xs-12">
                <div class="post-slide"> 
                    <div class="post-img"> <span class="over-layer"></span> 
                        <img src="<?php echo base_url();?>upload/news/<?php echo $news->image?>" style="height:150px;"> 
                    </div> 
                    <h3 class="post-title"> <a href="#"><?php echo $news->title?></a> 
                    </h3> <span>Ngày đăng: <?php echo date("d/m/Y - H:i:s", strtotime($news->date));?></span> 
                </div></div>
        <?php endforeach;?>        
                </div>
            </div>
        </div> 
        <p align="center" class="col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;"><a href="index.php?view=news" class="btn btn-info" rel="tooltip">Xem thêm >></a></p>

    </section><!--tin tuc-->
            
    <span><br/></span> 
</div>
