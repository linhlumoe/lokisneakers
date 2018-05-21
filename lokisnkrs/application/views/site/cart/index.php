<h2 class="text-center" style="margin-top:35px;"><strong>GIỎ HÀNG CỦA BẠN</strong></h2><br/>
<?php if ($total_items > 0):?>
<h4 class="text-center" style="margin-top:0px;">Có <strong><?php echo $total_items ?></strong> sản phẩm</h4><br/>
<div class="table-responsive" style="margin-top:20px;"> 
    <table id="cart" class="table table-hover table-condensed" style="font-size:15px;"> 
        <thead> 
            <tr> 
                <th style="width:50%">Tên sản phẩm</th>
                <th style="width:10%">Size</th> 
                <th style="width:12%">Giá</th> 
                <th style="width:10%">Số lượng</th> 
                <th style="width:15%" class="text-center">Thành tiền</th> 
                <th style="width:3%"> </th> 
            </tr> 
        </thead>
        
        <tbody >
        <?php $total_amount = 0;
			foreach ($cart as $row): 
				$total_amount += $row['subtotal'];
		?>
        
            <tr>
            <td data-th="Product" > 
                <div class="row" > 
                    <div class="col-sm-2 hidden-xs">
                        <img src="<?php echo base_url('upload/product/'.$row['image']);?>" class="img-responsive" width="100"></div>
                    <div class="col-sm-10" ><h4 class="nomargin" style=" margin-top:20px;"><?php echo $row['name']; ?></h4></div> 
                </div> 
            </td> 
            <td data-th="Size" style=" vertical-align:middle;"><?php echo $row['size'] ?></td> 
            <td data-th="Price" style=" vertical-align:middle;"><?php echo number_format($row['price'],0)?></td> 
            <form method="post" action="<?php echo base_url('cart/update/'.$row['rowid']) ?>">
            <td data-th="Quantity" style=" vertical-align:middle;">
                <input class="form-control text-center" value="<?php echo $row['qty'] ?>" type="number" min="1" name="current_qty"/></td> 
            <td data-th="Subtotal" class="text-center" style=" vertical-align:middle;"><?php echo number_format($row['subtotal'], 0)?></td> 
            <td class="actions" data-th="" style=" vertical-align:middle;">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa fa-refresh"></i></button>
                <a href="<?php echo base_url('cart/delete/'.$row['rowid'])?>" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash-o"></i></a>
            </td> 
            </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
        
        <tfoot>
            <tr> 
                <td><a href="#" class="btn btn-success"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a></td> 
                <td colspan="1" class="hidden-xs"> </td> 
                <td colspan="2" class="hidden-xs text-center"><strong>Tổng tiền: <b style="color:#F00; font-size:18px;"><?php echo number_format($total_amount,0)?></b> vnđ</strong></td> 
                <td><a href="<?php echo base_url('order/checkout')?>" class="btn btn-success">Tiến hành thanh toán <i class="fa fa-angle-right"></i></a></td>
            </tr>
    
        </tfoot> 
    </table>
</div>
<?php else: ?>
<h4 class="text-center" style="margin-top:0px;">Không có sản phẩm nào trong giỏ hàng</h4><br/>
<center><a href="<?php echo base_url('product/all_product')?>" class="btn btn-success"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a></center>
<?php endif; ?>




