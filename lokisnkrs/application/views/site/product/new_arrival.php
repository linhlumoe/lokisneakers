<div class="row">
    <h3 align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="#"><strong>HÀNG MỚI VỀ</strong></a></h3><br />
    <div class="row" >

    </div>
    <br />
	<?php foreach($new_arrival as $row):
			if($row->discount >0):
	?>
    <div class="col-md-3">
    					<span class="label label-danger" style="font-size:12px;">Sale <?php echo $row->discount ?>%</span>
                        <span class="label label-success" style="font-size:12px;">New</span>
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
    <div class="col-md-3" style="margin-top:7px;"><span class="label label-success" style="font-size:12px;">New</span>
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
    <span><br/></span> 
</div>

<center>
	<ul class = "pagination">
		<?php echo $this->pagination->create_links();?>
    </ul>
</center>
