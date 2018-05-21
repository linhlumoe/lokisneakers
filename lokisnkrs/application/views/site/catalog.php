		<!--sidebar-->			
<div class="panel-group" id="accordion" style="background:#F2F2F2;">
	<div><br /></div>
    <div id="catalog">DANH MỤC</div>  <div><br /></div>
    
    <div class="panel panel-default">
    	<div class="panel-heading">
        	<div class="panel-title" style="font-size: 14px;">
            	<a data-parent="#accordion" href="<?php echo base_url('product/all_product'); ?>">Tất cả sản phẩm</a>
            </div>
    	</div>
    </div>
                          
    <div class="panel panel-default">
    	<div class="panel-heading">
        	<div class="panel-title" style="font-size: 14px;">
            	<a data-parent="#accordion" href="<?php echo base_url('product/new_arrival'); ?>">Hàng mới về</a>
            </div>
    	</div>
    </div>
                          
    <div class="panel panel-default">
    	<div class="panel-heading">
        	<div class="panel-title" style="font-size: 14px;">
            	<a data-parent="#accordion" href="<?php echo base_url('product/best_seller'); ?>">Sản phẩm bán chạy</a>
            </div>
    	</div>
    </div>
                          
    <div class="panel panel-default">
    	<div class="panel-heading">
        	<div class="panel-title" style="font-size: 14px;">
            	<a data-parent="#accordion" href="<?php echo base_url('product/discount'); ?>">Sản phẩm giảm giá</a>
            </div>
    	</div>
    </div>
    
    <?php
	$num = 0; 
	foreach($catalog_list as $row): 
		if(count($row->subs) > 1):
	?>                 
    <div class="panel panel-default">
    	<div class="panel-heading">
        	<div class="panel-title" style="font-size: 14px;">
            	<a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $num ?>" style="text-transform:capitalize;">
				<?php echo $row->catalog_name ?><span class="caret"></span></a>
            </div>
        </div>
        
        <div id="<?php echo $num ?>" class="panel-collapse collapse">
        	<ul class="list-group">
 				<?php foreach ($row->subs as $subs):?>
            	<li class="list-group-item"><a href="<?php echo base_url('product/catalog/'.$subs->catalog_id); ?>" style="color:#000;text-transform:capitalize;">
				<?php echo $subs->catalog_name ?></a></li>
                <?php 
				$num += 1;
				endforeach; ?>
        	</ul>
     	</div>
   	</div>
    	<?php else: ?>
    <div class="panel panel-default">
    	<div class="panel-heading">
        	<div class="panel-title" style="font-size: 14px;">
            	<a data-parent="#accordion" href="<?php echo base_url('product/catalog/'.$row->catalog_id); ?>"><?php echo $row->catalog_name;?></a>
            </div>
    	</div>
    </div>    
        <?php endif;?>
	<?php endforeach; ?>
    <br />                     
    
</div>