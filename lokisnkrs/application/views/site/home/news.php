<div class="row">
    <h3 align="center" class="col-md-12 col-sm-12 col-xs-12"><a href="#"><strong>TIN TỨC</strong></a></h3>
    <div class="row" >
        
    </div>
    <br />
	<?php foreach($news_list as $row):
	?>
    <div class="owl-item col-md-12 col-sm-12 col-xs-12"><div class="post-slide">
    <div class="row">
        <div class="post-img col-md-4 col-sm-4 col-xs-4">
        	<a href="#"><img src="<?php echo base_url('upload/news/'.$row->image);?>" style="height:200px;"> </a>
        </div> 
        <h2 class="post-title col-md-8 col-sm-8 col-xs-8" > <a href="#" style="font-size:24px;"><?php echo $row->title?></a> </h2> 
        <span class="col-md-8 col-sm-8 col-xs-8"><h4>Ngày đăng: <?php echo date("d/m/Y - H:i:s", strtotime($row->date));?></h4></span>
        </div>
    </div></div>
    <?php
		endforeach;
	?>       
    <br/>
    <br/>
</div>
<center>
	<ul class = "pagination">
		<?php echo $this->pagination->create_links();?>
    </ul>
</center>