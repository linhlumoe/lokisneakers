<div class="container" style="border: #999 solid 2px;">
	<br />
	<?php
		$this->load->view('admin/message');
	?>
    <div class="sidebar col-md-4 col-sm-4 col-xs-12" style="float:left;">	
        <?php
            $this->load->view($tmp);
        ?>
    </div>
    <div class="content col-md-8 col-sm-8 col-xs-12" style="float:right; border-left: #999 solid 2px;">
        <?php
            $this->load->view('admin/product/listed');
        ?>			
    </div>   
</div>     
