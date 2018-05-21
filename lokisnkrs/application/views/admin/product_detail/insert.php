
<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-plus-sign"></i> THÊM CHI TIẾT SẢN PHẨM</legend> 
<form action="<?php echo admin_url('product_detail/insert/'.$product_id)?>" enctype="multipart/form-data" method="post" class="form" role="form" >
    <div class="row" > 
        <div class="col-xs-6 col-md-6 col-sm-6" style="margin-top:10px;">
            <label for=""> Size</label> 
            <input style="margin-top:10px;" class="form-control" name="num_size" required="" type="number">
        </div> 
        <div class="col-xs-6 col-md-6 col-sm-6" style="margin-top:10px;"> 
            <label for=""> Số lượng</label>
            <input style="margin-top:10px;" class="form-control" name="num_quantity" required="" type="number"> 
        </div> 
    </div>
    <div name="num_size_error" style="font-size:12px; color:#F00;"><?php echo form_error('num_size');?></div>
    <div name="num_quantity_error" style="font-size:12px; color:#F00;"><?php echo form_error('num_quantity');?></div>

    <button class="btn btn-primary col-xs-12 col-md-12 col-sm-12" type="submit" name="btn_insert" style="margin-top:18px;">Thêm</button> 
	<br />
</form>  
