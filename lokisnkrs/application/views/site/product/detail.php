<div class="card"> 
	<div class="container-fluid"> 
   		<div class="wrapper row">
    		<div class="preview col-md-6" > 
            
     			<div class="preview-pic tab-content" style="height:400px;"> 
      				<div class="tab-pane active" id="pic-1">
                    	<img src="<?php echo base_url('upload/product/'.$product->image);?>" 
                        					alt="<?php echo $product->product_name ?>"></div> 
                    <?php
						$num1 = 2;
						$image_list = json_decode($product->image_list);
						foreach ($image_list as $img):
					?>
                  	<div class="tab-pane" id="pic-<?php echo $num1 ?>"><img src="<?php echo base_url('upload/product/'.$img);?>"></div> 
                    <?php $num1 += 1;
						endforeach;
					?>
     			</div> 
                
     			<ul class="preview-thumbnail nav nav-tabs"> 
      				<li class="active" style="height:50px;">
                    	<a data-target="#pic-1" data-toggle="tab" >
                        <img height="70" src="<?php echo base_url('upload/product/'.$product->image);?>"></a>
      				</li> 
                    <?php
						$num = 2;
						foreach ($image_list as $img):
					?>
      				<li>
                    	<a data-target="#pic-<?php echo $num ?>" data-toggle="tab">
                        <img height="70" src="<?php echo base_url('upload/product/'.$img);?>"></a>
      				</li> 
					<?php $num += 1; 
						endforeach;
					?>
     			</ul> 
    		</div> 
            
    		<div class="details col-md-6">
            
            <?php if ($product->discount > 0): ?> 
     			<h3 class="product-title"><?php echo $product->product_name ?>
                	<span class="label label-danger">Sale <?php echo $product->discount ?>%</span></h3>
                <div style="font-size:15px;"><strong>Lượt xem: <?php echo $product->view?></strong></div><br /> 
 				<div class="product-description" style="font-size:14px; text-align:justify;"><?php echo $product->description ?></div>

                <div class="row" style="margin-top:10px;">
                    <label style="float:left; font-size:16px; margin-left:14px;">Giá bán: </label>              
                    <div style="float:left; font-weight:bold; text-decoration:line-through; font-size:16px; margin-left:10px;"> 
						<?php echo number_format($product->price,0) ?> VNĐ</div>
                    <div style="float:left; font-size:22px;margin-left:15px;"><span class="label label-danger"> 
						<?php echo number_format($product->final_price,0) ?> VNĐ</span></div>
                </div>
                
            <?php else: ?>
            	<h3 class="product-title"><?php echo $product->product_name ?></h3> 
 				<div style="font-size:15px;"><strong>Lượt xem: <?php echo $product->view?></strong></div><br /> 
 				<div class="product-description" style="font-size:14px; text-align:justify;"><?php echo $product->description ?></div>               
     			<div class="row" style="margin-top:10px;">
                    <label style="float:left; font-size:16px; margin-left:14px;">Giá bán: </label>              
                    <div style="float:left; font-size:22px;margin-left:15px;"><span class="label label-danger"> 
						<?php echo number_format($product->price,0) ?> VNĐ</span></div>
                </div>
            <?php endif; ?>
            		
                <form action="<?php echo base_url('cart/add/'.$product->product_id);?>" enctype="multipart/form-data" method="post" class="form" role="form">
                    <div class="row" style="margin-top:25px;" >
                    	<div class="col-xs-6 col-md-6 col-sm-6">
                            <label style="font-size:16px;" for="">Kích cỡ:  </label>
                            <select class="form-control" name="slt_size" style="font-weight:bold;">
                            <?php
                                foreach ($detail_list as $detail):
                                    if($detail->quantity > 0):
                            ?>
                                <option value="<?php echo $detail->size ?>"><?php echo $detail->size ?></option>
                            <?php
                                    endif;
                                endforeach;
                            ?>
                            </select>  
                        </div>
                        
                        <div class="col-xs-6 col-md-6 col-sm-6">
                        	<label style="font-size:16px;" for="">Số lượng: </label> 
                            <input name="num_quantity" class="form-control" type="number" value="1" min="1" style="font-weight:bold;"/>  
                        </div> 
                    </div>
                    <div name="num_quantity_error" style="font-size:12px; color:#F00;"><?php //echo form_error('num_quantity');?></div>
                    
                    <div class="action" align="center" style="margin-top:30px;">
                    <?php
						if(!empty($detail_list)) {?>
                	<a href="#" >
                    <button class="btn btn-success" name="addtocart" type="submit"><img src="<?php echo base_url()?>upload/ShoppingCart_24px.png"/>  THÊM VÀO GIỎ</button>
                    </a>
                    <?php
						} else {
					?>
                    <button disabled="disabled" class="btn btn-success" name="addtocart" type="submit"><img src="<?php echo base_url()?>upload/ShoppingCart_24px.png"/>  THÊM VÀO GIỎ</button>
                    <?php
						}
						?>
                </div> 
                </form>     

     			
    		</div> 
   		</div> 
	</div> 
</div>
