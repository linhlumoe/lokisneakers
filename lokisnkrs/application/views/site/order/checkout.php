<div class="container-fluid"> 
    <div class="row" style="margin-top:20px;"> 
        <div class="col-xs-12 col-sm-12 col-md-10 well well-sm col-md-offset-1" style="margin-top:20px;"> 
            <legend><i class="glyphicon glyphicon-edit"></i><strong> THÔNG TIN ĐẶT HÀNG</strong></legend> 

            <form action="<?php echo base_url('order/checkout')?>" method="post" class="form" role="form" enctype="multipart/form-data">
				<div class="row"> 
                    <div class="col-xs-6 col-md-6">
                    	<label for=""> Họ tên:</label> 
                        <input style="margin-top:10px;" class="form-control" name="txt_name" placeholder="Nhập họ và tên khách hàng" required="" 
                        type="text" value="<?php echo isset($member->member_name) ? $member->member_name : ''?>"> 
                        <div name="username_error" style="font-size:12px; color:#F00;"><?php echo form_error('txt_name');?></div>
                    </div> 
                    <div class="col-xs-6 col-md-6"> 
                    	<label for=""> Số điện thoại:</label>
                    	<input style="margin-top:10px;" class="form-control" name="num_phone" placeholder="Nhập số điện thoại" required="" 
                        type="number" value="<?php echo isset($member->phone) ? $member->phone : ''?>">
                        <div name="username_error" style="font-size:12px; color:#F00;"><?php echo form_error('num_phone');?></div> 
                    </div> 
                </div>
                 
                 <div class="row"> 
                    <div class="col-xs-6 col-md-6">
                    	<label style="margin-top:10px;" for=""> Email:</label>
                        <input style="margin-top:10px;" class="form-control" name="im_email" placeholder="Nhập email khách hàng" type="email" 
                        required="" value="<?php echo isset($member->email) ? $member->email : ''?>">
                    </div> 
                    <div class="col-xs-6 col-md-6"> 
                    	<label style="margin-top:10px;" for=""> Hình thức thanh toán:</label>
                    	<select id="parent_select" name="slt_payment" style="height:33px; margin-top:10px;
                                                                            border-radius:4px;font-size:14px;" class="col-xs-12 col-md-12 col-sm-12">
                            <option value="tienmat" >Thanh toán tiền mặt khi nhận hàng</option>
                            <option value="baokim" >Cổng thanh toán BẢO KIM</option>
                        </select> 
                    </div> 
                </div>
				
                <label style="margin-top:10px;" for=""> Địa chỉ: </label>
                <input style="margin-top:10px;" class="form-control" name="txt_address" placeholder="Nhập địa chỉ nhận hàng" required="" type="text" 
                value="<?php echo isset($member->address) ? $member->address : ''?>">
                <div name="username_error" style="font-size:12px; color:#F00;"><?php echo form_error('txt_address');?></div>

                <label style="margin-top:10px;" for=""> Ghi chú: </label>
                <input style="margin-top:10px;" class="form-control" name="txt_note" placeholder="Nhập ghi chú cho đơn hàng" type="text" > 

                <br/> 
                <br/> 
                <button class="btn btn-lg btn-primary btn-block" name="btn_check" type="submit"> Đặt hàng</button> 
            </form> 
        </div>  
    </div>
</div>



