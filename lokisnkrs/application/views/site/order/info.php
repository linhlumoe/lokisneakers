
<div class="container-fluid"> 
    <div class="row" style="margin-top:20px;"> 
        <div class="col-xs-12 col-sm-12 col-md-12 well well-sm " style="margin-top:20px;"> 
            <legend><i class="glyphicon glyphicon-globe"></i> <strong>DANH SÁCH ĐƠN HÀNG</strong></legend>
            
            <?php $number = 100; foreach($list as $row): 
				$date = date_create($row->date);
			?>
			<div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title" style="font-size: 14px;">
                        <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $number ?>">
                        <div class="row">
                        	<div class="col-md-2">Mã số: <?php echo $row->orders_id ?></div>
                            <div class="col-md-4">Ngày lập: <?php echo date_format($date, 'd/m/Y  H:i:s') ?></div>
                            <div class="col-md-2">Trị giá: <strong><?php echo number_format($row->cost, 0) ?></strong></div>
                            <div class="col-md-3">Trạng thái: <strong><?php if($row->status == 0) {
																		echo "Chưa hoàn thành";
							} else if ($row->status == 1) {
																		echo "Đã hoàn thành"; }
																	else if ($row->status == 2) {
																		echo "Đã huỷ";}
																	
															 ?></strong></div>
                            <div class="col-md-1"><span class="caret"></span></div>
                        </div>
                        </a>
                    </div>
                </div>
                
                <div id="<?php echo $number ?>" class="panel-collapse collapse" ><br />
                    	<p class="row" style="font-size:14px;">
                        	<div class="col-md-4" style="font-size:14px;">Tên người nhận: <?php echo $row->name?></div>
                    		<div class="col-md-4" style="font-size:14px;">Số điện thoại: <?php echo $row->phone?></div>
                    		<div class="col-md-4" style="font-size:14px;">Email: <?php echo $row->email?></div>
                        </p><br />
                    	<p class="row" >
                            <div class="col-md-4" style="font-size:14px;">Trạng thái thanh toán: <?php if($row->status_payment == 0) {
                                                                            echo "Chưa thanh toán";
                                                                        } else if ($row->status_payment == 1) {
                                                                            echo "Đã thanh toán"; }
                                                                        else if ($row->status_payment == 2) {
                                                                            echo "Đã huỷ";}?></div>
                            <div class="col-md-6" style="font-size:14px;">Trạng thái giao hàng: <?php if($row->status_shipment == 0) {
                                                                            echo "Chưa giao hàng";
                                                                        } else if ($row->status_shipment == 1) {
                                                                            echo "Đã giao hàng"; }
                                                                        else if ($row->status_shipment == 2) {
                                                                            echo "Đã huỷ";}?></div>
                        </p><br /><br />
                    <table id="cart" class="table table-hover table-condensed" > 
                        <thead> 
                            <tr> 
                                <th style="width:50%">Sản phẩm</th>
                                <th style="width:10%">Size</th> 
                                <th style="width:12%">Giá</th> 
                                <th style="width:10%">Số lượng</th> 
                                <th style="width:15%" class="text-center">Thành tiền</th> 
                                <th style="width:3%"> </th> 
                            </tr> 
                        </thead>
                        
                        <tbody >
                        <?php 
                            foreach ($row->subs as $subs): ?>
                        
                            <tr>
                            <td data-th="Product" > 
                                <div class="row" > 
                                    <div class="col-sm-2 hidden-xs">
                                        <img src="<?php echo base_url('upload/product/'.$subs->image);?>" class="img-responsive" width="100"></div>
                                    <div class="col-sm-10" ><h5 class="nomargin" style=" margin-top:20px;"><?php echo $subs->product_name; ?></h5></div> 
                                </div> 
                            </td> 
                            <td data-th="Size" style=" vertical-align:middle;"><?php echo $subs->product_size ?></td> 
                            <td data-th="Price" style=" vertical-align:middle;"><?php echo number_format($subs->price,0)?></td> 
                            <td data-th="Quantity" style=" vertical-align:middle;text-align:center;"><?php echo $subs->quantity ?></td> 
                            <td data-th="Subtotal" style="vertical-align:middle; text-align:center;"><?php echo number_format($subs->price*$subs->quantity, 0)?></td> 
                            <td class="actions" data-th="" style=" vertical-align:middle;">
                                
                            </td> 
                            </tr>
                        <?php endforeach; $number+=1;?>
                        </tbody>
                    </table>
                    <?php if($row->status_payment == 0 && $row->status_shipment == 0): ?>
                    <center><a href="<?php echo base_url('order/cancel/'.$row->orders_id)?>" class="btn btn-danger btn-sm"> Huỷ đơn hàng</a></center><br />
                    <?php endif;?>
                </div>
            </div>
            <?php endforeach; ?>
            
        </div>  
    </div>
</div>