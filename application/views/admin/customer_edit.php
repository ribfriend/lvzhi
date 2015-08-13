<?php $this->load->view("admin/header");?>
<link rel="stylesheet" href="<?php echo base_url("public");?>/editor/themes/default/default.css" />
<script charset="utf-8" src="<?php echo base_url("public");?>/editor/lang/zh_CN.js"></script>
<div id="main">
	<form action="<?php echo site_url('admin/customer/updateUser');?>" method="post" id="user" class="jNice">
		<h3>修改账户信息</h3>
		<fieldset>
			<p><label>用户名:</label><input type="text" name="username" class="text-long" value="<?echo $info;?>" /></p>
			<p><label>密码:</label><input name="password" type="password" class="text-long" value="" /></p>
			<input type="submit" value="提交" />
		</fieldset>
	</form>
</div>
<script charset="utf-8" src="http://115.28.181.55/public/js/jquery.validate.min.js"></script>
<script charset="utf-8" src="http://115.28.181.55/public/js/jquery.metadata.js"></script>
<script>
$().ready(function() {
	 $("#user").validate({
	        rules: {
		 		username: "required",
		 		password: "required"
	  		},
	        messages: {
		  		username: "必填项",
		  		password: {
	    			required: "必填项",
	    			maxlength: "长度不能大于40个字符"
	   			}
	 		}
	 });
}());

</script>
<?php $this->load->view("admin/footer");?>
