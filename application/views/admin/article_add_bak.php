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
			<p><label>文章内容:</label><textarea name="article_content" id="article_content" rows="10" cols="10"></textarea></p>
			<p><label>作者:</label><input name="article_author" type="text" class="text-long" value="管理员"/></p>
			<p>
				<label>展示位置:</label>
				<input type="checkbox" name="is_footer" id="is_footer" value="1" onchange="open_footer_sort()"/>底部导航
				<input type="checkbox" name="is_reg" id="is_reg" value="1" onchange="open_reg_sort()" />注册
			</p>
			<p>
				<label>文章排序:</label>
				<span id="is_footer_sort" style="display:none;">底部导航排序:<input type="text" name="footer_sort" value="20"/></span>
				<span id="is_reg_sort" style="display:none;">注册排序:<input type="text" name="reg_sort"  value="20"/></span>
			</p>
			<input type="submit" value="提交" />
		</fieldset>
	</form>
</div>
<script type="text/javascript" language="javascript">
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="article_content"]', {
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