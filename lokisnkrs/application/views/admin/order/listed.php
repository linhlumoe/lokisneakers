
<div class="table-responsive" style="margin-top:8px;">
    <table class="table table-bordered table-hover">
		<tr >
            <th style="text-align:center">ID</th>
            <th style="text-align:center">Tên khách hàng</th>
            <th style="text-align:center">Số điện thoại</th>
            <th style="text-align:center">Trị giá</th>
            <th style="text-align:center">Trạng thái thanh toán</th>
            <th style="text-align:center">Trạng thái đơn hàng</th>
            <th style="text-align:center" colspan="2">Quản lý</th>
      	</tr>
      <?php foreach($list as $row):?>
		<tr>
            <td style="text-align:center;"><?php echo $row->orders_id ?></td>
            <td style="text-align:center;text-transform:capitalize;"><?php echo $row->name ?></td>
            <td style="text-align:center;"><?php echo $row->phone ?></td>
            <td style="text-align:center;"><?php echo number_format($row->cost, 0) ?></td>
            <td style="text-align:center;"><?php if ($row->status_payment == 0) {echo "Chưa thanh toán";} 
												else if($row->status_payment == 1) {echo 'Đã thanh toán';}  
												else {echo 'Đã huỷ';} ?></td>
            <td style="text-align:center;"><?php if ($row->status_shipment == 0) {echo "Chưa giao";} 
												else if($row->status_shipment == 1) {echo 'Đã giao';}  
												else {echo 'Đã huỷ';}?></td>
            <td align="center" colspan="2">
                <a href="<?php echo admin_url('order/edit/'.$row->orders_id); ?>">
                    <img src="<?php echo base_url();?>upload/Edit.png" title="Sửa"/></a></td>
      	</tr>
		<?php endforeach;?>
    </table>
</div>
