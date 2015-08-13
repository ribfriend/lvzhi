<?php $this->load->view("admin/header");?>
<div id="main">
	<link rel="stylesheet" href="<?php echo base_url("public");?>/css/demo.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url("public");?>/css/zTreeStyle/zTreeStyle.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url("public");?>/css/datepicker.css" type="text/css">
	<script type="text/javascript" src="<?php echo base_url("public");?>/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url("public");?>/js/jquery.ztree.core-3.5.js"></script>
	<script type="text/javascript" src="<?php echo base_url("public");?>/js/jquery.ztree.excheck-3.5.js"></script>
	<script type="text/javascript" src="<?php echo base_url("public");?>/js/jquery.ztree.exedit-3.5.js"></script>
	<script type="text/javascript" src="<?php echo base_url("public");?>/js/datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url("public");?>/js/My97DatePicker/WdatePicker.js"></script>
	<SCRIPT type="text/javascript">
		
  
</script>
<style type="text/css">
.ztree li span.button.pIcon01_ico_open{margin-right:2px; background: url(<?php echo base_url("public");?>/css/zTreeStyle/img/diy/1_open.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
.ztree li span.button.pIcon01_ico_close{margin-right:2px; background: url(<?php echo base_url("public");?>/css/zTreeStyle/img/diy/1_close.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
.ztree li span.button.pIcon02_ico_open, .ztree li span.button.pIcon02_ico_close{margin-right:2px; background: url(<?php echo base_url("public");?>/css/zTreeStyle/img/diy/2.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
.ztree li span.button.icon01_ico_docu{margin-right:2px; background: url(<?php echo base_url("public");?>/css/zTreeStyle/img/diy/3.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
.ztree li span.button.icon02_ico_docu{margin-right:2px; background: url(<?php echo base_url("public");?>/css/zTreeStyle/img/diy/4.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
.ztree li span.button.icon03_ico_docu{margin-right:2px; background: url(<?php echo base_url("public");?>/css/zTreeStyle/img/diy/5.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
.ztree li span.button.icon04_ico_docu{margin-right:2px; background: url(<?php echo base_url("public");?>/css/zTreeStyle/img/diy/6.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
.ztree li span.button.icon05_ico_docu{margin-right:2px; background: url(<?php echo base_url("public");?>/css/zTreeStyle/img/diy/7.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
.ztree li span.button.icon06_ico_docu{margin-right:2px; background: url(<?php echo base_url("public");?>/css/zTreeStyle/img/diy/8.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
.ztree li span.button.add {margin-left:2px; margin-right: -1px; background-position:-144px 0; vertical-align:top; *vertical-align:middle}
.right_bar{background:#ccc;margin-left:415px;width:500px;height:595px;display:none}
#customerAdd{padding-top:10px;}
#customerAdd .text-long{width: 180px;
height: 25px;
margin-top: 5px;
border: 1px solid #555;}
#customerAdd p label{width: 110px;
display: inline-block;
height: 25px;
line-height: 25px;}
#customerAdd p label.error{color:red;width:140px;font-size:12px;}
#customerAdd .text-long{width:180px;}

/* pagedemo */
.pagedemo{width:700px;margin:0 auto;text-align:left;}
.pagedemo h1{font-size:21px;height:47px;line-height:47px;text-transform:uppercase;}
.tabsContent{border:1px solid #ccc;width:698px;overflow:hidden;}
.tab{padding:16px;display:block;}
.tab h2{font-weight:bold;font-size:16px;}
.tab h3{font-weight:bold;font-size:14px;margin-top:20px;}
.tab p{margin-top:16px;clear:both;}
.tab ul{margin-top:16px;list-style:disc;}
.tab li{margin:10px 0 0 35px;}
.tab a{color:#8FB0CF;}
.tab strong{font-weight:bold;}
.tab pre{font-size:11px;margin-top:20px;width:668px;overflow:auto;clear:both;}
.tab table{width:100%;}
.tab table td{padding:6px 10px 6px 0;vertical-align:top;}

input.deadline{border:1px solid #999;padding:4px;border-bottom-color:#ddd;border-right-color:#ddd;width:165px;}
#widget{position:relative;}
#widgetField{width:290px;height:26px;background:url(images/field.png);overflow:hidden;position:relative;}
#widgetField a{display:block;position:absolute;width:26px;height:26px;top:0;right:0;text-decoration:none;text-indent:-3000px;}
#widgetField span{font-size:12px;font-weight:bold;color:#000;position:absolute;top:0;height:26px;line-height:26px;left:5px;width:250px;text-align:center;}
#widgetCalendar{position:absolute;top:26px;left:0;height:0px;overflow:hidden;width:588px;background:#B9B9B9;}

</style>
	<div class="content_wrap">
		<div class="zTreeDemoBackground left">
			<ul id="agentTree" class="ztree"></ul>
		</div>
	</div>
</div>
<div class="right_bar"  id="right_bar">
<form action="<?php echo site_url('admin/customer/update');?>"  method="post"   id="customerAdd" class="jNice">
		<h3 id="edit_agent">编辑分销商信息</h3>
		<fieldset>
			<p style="height:30px;"><label stlye="line-height:30px;">授权编号:</label><input type="text"  name="auth_id"  class="text-long"/><span id="auth_tips" style="font-size:10px;color:red;"></span></p>
			<p><label>上级经销商:</label><input value="<?php // echo $info['contact']?>" style="background:#999;" disabled  type="text" name="parent_name" class="text-long"/></p>
			<p><label>代理渠道:</label>
				<select name="chanel" style="margin-left:-5px;">
					<option value ="天猫">天猫</option>
					<option value ="淘宝">淘宝</option>
					<option value="微信">微信</option>
					<option value="京东">京东</option>
					<option value="亚马逊">亚马逊</option>
					<option value="其他">其他</option>
				</select>
			</p>	
			<p><label>渠道信息:</label><input name="chanel_id" type="text" class="text-long "/></p>
			<p><label>联系人姓名:</label><input name="contact" type="text" class="text-long  "/></p>
			<p><label>联系方式:</label><input name="telphone" type="text" class="text-long  "/></p>
			<p><label>所在地:</label><input name="address" type="text" class="text-long "/></p>
			<!-- <p><label>代理截止日期:</label><input name="deadline" type="text" class="text-long"/></p> -->
			<p><label>代理截止日期:</label><input class="inputDate text-long" id="deadline"  type="text" name="deadline" value="2012-06-14"  onClick="WdatePicker()" /></p>

			<p><label>是否授权:</label>
				<input type="radio" value='1' name="is_auth" />是
				<input type="radio" value='0' name="is_auth" />否
			</p>
			<p><label>备注信息:</label><input name="remark" type="text" class="text-long"/></p>
			<p><label>身份证号:</label><input name="user_num" type="text" class="text-long  "/></p>
			<p><label>代理商等级:</label><input name="level" type="text" class="text-long "/></p>
			<input type="hidden" name="id" value="" />
			<input type="hidden" name="parent_id" value="" />
			<input type="submit" value="修改"  style="margin: 20px 0 0 10px;width: 120px;height: 35px;" />
		</fieldset>
	</form>
</div>
<?php $this->load->view('admin/footer');?>
<script charset="utf-8" src="<?php echo base_url("public");?>/js/jquery.validate.min.js"></script>
<script charset="utf-8" src="<?php echo base_url("public");?>/js/jquery.metadata.js"></script>
<script type="text/javascript">
$('#deadline').DatePicker({
	format:'m/d/Y',
	date: $('#deadline').val(),
	current: $('#deadline').val(),
	starts: 1,
	position: 'r',
	onBeforeShow: function(){
		$('#deadline').DatePickerSetDate($('#deadline').val(), true);
	},
	onChange: function(formated, dates){
		$('#deadline').val(formated);
		$('#deadline').DatePickerHide();
	}
});
$().ready(function() {
	 $("#customerAdd").validate({
			submitHandler:function(form){
				if(temp == ($("input[name='auth_id']").val())){
					if(confirm("确定要修改此信息吗？")){
						form.submit(); 
					}
					else{
						return;
					}
				}else{
					get_check_auth_id($("input[name='auth_id']").val(),form);
				}
			},
	        rules: {
		 		auth_id:  {
	    			required: true,
	    			minlength:3
	   			},
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
		  		auth_id: {
	    			required: "必填项",
	    			minlength: "长度至少大于两个字符",
					remote:'该授权编码已被采用！'
	   			},
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
	   			deadline:{
	    			required: "必填项"
	   			},
	   			user_num:{
	    			required: "必填项",
	    			maxlength: "长度不能大于18个字符",
					number:"请输入数字"
	   			},
	   			level:"必填项"
   			
	 		}
	 });
});
function get_check_auth_id(value,form){
	if(!value){
		$("#auth_tips").html("该授权编码不能为空！");
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
				} else {
					$("#auth_tips").html("");
					form.submit();
				}
			}
	});
}
var setting = {
		view: {
			addHoverDom: addHoverDom,
			removeHoverDom: removeHoverDom,
			selectedMulti: false
			
		},
		edit: {
			enable: true,
			removeTitle:setRemoveTitle,
			renameTitle:'编辑'
		},
		data: {
			simpleData: {
				enable: true
			}
		},
		callback: {
			beforeDrag: beforeDrag,
			beforeEditName:beforeEditName,
			beforeRemove:beforeRemove,
			onRemove: zTreeOnRemove,
			beforeMouseDown: zTreeBeforeMouseDown
		}
	};
	var zNodes =[
		<?php echo $str;?>
	];

	$(document).ready(function(){
		$.fn.zTree.init($("#agentTree"), setting, zNodes);
	});
	function beforeDrag(treeId, treeNodes) {
		return false;
	}
	var newCount = 1;
	function addHoverDom(treeId,treeNodes){
		var sObj = $("#" + treeNode.tId + "_span");
		if (treeNode.editNameFlag || $("#addBtn_"+treeNode.tId).length>0) return;
		var addStr = "<span class='button add' id='addBtn_" + treeNode.tId
			+ "' title='add node' onfocus='this.blur();'></span>";
		sObj.after(addStr);
		var btn = $("#addBtn_"+treeNode.tId);
		if (btn) btn.bind("click", function(){
			var zTree = $.fn.zTree.getZTreeObj("treeDemo");
			zTree.addNodes(treeNode, {id:(100 + newCount), pId:treeNode.id, name:"new node" + (newCount++)});
			return false;
		});
	}
	function zTreeOnRemove(event, treeId, treeNode) {
		//console.log(treeNodes);
		alert('删除成功');
	}
	function zTreeBeforeMouseDown(treeId, treeNode) {
		edit_jq(treeNode['id']);
	};
	function beforeRemove(treeId, treeNodes){
		if(treeNodes.isParent){
			treeNodes.open = false;
			//console.log(treeNodes);
			return false;
		}
		if(confirm("确定要删除此信息吗？") == true){
			$.ajax({
				url:"<?php echo site_url('admin/customer/delInfo');?>",
				type: 'post',
				data:{id:treeNodes['id']},
				dataType: 'json',
				success:function(data){
					if (data)
					{
					  if (data.status == 1)
					  {
					  	alert("删除成功");
					  }
					  else {
						alert("删除失败");
					  }
					}
				}
			});
		} else{
			return false;
		}
		//console.log(treeNodes);
	}
	function beforeEditName(treeId, treeNodes){
		edit_jq(treeNodes['id']);
		return false;
		if(confirm("确定要修改此信息吗？") == true){
			window.location.href="<?php echo site_url('admin/customer/edit/');?>"+treeNodes['id'];
		} 
	}
	function setRemoveTitle(treeId, treeNode) {
		return treeNode.isParent ? "不能删除代理商":"删除";
	}
	
	function edit_jq(id){
	$("#auth_tips").html("");
	    $.ajax({
			url:"<?php echo site_url('admin/customer/edit');?>",
			type: 'post',
			data:{id:id},
			dataType: 'json',
			success:function(data){
				$("input[name='auth_id']").val(data.auth_id);
				temp = data.auth_id;
				$("input[name='parent_name']").val(data.parent_name);
				$("select[name='chanel'] > option").each(function(){
					if($(this).val() == data.chanel){
						$(this).attr("selected","selected");
					}
				});
				//$("select[name='chanel']").val(data.chanel);
				
				$("input[name='chanel_id']").val(data.chanel_id);
				$("input[name='contact']").val(data.contact);
				$("input[name='telphone']").val(data.telphone);
				$("input[name='address']").val(data.address);
				$("input[name='deadline']").val(data.deadline.substr(0,10));
				
				//console.log(data);
				if(data.is_auth == 0){
					$("input[name='is_auth']:eq(1)").attr("checked", true);
				}else{
					$("input[name='is_auth']:eq(0)").attr("checked", true);
				}
				
				$("input[name='remark']").val(data.remark);
				$("input[name='user_num']").val(data.user_num);
				$("input[name='level']").val(data.level);
				$("input[name='id']").val(data.id);
				$("input[name='parent_id']").val(data.parent_id);
				$('#right_bar').show();
				//console.log(data.id);
				
			}
		});
	  }   
	function setEdit(treeId, treeNode) {
		var zTree = $.fn.zTree.getZTreeObj("treeDemo"),
			remove = $("#remove").attr("checked"),
			rename = $("#rename").attr("checked"),
			removeTitle = $.trim($("#removeTitle").get(0).value),
			renameTitle = $.trim($("#renameTitle").get(0).value);
			zTree.setting.edit.showRemoveBtn = remove;
			zTree.setting.edit.showRenameBtn = rename;
			zTree.setting.edit.removeTitle = removeTitle;
			zTree.setting.edit.renameTitle = renameTitle;
		if(treeNode.isParent){
			zTree.setEditable(false);
		}
		showCode(['setting.edit.showRemoveBtn = ' + remove, 'setting.edit.showRenameBtn = ' + rename,
			'setting.edit.removeTitle = "' + removeTitle +'"', 'setting.edit.renameTitle = "' + renameTitle + '"']);
	}
	function showCode(str) {
		var code = $("#code");
		code.empty();
		for (var i=0, l=str.length; i<l; i++) {
			code.append("<li>"+str[i]+"</li>");
		}
	}
	
	var newCount = 1;
	function addHoverDom(treeId, treeNode) {
		var sObj = $("#" + treeNode.tId + "_span");
		if (treeNode.editNameFlag || $("#addBtn_"+treeNode.tId).length>0) return;
		var addStr = "<span class='button add' id='addBtn_" + treeNode.tId
			+ "' title='新增' onfocus='this.blur();'></span>";
		sObj.after(addStr);
		var btn = $("#addBtn_"+treeNode.tId);
		if (btn) btn.bind("click", function(){
			//alert(treeNode['id']);
		//var zTree = $.fn.zTree.getZTreeObj("treeDemo");
		//zTree.addNodes(treeNode, {id:(100 + newCount), pId:treeNode.id, name:"new node" + (newCount++)});
		//return false;
			if(confirm("确定要添加子经销商吗？") == true){
				window.location.href="<?php echo site_url('admin/customer/add/');?>"+"/"+treeNode['id'];
			}
		});
	};
	function removeHoverDom(treeId, treeNode) {
		$("#addBtn_"+treeNode.tId).unbind().remove();
	};
	$(document).ready(function(){
		$.fn.zTree.init($("#treeDemo"), setting, zNodes);
		setEdit();
		$("#remove").bind("change", setEdit);
		$("#rename").bind("change", setEdit);
		$("#removeTitle").bind("propertychange", setEdit)
		.bind("input", setEdit);
		$("#renameTitle").bind("click","updateCheck()");
	});
	 
</script>
