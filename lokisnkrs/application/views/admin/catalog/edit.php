
<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-plus-sign"></i> SỬA LOẠI SẢN PHẨM</legend> 
<form action="<?php echo admin_url('catalog/edit/'.$catalog_id);?>" enctype="multipart/form-data" method="post" class="form" role="form" >
    <label for="">Tên loại sản phẩm</label> 
    
    <input class="form-control" name="txt_catalog_name" type="text" style="margin-top:10px;text-transform:capitalize;" required="required" 
    		value="<?php  echo $catalog_name;?>">
    <div name="catalog_name_error" style="font-size:12px; color:#F00;"><?php echo form_error('txt_catalog_name');?></div>
    
    <label for="" style="margin-top:12px;">Loại sản phẩm cha</label> <br>
    <div class="row" >
    	<div class="col-xs-8 col-md-8 col-sm-8" style="margin-top:10px;">
            <select id="parent_select" name="slt_parent_id" style="text-transform:capitalize;height:33px; 
                                                                            border-radius:4px;font-size:14px;" class="col-xs-12 col-md-12 col-sm-12">
            <?php
				if ($parent_id == 'null') {
			?>
                <option value="null" selected="selected"></option>               
            <?php
				} else {
			?>
            	<option value="null"></option>
            <?php
				}
			?>
            <?php		
                foreach($list_0 as $row): 
				if($row->catalog_id != $catalog_id) {
					
					if($row->catalog_id == $parent_id) {
            ?>
                <option selected="selected" style="text-transform:capitalize;" 
                		value=<?php echo $row->catalog_id?> ><?php echo $row->catalog_name ?></option>
            <?php
					} else {
			?>
            	<option style="text-transform:capitalize;" value=<?php echo $row->catalog_id?> ><?php echo $row->catalog_name ?></option>
			<?php
                	}
				}
				endforeach;
            ?>
            </select>
        </div>
        <div class="col-xs-4 col-md-4 col-sm-4" style="margin-top:10px;">
        	<button class="btn btn-primary" type="submit" name="btn_edit">Sửa</button> 
        </div>
    </div>
    <br />
</form>  
