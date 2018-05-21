<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
 <script>tinymce.init({ selector: 'textarea' });</script>
 
<legend style="margin-top:13px; font-weight:bold;"><i class="glyphicon glyphicon-plus-sign"></i> THÊM TIN TỨC</legend> 
<form action="<?php echo admin_url('news/insert')?>" enctype="multipart/form-data" method="post" class="form" role="form" >
    <label for="">Tiêu đề</label> 
    <input class="form-control" name="txt_title" type="text" style="margin-top:10px;" required="required">
	<div name="name_error" style="font-size:12px; color:#F00;"><?php echo form_error('txt_title');?></div>
    <label for="" style="margin-top:10px;">Nội dung</label> 
    <textarea id = "txt_content" name="txt_content" required=""
    							 style="margin-top:10px; height:250px;"> </textarea>
    <div name="name_error" style="font-size:12px; color:#F00;"><?php echo form_error('txt_content');?></div>
    <label for="" style="margin-top:10px;">Hình ảnh</label> 
    <input name="file_image" type="file" style="margin-top:10px;" required="required">

    <button class="btn btn-primary col-xs-12 col-md-12 col-sm-12" type="submit" name="btn_insert" style="margin-top:18px;">Thêm</button> 
	<br />
</form>  
