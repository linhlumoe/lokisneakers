<div>
	<form class="form-horizontal" role="form" action="<?php echo admin_url('product')?>" enctype="multipart/form-data" method="get" >
      	<div class="form-group">
        	<label for="inputEmail3" class="col-sm-2 control-label">Mã sản phẩm</label>
        	<div class="col-md-2">
          		<input type="number" class="form-control" value="<?php echo $this->input->get('id');?>" placeholder="Tìm mã SP" name="id">
        	</div>
        	
            <label for="inputPassword3" class="col-sm-2 control-label">Loại sản phẩm</label>
        	<div class="col-md-3">
          		<select id="catalog_select" name="catalog" style="text-transform:capitalize;height:33px;
                                                                            border-radius:4px;font-size:14px;" class="col-xs-12 col-md-12 col-sm-12">
					<option value=""></option>
				<?php foreach($catalog as $row):
						if(count($row->subs) > 1):
				?>
                	<optgroup label="<?php echo $row->catalog_name ?>">
                    	<?php foreach ($row->subs as $subs):?>
                        <option <?php echo ($this->input->get('catalog') == $subs->catalog_id) ? "selected" : ''?> style="text-transform:capitalize;" value=<?php echo $subs->catalog_id?>><?php echo $subs->catalog_name ?></option>
                        <?php endforeach;?>
                    </optgroup>
                <?php else: ?>
                    <option <?php echo ($this->input->get('catalog') == $row->catalog_id) ? "selected" : ''?> style="text-transform:capitalize;" value=<?php echo $row->catalog_id?> ><?php echo $row->catalog_name ?></option>
                <?php 
					endif;
				endforeach;?>
                </select>
        	</div>
            
      	</div>
        <div class="form-group">
        	<label for="inputPassword3" class="col-sm-2 control-label">Tên sản phẩm</label>
        	<div class="col-md-5">
          		<input type="text" class="form-control" value="<?php echo $this->input->get('name');?>" placeholder="Tìm tên sản phẩm" name="name">
        	</div>
            <button type="submit" class="btn btn-primary"> Lọc </button>
            <a href="<?php echo admin_url('product')?>"><button type="button" class="btn btn-default">Reset</button></a>
		</div>
	</form>
</div>