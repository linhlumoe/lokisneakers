<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
 <script>tinymce.init({ selector: 'textarea' });</script>

<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-plus-sign"></i> SỬA SẢN PHẨM</legend> 
<form action="<?php echo admin_url('product/edit/'.$product_id);?>" enctype="multipart/form-data" method="post" class="form" role="form" >
    <label for="">Tên sản phẩm</label> 
    <input class="form-control" name="txt_product_name" type="text" style="margin-top:10px;" required="required" 
    																		value="<?php echo $product_name?>">
    <div name="product_name_error" style="font-size:12px; color:#F00;"><?php echo form_error('txt_product_name');?></div>

    <div class="row" > 
        <div class="col-xs-8 col-md-8 col-sm-8" style="margin-top:10px;">
            <label for=""> Giá niêm yết (vnđ)</label> 
            <input style="margin-top:10px;" class="form-control" name="num_price" required="" type="number" step="100000"
            value="<?php echo $price?>">
        </div> 
        <div class="col-xs-4 col-md-4 col-sm-4" style="margin-top:10px;"> 
            <label for=""> Giảm giá (%)</label>
            <input style="margin-top:10px;" class="form-control" name="num_discount" required="" step="5" type="number" value="<?php echo $discount?>"> 
        </div> 
    </div>
    <div name="price_error" style="font-size:12px; color:#F00;"><?php echo form_error('num_price');?></div>
    <div name="discount_error" style="font-size:12px; color:#F00;"><?php echo form_error('num_discount');?></div>

    <label for="" style="margin-top:10px;">Mô tả sản phẩm</label> 
    <textarea name="txt_description" required=""
    							 style="margin-top:10px; height:200px;"><?php echo $description?></textarea>
    
    <label for="" style="margin-top:10px;">Hình ảnh</label> <br />
    <img src="<?php echo base_url();?>upload/product/<?php echo $image?>" width="80px" height="80px"/>
    <input name="file_image" type="file" style="margin-top:10px;">
    
    <?php $image_list = json_decode($image_list);?>
    <label for="" style="margin-top:10px;">Hình ảnh khác</label><br/>
    <?php foreach ($image_list as $img):?>
    <img src="<?php echo base_url();?>upload/product/<?php echo $img?>" width="80px" height="80px" style="float:left; margin-left:5px;margin-bottom:10px;"/>
    <?php endforeach;?> 
    <input name="file_image_list[]" type="file" style="margin-top:10px;" multiple="multiple">

    <div class="row" >
    	<div class="col-xs-6 col-md-6 col-sm-6" style="margin-top:10px;">
        	<label for="">Loại sản phẩm</label>
            <select id="catalog_select" name="slt_catalog_id" style="text-transform:capitalize;height:33px; margin-top:10px;
                                                                            border-radius:4px;font-size:14px;" class="col-xs-12 col-md-12 col-sm-12">

            <?php foreach($catalog as $row):
                    if(count($row->subs) > 1):
            ?>
                <optgroup label="<?php echo $row->catalog_name ?>">
                    <?php foreach ($row->subs as $subs):?>
                    	<?php if ($subs->catalog_id == $catalog_id):?>
                    <option selected="selected" style="text-transform:capitalize;" value=<?php echo $subs->catalog_id?>><?php echo $subs->catalog_name ?></option>
                        <?php else: ?>
                    <option style="text-transform:capitalize;" value=<?php echo $subs->catalog_id?>><?php echo $subs->catalog_name ?></option>
                    	<?php endif; ?>
                    <?php endforeach;?>
                </optgroup>
            <?php else: ?>
                <option style="text-transform:capitalize;" value=<?php echo $row->catalog_id?> ><?php echo $row->catalog_name ?></option>
            <?php 
                endif;
            endforeach;?>
            </select>
        </div>
        
        <div class="col-xs-6 col-md-6 col-sm-6" style="margin-top:10px;">
        	<label for="" >Ngày nhập</label>
            <input class="form-control" name="date_date" type="date" style="margin-top:10px;" value="<?php echo $date?>">
        </div>
    </div>
    <div name="catalog_error" style="font-size:12px; color:#F00;"><?php echo form_error('slt_catalog_id');?></div>
    <div name="date_error" style="font-size:12px; color:#F00;"><?php echo form_error('date_date');?></div> 
    <button class="btn btn-primary col-xs-12 col-md-12 col-sm-12" type="submit" name="btn_edit" style="margin-top:18px;">Sửa</button> 
	<br /><br />
</form>  
