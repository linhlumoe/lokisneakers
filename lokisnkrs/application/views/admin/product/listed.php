<?php $this->load->view('admin/product/filter');?>
<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-th-list"></i> DANH SÁCH SẢN PHẨM
<span style="float:right; font-size:14px; margin-top:7px;">Tổng số: <?php echo $total;?></span></legend> 
<div class="table-responsive" style="margin-top:8px;">
    <table class="table table-bordered table-hover">
      <tr >
        <th style="text-align:center" >ID</th>
        <th style="text-align:center" class="col-md-1">Tên sản phẩm</th>
        <th style="text-align:center" class="col-md-1">Loại sản phẩm</th>
        <th style="text-align:center" class="col-md-5">Mô tả sản phẩm</th>
        <th style="text-align:center" class="col-md-1">Giá niêm yết</th>
        <th style="text-align:center" >Giảm giá</th>
        <th style="text-align:center" class="col-md-2">Hình ảnh</th>
        <th style="text-align:center" class="col-md-2" colspan="3">Quản lý</th>
      </tr>
      <?php foreach($list as $row):?>
      <tr>
        <td style="text-align:center;"><?php echo $row->product_id?></td>
        <td style="text-align:center;text-transform:capitalize;">
			<?php echo $row->product_name?></td>
        <td style="text-align:center;text-transform:capitalize;"><?php echo $row->catalog_name?></td>
        <td style="text-align:justify;"><?php echo $row->description?></td>
        <td style="text-align:center;"><?php echo number_format($row->price, 0)?></td>
        <td style="text-align:center;"><?php echo $row->discount?></td>
        <td style="text-align:center;">
        	<img width="80px" height="80px" src="<?php echo base_url();?>upload/product/<?php echo $row->image; ?>"/>
        </td>
        <td align="center">
        	<a href="<?php echo admin_url('product_detail/index/'.$row->product_id); ?>">
            	<img src="<?php echo base_url();?>upload/More_16.png" title="Chi tiết sản phẩm"/></a></td>
        <td align="center">
        	<a href="<?php echo admin_url('product/edit/'.$row->product_id); ?>">
            	<img src="<?php echo base_url();?>upload/Edit.png" title="Sửa sản phẩm"/></a></td>
        <td align="center">
        	<a href="<?php echo admin_url('product/delete/'.$row->product_id); ?>">
            	<img src="<?php echo base_url();?>upload/Delete.png" title="Xoá sản phẩm"/></a></td>
      </tr>
      <?php endforeach;?>
    </table>
</div>

<center>
	<ul class = "pagination">
		<?php echo $this->pagination->create_links();?>
    </ul>
</center>
