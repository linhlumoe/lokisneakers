<?php if(isset($message) && $message):?>
<div class="alert alert-info alert-dismissable col-md-12 col-sm-12 col-xs-12" role="alert" align="right;">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<img src="<?php echo base_url();?>upload/Twitter_32.png" /><strong> Thông báo: </strong><?php echo $message;?>
</div>
<?php endif;?>