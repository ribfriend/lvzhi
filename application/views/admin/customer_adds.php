<?php $this->load->view("admin/header");?>
<link rel="stylesheet" href="<?php echo base_url("public");?>/editor/themes/default/default.css" />
<script charset="utf-8" src="<?php echo base_url("public");?>/editor/lang/zh_CN.js"></script>
<script type="text/javascript" src="<?php echo base_url("public");?>/js/My97DatePicker/WdatePicker.js"></script>
<div id="main">
	<form action="<?php echo site_url('admin/customer/insert');?>" method="post" class="jNice" id="customerInsert">
		<h3>添加一级分销商</h3>
		<fieldset>
			<p><label>授权编号:</label><input type="text" name="auth_id" class="text-long" onblur="get_check_auth_id(this.value);"/><span id="auth_tips" style="font-size:10px;"></span></p>
			<p><label>上级经销商:</label>无</p>
			<p><label>代理渠道:</label>
             <!-- <input name="chanel" type="text" class="text-long"/> -->
             <select name="chanel">
             <option value ="天猫">天猫</option>
             <option value ="淘宝">淘宝</option>
             <option value="微信">微信</option>
             <option value="京东">京东</option>
             <option value="亚马逊">亚马逊</option>
             <option value="其他">其他</option>
             </select>
             </p>	
			<p><label>渠道信息:</label><input name="chanel_id" type="text" class="text-long"/></p>
			<p><label>联系人姓名:</label><input name="contact" type="text" class="text-long"/></p>
			<p><label>联系方式:</label><input name="telphone" type="text" class="text-long"/></p>
			<p><label>所在地:</label><input name="address" type="text" class="text-long"/></p>
			<p><label>代理截止日期:</label><input name="deadline" type="text"  onClick="WdatePicker()"  class="text-long"/></p>
			<p><label>是否授权:</label>
				<input type="radio" value='1' name="is_auth" checked="checked" />是
				<input type="radio" value='0' name="is_auth"/>否
			</p>
			<p><label>备注信息:</label><input name="remark" type="text" class="text-long"/></p>
			<p><label>身份证号:</label><input name="user_num" type="text" class="text-long"/></p>
			<p><label>代理商等级:</label><input name="level" type="text" class="text-long"/></p> 
			<input type="submit" value="提交" />
		</fieldset>
	</form>
</div>
<script charset="utf-8" src="http://115.28.181.55/public/js/jquery.validate.min.js"></script>
<script charset="utf-8" src="http://115.28.181.55/public/js/jquery.metadata.js"></script>
<script type="text/javascript">
function get_check_auth_id(value,form){
	if(!value){
		$("#auth_tips").html("该授权编码不能为空");
		return;
	}
	$.ajax({
			url:"<?php echo site_url('admin/customer/check_auth_id');?>",
			type: 'post',
			data:{id:value},
			dataType: 'json',
			success:function(data){
				if(data > 0){
					$("#auth_tips").html("该授权编码已采用");
					temp = data;
				} else {
					$("#auth_tips").html("");
					form.submit();
				}
			}
	});
}
$().ready(function() {
	 $("#customerInsert").validate({
			submitHandler:function(form){
				if(temp == 0 ){
					form.submit();
				}else{
					get_check_auth_id($("input[name='auth_id']").val(),form);
				}
			},
	        rules: {
		 		chanel: "required",
		 		chanel_id: {
	    			required: true,
	    			maxlength:40,
	   			},
	   			contact:{
	    			required: true,
	    			maxlength:15,
	   			},
	   			telphone:{
	    			required: true,
	    			maxlength:20,
	    			number:true
	   			},
	   			address:"required",
	   			deadline:{
	    			required:true
	   			},
	   			user_num:{
	    			required:true,
	    			maxlength:18,
					number:true
	   			},
	   			level:"required"
	  		},
	        messages: {
		  		chanel: "必填项",
		  		chanel_id: {
	    			required: "必填项",
	    			maxlength: "长度不能大于40个字符"
	   			},
	   			contact: {
	    			required: "必填项",
	    			maxlength: "长度不能大于10个字符"
	   			},
	   			telphone: {
	    			required: "必填项",
	    			maxlength: "长度不能大于10个字符",
	    			number:"请输入数字"
	   			},
	   			address:"必填项",
	   			deadline:"必填项",
	   			user_num:{
	    			required: "必填项",
	    			maxlength: "长度不能大于18个字符",
					number:"请输入数字"					
	   			},
	   			level:"必填项"
   			
	 		}
	 });
}());
</script>
<?php $this->load->view("admin/footer");?>
