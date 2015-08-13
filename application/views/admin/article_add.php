<?php $this->load->view("admin/header");?>
<script type="text/javascript" src="<?php echo base_url("public");?>/js/My97DatePicker/WdatePicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url("public");?>/editor/themes/default/default.css" />
<script src="<?php echo base_url("public");?>/editor/kindeditor-all-min.js"></script>
<script charset="utf-8" src="<?php echo base_url("public");?>/editor/lang/zh_CN.js"></script>
<div id="main">
	<form action="<?php echo site_url('admin/article/insert');?>" method="post" class="jNice">
		<h3>添加文章</h3>
		<fieldset>
			<p><label>文章标题:</label><input type="text" name="article_name" class="text-long" /></p>
			<p><label>发布时间:</label><input type="text" name="insert_time" class="text-long" onClick="WdatePicker()"/></p>
			<p><label>文章简介:</label><textarea name="description" id="description" rows="10" cols="10"></textarea></p>
			<p><label>文章内容:</label><textarea name="content" id="article_content" rows="10" cols="10"></textarea></p>
			<input type="submit" value="提交" />
		</fieldset>
	</form>
</div>
<script type="text/javascript" language="javascript">
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
			resizeType : 1,
			allowPreviewEmoticons : false,
			allowImageUpload : false,
			items : [
				'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
				'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
				'insertunorderedlist', '|', 'emoticons']
		});
	});
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="description"]', {
			resizeType : 1,
			allowPreviewEmoticons : false,
			allowImageUpload : false,
			items : [
				'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
				'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
				'insertunorderedlist', '|', 'emoticons']
		});
	});
</script>
<?php $this->load->view("admin/footer");?>