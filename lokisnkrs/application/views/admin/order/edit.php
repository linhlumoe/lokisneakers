
<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-plus-sign"></i> <strong>THÔNG TIN ĐƠN HÀNG</strong></legend> 
<form action="<?php echo admin_url('order/edit/'.$order->orders_id) ?>" enctype="multipart/form-data" method="post" class="form" role="form"> 
    
    <div class="row"> 
        <div class="col-xs-6 col-md-6">
            <label for=""> Tên khách hàng</label>
            <input class="form-control" type="text" value="<?php echo $order->name ?>" required="required" name="txt_name">
            <div name="username_error" style="font-size:12px; color:#F00;"><?php echo form_error('txt_name');?></div>
        </div> 
        <div class="col-xs-6 col-md-6" > 
		    <label for=""> Số điện thoại</label>
            <input class="form-control" type="num" value="<?php echo $order->phone?>" required="required" name="num_phone">
            <div name="username_error" style="font-size:12px; color:#F00;"><?php echo form_error('num_phone');?></div>
        </div> 
    </div> 
    
    <label for=""> Email</label>
    <input class="form-control" type="email" value="<?php echo $order->email ?>" required="required" name="im_email">
    
    <label for=""> Địa chỉ giao hàng</label>
    <input  class="form-control" name="txt_address" placeholder="Nhập địa chỉ nhận hàng" required="" type="text" 
    value="<?php echo $order->address?>">
    <div name="username_error" style="font-size:12px; color:#F00;"><?php echo form_error('txt_address');?></div>
    
    <label  for=""> Hình thức thanh toán:</label>
    <select id="parent_select" name="slt_payment" style="height:33px; 
                                                        border-radius:4px;font-size:14px;" class="col-xs-12 col-md-12 col-sm-12">
        <?php if($order->payment =='tienmat'): ?>
        <option value="tienmat" >Thanh toán tiền mặt khi nhận hàng</option>
        <?php elseif($order->payment =='nganluong'): ?>
        <option value="nganluong" >Cổng thanh toán NGÂN LƯỢNG</option>
        <?php else: ?>
        <option value="baokim" >Cổng thanh toán BẢO KIM</option>
        <?php endif;?>
    </select> 
    
    <br /><label for=""> Ghi chú: </label>
    <input class="form-control" name="txt_note" placeholder="Không có ghi chú nào" type="text" value="<?php echo $order->note?>"> 
	
    <div class="row"> 
        <div class="col-xs-6 col-md-6">
            <label for=""> Ngày đặt hàng</label>
            <input class="form-control" type="text" value="<?php echo $order->date ?>" disabled="disabled">
        </div> 
        <div class="col-xs-6 col-md-6" > 
            <label for=""> Trị giá đơn hàng</label>
            <input class="form-control" type="text" value="<?php echo number_format($order->cost, 0) ?> vnđ" disabled="disabled">
        </div> 
    </div> 
    <?php if($order->status == 1):?>
	<div class="row"> 
        <div class="col-xs-6 col-md-6">
            <label for=""> Trạng thái thanh toán</label>
            <select style="height:33px;border-radius:4px;font-size:14px; margin-bottom:25px;" class="col-xs-12 col-md-12">
				<option value="1">Đã thanh toán</option>
            </select>
        </div> 
        <div class="col-xs-6 col-md-6" > 
		    <label for=""> Trạng thái đơn hàng</label>
            <select name="slt_status" style="height:33px;border-radius:4px;font-size:14px; margin-bottom:25px;" class="col-xs-12 col-md-12">
				<option value="1">Đã giao hàng</option>
            </select>
        </div> 
    </div> 
    
    <?php elseif($order->status == 2): ?>
    <div class="row"> 
        <div class="col-xs-6 col-md-6">
            <label for=""> Trạng thái thanh toán</label>
            <select style="height:33px;border-radius:4px;font-size:14px; margin-bottom:25px;" class="col-xs-12 col-md-12">
				<option value="2">Đã huỷ</option>
            </select>
        </div> 
        <div class="col-xs-6 col-md-6" > 
		    <label for=""> Trạng thái đơn hàng</label>
            <select name="slt_status" style="height:33px;border-radius:4px;font-size:14px; margin-bottom:25px;" class="col-xs-12 col-md-12">
				<option value="2">Đã huỷ</option>
            </select>
        </div> 
    </div> 
    <?php else: ?>
    <div class="row"> 
        <div class="col-xs-6 col-md-6">
            <label for=""> Trạng thái thanh toán</label>
            <select style="height:33px;border-radius:4px;font-size:14px; margin-bottom:25px;" class="col-xs-12 col-md-12">
            <?php if($order->status_payment == 1):?>
				<option value="1" >Đã thanh toán</option>
            <?php else:?>
            	<option value="0">Chưa thanh toán</option>
            <?php endif;?>
            </select>
        </div> 
        <div class="col-xs-6 col-md-6" > 
		    <label for=""> Trạng thái đơn hàng</label>
            <select name="slt_status" style="height:33px;border-radius:4px;font-size:14px; margin-bottom:25px;" class="col-xs-12 col-md-12">
				<option value="0" selected="selected">Chưa giao hàng</option>
                <option value="1" >Đã giao hàng</option>
            </select>
        </div> 
    </div> 
	<center>
    <?php if($order->status_payment == 0 && $order->status_shipment == 0):?>
    <a href="<?php echo admin_url('order/cancel/'.$order->orders_id)?>">
    <button class="btn btn-md btn-danger" name="btn_edit" type="button"> Huỷ đơn hàng</button></a>
    <?php endif; ?>
    <button class="btn btn-md btn-primary" name="btn_edit" type="submit"> Lưu thay đổi</button>
    </center>
    <?php endif;?>
    <br />
    <br />
</form> 