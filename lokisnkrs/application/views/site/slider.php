<?php ob_start(); ?><div class="container">
    <div class="row">
        <div id="carousel-example-generic" class="carousel slide " data-ride="carousel" >
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>              
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <a href="#"><img src="<?php echo base_url();?>/upload/slider1.jpg" alt="Adidas" style="height:500px; width:1200px;"></a>
                    <div class="carousel-caption"><h3>NEW ARRIVAL</h3></div>
                </div>
                <div class="item">
                  <a href="#"><img src="<?php echo base_url();?>/upload/slider2.jpg" alt="Asics" style="height:500px; width:1200px;"></a>
                  <div class="carousel-caption"><h3>NEW ARRIVAL</h3></div>
                </div>
                <div class="item">
                  <a href="#"><img src="<?php echo base_url();?>/upload/slider3.jpg" alt="Converse" style="height:500px; width:1200px;"></a>
                  <div class="carousel-caption"><h3>NEW ARRIVAL</h3></div>
                </div>
            </div>              
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span></a></div></div></div>
<?php ob_end_flush(); ?>