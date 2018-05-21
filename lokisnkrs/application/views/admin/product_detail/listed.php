<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-th-list"></i> DANH SÁCH CHI TIẾT SẢN PHẨM
<span style="float:right; font-size:14px; margin-top:7px;">Tổng số: <?php echo $total;?></span></legend> 
<div class="table-responsive" style="margin-top:8px;">
    <table class="table table-bordered table-hover">
      <tr >
        <th style="text-align:center" class="col-md-1">ID</th>
        <th style="text-align:center" class="col-md-1">Tên sản phẩm</th>
        <th style="text-align:center" class="col-md-1">Size</th>
        <th style="text-align:center" class="col-md-1">Số lượng</th>
        <th style="text-align:center" class="col-md-1" colspan="2">Quản lý</th>
      </tr>
      <?php foreach($list as $row):?>
      <tr>
        <td style="text-align:center;"><?php echo $row->pd_detail_id?></td>
        <td style="text-align:center;text-transform:capitalize;"><?php echo $row->product_name?></td>
        <td style="text-align:center;text-transform:capitalize;"><?php echo $row->size?></td>
        <td style="text-align:center;"><?php echo $row->quantity?></td>
        <td align="center">
        	<a href="<?php echo admin_url('product_detail/edit/'.$row->pd_detail_id); ?>">
            	<img src="<?php echo base_url();?>upload/Edit.png" title="Sửa"/></a></td>
        <td align="center">
        	<a href="<?php echo admin_url('product_detail/delete/'.$row->pd_detail_id); ?>">
            	<img src="<?php echo base_url();?>upload/Delete.png" title="Xoá"/></a></td>
      </tr>
      <?php endforeach;?>
    </table>
</div>
