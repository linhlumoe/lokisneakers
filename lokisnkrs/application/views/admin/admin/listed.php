<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-th-list"></i> DANH SÁCH ADMIN
<span style="float:right; font-size:14px; margin-top:7px;">Tổng số: <?php echo $total;?></span></legend> 
<div class="table-responsive" style="margin-top:8px;">
    <table class="table table-bordered table-hover">
      <tr >
        <th style="text-align:center" class="col-md-1">ID</th>
        <th style="text-align:center" class="col-md-1">Họ tên</th>
        <th style="text-align:center" class="col-md-1">Tên đăng nhập</th>
        <th style="text-align:center" class="col-md-1">Mật khẩu</th>
        <th style="text-align:center" class="col-md-1" colspan="2">Quản lý</th>
      </tr>
      
      <?php foreach($list as $row):?>
      <tr>
        <td style="text-align:center;vertical-align:middle;"><?php echo $row->admin_id;?></td>
        <td style="text-align:center;text-transform:capitalize;vertical-align:middle;"><?php echo $row->admin_name;?></td>
        <td style="text-align:center;"><?php echo $row->username;?></td>
        <td style="text-align:center;"><?php echo $row->password;?></td>
        <td align="center" style="vertical-align:middle;">
        	<a href="<?php echo admin_url('admin/edit_all/'.$row->admin_id); ?>">
            	<img src="<?php echo base_url();?>upload/Edit.png" title="Xoá"/></a></td>
        <td align="center" style="vertical-align:middle;">
        	<a href="<?php echo admin_url('admin/delete/'.$row->admin_id); ?>">
            	<img src="<?php echo base_url();?>upload/Delete.png" title="Xoá"/></a></td>
      </tr>
      <?php endforeach;?>
      
    </table>
</div>
