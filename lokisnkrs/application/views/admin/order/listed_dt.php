
<div class="table-responsive" style="margin-top:8px;">
	<h4><strong> Đơn hàng số: <?php echo $order->orders_id?></strong></h4>
    <table class="table table-bordered table-hover ">
      <tr >
        <th style="text-align:center; vertical-align:middle;" class="col-md-9">Tên sản phẩm</th>
        <th style="text-align:center; vertical-align:middle;" class="col-md-1">Size</th>
        <th style="text-align:center; vertical-align:middle;" class="col-md-2">Số lượng</th>
      </tr>
      <?php
	  	foreach($detail as $row): 
	  ?>
      <tr>
        <td style="text-align:center;text-transform:capitalize;"><?php echo $row->product_name?></td>
        <td style="text-align:center;text-transform:capitalize;"><?php echo $row->product_size?></td>
        <td style="text-align:center;"><?php echo $row->quantity?></td>
      </tr>
      <?php
		endforeach;
	  ?>
    </table>
    <center>
    	<a href="<?php echo admin_url('report/order/'.$row->orders_id)?>">
    		<button class="btn btn-md btn-primary" name="btn_print" type="submit"> In đơn hàng</button>
        </a>
    </center>
</div>
