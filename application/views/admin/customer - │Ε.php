<?php $this->load->view("admin/header");?>
<div id="main">
	<link rel="stylesheet" href="<?php echo base_url("public");?>/css/demo.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url("public");?>/css/zTreeStyle/zTreeStyle.css" type="text/css">
	<script type="text/javascript" src="<?php echo base_url("public");?>/js/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url("public");?>/js/jquery.ztree.core-3.5.js"></script>
	<script type="text/javascript" src="<?php echo base_url("public");?>/js/jquery.ztree.excheck-3.5.js"></script>
	<script type="text/javascript" src="<?php echo base_url("public");?>/js/jquery.ztree.exedit-3.5.js"></script>
	<!--  <script type="text/javascript" src="../../../js/jquery.ztree.excheck-3.5.js"></script>
<script type="text/javascript" src="../../../js/jquery.ztree.exedit-3.5.js"></script>-->
	<SCRIPT type="text/javascript">
		<!--
		var setting = {
			view :{
				addHoverDom: addHoverDom
			},
			edit: {
				enable: true
			},
			data: {
				simpleData: {
					enable: true
				}
			},
			callback: {
				beforeDrag: beforeDrag,
				beforeEditName:beforeEditName,
				beforeRemove:beforeRemove
			}
		};

		

		var zNodes =[
			<?php echo $str;?>
		];

		$(document).ready(function(){
			$.fn.zTree.init($("#treeDemo"), setting, zNodes);
		});
		function beforeDrag(treeId, treeNodes) {
			alert(123123123);
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
		function beforeRemove(treeId, treeNodes){
			if(confirm("确定要删除此信息吗？") == true){
				$.ajax({
					url:"<?php echo site_url('admin/customer/delInfo');?>",
					type: 'post',
					data:{id:treeNodes['id']},
					dataType: 'json',
					success:function(data){
						//console.log(data);
						if (data)
						{
						  if (data.status == 1)
						  {
						  	alert("删除成功");
						  }
						  else
						  {//console.log(data.status);
							alert("删除失败");
						  }
						}
					}
				});
			} 
			//console.log(treeNodes);
		}
		function beforeEditName(treeId, treeNodes){
			if(confirm("确定要修改此信息吗？") == true){
				
				window.location.href="http://localhost/double/index.php/admin/customer/edit/"+treeNodes['id'];
			} 
		}
		
		function setEdit() {
			var zTree = $.fn.zTree.getZTreeObj("treeDemo"),
			remove = $("#remove").attr("checked"),
			rename = $("#rename").attr("checked"),
			removeTitle = $.trim($("#removeTitle").get(0).value),
			renameTitle = $.trim($("#renameTitle").get(0).value);
			zTree.setting.edit.showRemoveBtn = remove;
			zTree.setting.edit.showRenameBtn = rename;
			zTree.setting.edit.removeTitle = removeTitle;
			zTree.setting.edit.renameTitle = renameTitle;
			showCode(['setting.edit.showRemoveBtn = ' + remove, 'setting.edit.showRenameBtn = ' + rename,
				'setting.edit.removeTitle = "' + removeTitle +'"', 'setting.edit.renameTitle = "' + renameTitle + '"']);

			//提交代码
			/*$.ajax({
				url:"<?php echo site_url('home/customer/update');?>",
				type: 'post',
				data:{val:renameTitle},
				dataType: 'json',
				success:function(data){
					//console.log(data);
					if (data)
					{
					  if (data.status == 1)
					  {
					   	alert("修改成功");
					  }
					  else
					  {//console.log(data.status);
						alert("修改失败");
					  }
					}
				}
			});*/
		}
		function showCode(str) {
			var code = $("#code");
			code.empty();
			for (var i=0, l=str.length; i<l; i++) {
				code.append("<li>"+str[i]+"</li>");
			}
		}
		
		$(document).ready(function(){
			$.fn.zTree.init($("#treeDemo"), setting, zNodes);
			setEdit();
			$("#remove").bind("change", setEdit);
			$("#rename").bind("change", setEdit);
			$("#removeTitle").bind("propertychange", setEdit)
			.bind("input", setEdit);
			$("#renameTitle").bind("click","updateCheck()");
		});
		function updateCheck(){
			alert(12312312312);
		}
		//-->
	</SCRIPT>
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
	</style>
	<div class="content_wrap">
		<div class="zTreeDemoBackground left">
			<ul id="treeDemo" class="ztree"></ul>
		</div>
	</div>
</div>
<?php $this->load->view('admin/footer');?>
