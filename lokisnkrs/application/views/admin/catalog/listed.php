<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-th-list"></i> DANH SÁCH LOẠI SẢN PHẨM
<span style="float:right; font-size:14px; margin-top:7px;">Tổng số: <?php echo $total;?></span></legend> 
<div class="table-responsive" style="margin-top:8px;">
    <table class="table table-bordered table-hover">
      <tr >
        <th style="text-align:center">ID</th>
        <th style="text-align:center">Tên loại sản phẩm</th>
        <th style="text-align:center">Loại sản phẩm cha</th>
        <th style="text-align:center" colspan="2">Quản lý</th>
      </tr>
      
      <?php foreach($list as $row):?>
      <tr>
        <td style="text-align:center;"><?php echo $row->catalog_id ?></td>
        <td style="text-align:center;text-transform:capitalize;"><?php echo $row->catalog_name ?></td>
        <td style="text-align:center;"><?php echo $row->parent_id ?></td>
        <td align="center">
        	<a href="<?php echo admin_url('catalog/edit/'.$row->catalog_id); ?>">
            	<img src="<?php echo base_url();?>upload/Edit.png" title="Sửa"/></a></td>
        <td align="center">
        	<a href="<?php echo admin_url('catalog/delete/'.$row->catalog_id); ?>">
            	<img src="<?php echo base_url();?>upload/Delete.png" title="Xoá"/></a></td>
      </tr>
      <?php endforeach;?>
    </table>
</div>
