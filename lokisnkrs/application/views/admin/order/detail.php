<div class="container" style="border: #999 solid 2px;">
	<br />
	<?php
		$this->load->view('admin/message');
	?>
    <div class="sidebar col-md-6 col-sm-6 col-xs-12" style="float:left; border-right: #999 solid 2px;">	
        <?php
			$this->load->view('admin/order/edit');
        ?>
    </div>
    <div class="content col-md-6 col-sm-6 col-xs-12" style="float:right; ">
        <?php
            $this->load->view('admin/order/listed_dt');
        ?>			
    </div>   
</div>   
