<div class="table-responsive" style="margin-top:8px;">
    <table class="table table-bordered table-hover">
      <tr >
        <th style="text-align:center" class="col-md-1">ID</th>
        <th style="text-align:center" class="col-md-2">Tiêu đề</th>
        <th style="text-align:center" class="col-md-2">Hình ảnh</th>
        <th style="text-align:center" class="col-md-4">Nội dung</th>
        <th style="text-align:center" class="col-md-2">Ngày đăng</th>
        <th style="text-align:center" class="col-md-1" colspan="2">Quản lý</th>
      </tr>
      <?php
	  	  foreach($list as $row):
		 ?>
      <tr>
        <td style="text-align:center;"><?php echo $row->news_id?></td>
        <td style="text-align:center;"><?php echo $row->title?></td>
        <td style="text-align:center;">
        	<img width="80px" height="80px" src="<?php echo base_url();?>upload/news/<?php echo $row->image; ?> "/>
        </td>
        <td style="text-align:justify;"><?php echo $row->content?></td>
        <td style="text-align:center;"><?php echo date("d/m/Y - H:i:s", strtotime($row->date));?></td>
        
        <td align="center">
        	<a href="<?php echo admin_url('news/edit/'.$row->news_id); ?>">
            	<img src="<?php echo base_url();?>upload/Edit.png"/></a></td>
        <td align="center">
        	<a href="<?php echo admin_url('news/delete/'.$row->news_id); ?>">
            	<img src="<?php echo base_url();?>upload/Delete.png"/></a></td>
      </tr>
      <?php
		endforeach;
	  ?>
    </table>
</div>