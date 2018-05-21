<div class="container" style="border: #999 solid 2px;">
    <div class="sidebar col-md-4 col-sm-4 col-xs-12" style="float:left;">	
        <img src="<?php echo base_url();?>/upload/large.png"/>
    </div>
    
    <div class="content col-md-8 col-sm-8 col-xs-12" style="float:right;">
        <div class="alert alert-info" style="padding-left:30px; margin-top:20px; font-weight:bold; font-size:20px; " role="alert">Chàoo <?php echo $admin_name;?>!!!<br />Bạn xem muốn xem loại báo cáo nào????</div>
        
        <div class="alert alert-warning" style="padding-left:30px; margin-top:20px; font-weight:bold; font-size:16px; " role="alert">
        
            <form action="<?php echo(admin_url('report/inventory'))?>" enctype="multipart/form-data" method="get" class="form-horizontal" role="form" >
                <i class="glyphicon glyphicon-chevron-right"></i>
                <label for="" style="margin-left:5px;"> Báo cáo tồn kho </label>  
                <i class="glyphicon glyphicon-hand-right" style="margin-left:5px;"></i>
                <button class="btn btn-primary " style="margin-left:10px;" type="submit" >Xem báo cáo</button> 
                <br />
            </form>
            
            <br />
            <br />
            
            <form action="<?php echo(admin_url('report/outofstock'))?>" enctype="multipart/form-data" method="get" class="form-horizontal" role="form" >
                <i class="glyphicon glyphicon-chevron-right"></i>
                <label for="" style="margin-left:5px;"> Báo cáo sản phẩm đã hết hàng </label>  
                <i class="glyphicon glyphicon-hand-right" style="margin-left:5px;"></i>
                <button class="btn btn-primary " style="margin-left:10px;" type="submit" >Xem báo cáo</button> 
                <br />
            </form>
            
            <br />
            <br />
            
            <form action="<?php echo(admin_url('report/revenue_month'))?>" enctype="multipart/form-data" method="get" class="form-horizontal" role="form" >
                <i class="glyphicon glyphicon-chevron-right"></i>
                <label for="" style="margin-left:5px;"> Báo cáo doanh thu tháng </label> 
                <select id="catalog_select" name="month" style=" text-align:center;height:30px; margin-top:5px;
                                                                                border-radius:4px;font-size:15px; margin-left:5px;">
                    <?php
                        $i = 1;
                        while($i < 13) {
                    ?>
                    <option style="text-transform:capitalize;" value=<?php echo $i?> ><?php echo $i?></option>
                    <?php
                        $i++;
                        }
                    ?>
                </select>
                <label for="" style="margin-left:5px;"> năm </label> 
                <select id="catalog_select" name="year" style=" text-align:center;height:30px; margin-top:5px;
                                                                                border-radius:4px;font-size:15px; margin-left:5px;">
                    <?php
                        $i = date(Y);
                        while($i > 2009) {
                    ?>
                    <option style="text-transform:capitalize;" value=<?php echo $i?> ><?php echo $i?></option>
                    <?php
                        $i--;
                        }
                    ?>
                </select>
                <i class="glyphicon glyphicon-hand-right" style="margin-left:5px;"></i>
                <button class="btn btn-primary " style="margin-left:10px;" type="submit" >Xem báo cáo</button> 
                <br />
            </form>
            
            <br />
            <br />
            
            <form action="<?php echo(admin_url('report/revenue_day'))?>" enctype="multipart/form-data" method="get" class="form-inline" role="form" >
                <i class="glyphicon glyphicon-chevron-right"></i>
                <label for="" style="margin-left:5px;"> Báo cáo doanh thu ngày </label> 
                <input name="day" type="date" style="text-align:center;height:30px; margin-top:5px;
                                                                                border-radius:4px;font-size:15px;margin-left:5px;">
                <i class="glyphicon glyphicon-hand-right" style="margin-left:5px;"></i>
                <button class="btn btn-primary " style="margin-left:10px;" type="submit" >Xem báo cáo</button> 
                <br />
            </form>
            
            <br />
            
        </div>
        
    </div>
</div>
        
