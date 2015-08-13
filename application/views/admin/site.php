<?php $this->load->view("admin/header");?>
<div id="main">
	<form action="<?php echo site_url('admin/Configs/index'); ?>" class="jNice" method="post" enctype="multipart/form-data" onsubmit="return check()">
		<h3>站点设置</h3>
		<fieldset>
			<p><label>站点名称:</label><input type="text" class="text-long" name="site_name" value="<?php echo  $site_name?>" /></p>
			<p><label>备案信息:</label><input type="text" class="text-long" name="site_icp" value="<?php echo $site_icp?>" /></p>
			<p><label>版权信息:</label><input type="text" class="text-long" name="site_copy" value="<?php echo $site_copy?>" /></p>
			<p><label>公司电话:</label><input type="text" class="text-long" name="company_tel" value="<?php echo $company_tel?>" /></p>
			<input type="hidden" name="id" value="<?php echo $id;?>" />
			<input type="submit" value="提交" />
		</fieldset>
	</form>
</div>
<?php $this->load->view('admin/footer');?>
		