<div class="row">
    <h3 align="center" class="col-md-12 col-sm-12 col-xs-12" style="text-transform:uppercase; text-decoration:none; margin-bottom:20px;">
			<strong>KẾT QUẢ TÌM KIẾM</strong></h3>
    <center><i style="font-size:16px;">Với từ khoá <b><strong style="font-size:20px;"> "<?php echo $keyword ?>"</strong></b></i></center><br/>
    <div class="row" ></div>
    
    <br />


	<?php if(!empty($list)) { ?>

	<?php foreach($list as $row):
			if($row->discount >0):
	?>
    <div class="col-md-3">
        <div class="thumbnail"> 
            <div class="caption"> 
                <h4 style=" text-transform:capitalize;"><?php echo $row->product_name ?></h4>
                 
                <p class="price" style=" text-decoration:line-through; background-color:#C66;"> 
                    <?php echo number_format($row->price,0) ?> vnđ</p>
                <p style="font-size:17px; font-weight:bold; text-transform:uppercase; background-color:#C33;"> 
                    <?php echo number_format($row->final_price,0) ?> vnđ</p>
                <p style="margin-top:20px;">
                    <a href="<?php echo base_url('product/detail/'.$row->product_id); ?>" class="btn btn-success">Xem chi tiết</a> </p>
            </div> <img src="<?php echo base_url('upload/product/'.$row->image);?>"> 
        </div>
        
    </div> 
        <?php else: ?> 
    <div class="col-md-3">
        <div class="thumbnail"> 
            <div class="caption"> 
                <h4 style=" text-transform:capitalize;"><?php echo $row->product_name ?></h4> 
                <p class="price" style="background-color:#C33;"> <?php echo number_format($row->price,0) ?> vnđ</p>
                <p style="margin-top:20px;">
                	<a href="<?php echo base_url('product/detail/'.$row->product_id); ?>" class="btn btn-success">Xem chi tiết</a> </p>
            </div> <img src="<?php echo base_url('upload/product/'.$row->image);?>"> 
        </div> 
    </div> 
		<?php endif;?>
    <?php endforeach;?>
    <span><br/></span> 
    <?php } else { ?>
	<h4 class="text-center">Không có sản phẩm nào được tìm thấy !</h4><br/>
<?php }?>
</div>



