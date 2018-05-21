<div class="table-responsive" style="margin-top:8px;">
    <table class="table table-bordered table-hover">
      <tr >
        <th style="text-align:center" class="col-md-1">ID</th>
        <th style="text-align:center" class="col-md-2">Tên </th>
        <th style="text-align:center" class="col-md-2">Giới tính</th>
        <th style="text-align:center" class="col-md-4">Ngày sinh</th>
        <th style="text-align:center" class="col-md-4">Số điện thoại</th>
        <th style="text-align:center" class="col-md-2">Địa chỉ</th>
        <th style="text-align:center" class="col-md-2">Email</th>
        <th style="text-align:center" class="col-md-1" colspan="2">Quản lý</th>
      </tr>
      <?php
	  	  foreach($list as $row):
		?>
      <tr>
        <td style="text-align:center;"><?php echo $row->member_id?></td>
        <td style="text-align:center;"><?php echo $row->member_name?></td>
        <td style="text-align:center;"><?php echo ($row->gender==1) ? 'Nam' : 'Nữ';?></td>
        <td style="text-align:center;"><?php echo $row->dob?></td>
        <td style="text-align:center;"><?php echo $row->phone?></td>
        <td style="text-align:center;"><?php echo $row->address?></td>
        <td style="text-align:center;"><?php echo $row->email?></td>
      <td align="center">
        	<a href="<?php echo admin_url('member/edit/'.$row->member_id); ?>">
            	<img src="<?php echo base_url();?>upload/Edit.png"/></a></td>
        <td align="center">
        	<a href="<?php echo admin_url('member/delete/'.$row->member_id); ?>">
            	<img src="<?php echo base_url();?>upload/Delete.png"/></a></td>
      </tr>
      <?php
		endforeach;
	  ?>
    </table>
</div>