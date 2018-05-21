<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Loki Sneaker</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="<?php echo public_url();?>bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo public_url();?>bootstrap/css/bootstrap-theme.min.css"/> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo public_url();?>css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo public_url();?>css/cart_style.css"/>
    </head>
    
    <body> 
    	<div class="main">
			<?php $this->load->view('site/header.php');?>
            <?php $this->load->view('site/navigation.php');?>
            <?php $this->load->view('site/slider.php');?>
            <div id="wrapper">
                <div class="container">
                    <div class="row">  
                    	<div class="sidebar col-md-2 col-sm-2 col-xs-12" style="float:left;">
                        	<?php $this->load->view('site/catalog.php', $this->data);?>
                        </div> 
                        <div class="content col-md-10 col-sm-10 col-xs-12" style="float:right;">
                        	<br />
            				<?php $this->load->view('site/message', $this->data);?>
							<?php $this->load->view($temp, $this->data);?>
                        </div>        
                          
                    </div>
                </div><!--container-->
            </div><!--wrapper-->
            <?php $this->load->view('site/footer.php');?>
    	</div><!--MAIN : END -->
        
    	<p>&nbsp;</p>
   	<p>&nbsp;</p>
    <script src="<?php echo public_url();?>bootstrap/js/jquery-3.2.0.min.js"></script>
    <script src="<?php echo public_url();?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo public_url();?>js/script.js"></script>
    </body>
</html>

