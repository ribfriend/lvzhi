<?php $this->load->view("admin/header");?>
<div id="main">
	<h3>文章列表
		<span style="float:right;">
			<a href="<?php echo site_url("admin/article/add");?>" style="color:#55a34a;text-decoration:none;">添加文章</a>
		</span>
	</h3>
	<table  cellpadding="0" cellspacing="0" class="table_css">
		<thead>
			<tr>
				<td>ID</td><td>标题</td><td>创建时间</td><td>是否推送</td><td>发送状态</td><td>操作</td>
			</tr>
		</thead>
		<tbody>
		<?php
			if($contentList){
				foreach($contentList as $key => $val){
					if($val['is_batch'] == 1){
						$batchStatus = '推送';
					} else {
						$batchStatus = '否';
					}
					if($val['status'] == 1){
						$Status = '发送成功';
					} else {
						$Status = '发送失败';
					}
					echo "<tr><td>".$val['id']."</td><td>".$val['title']."</td><td>".date("Y-m-d H:i:s",$val['createtime'])."</td>
					<td>".$batchStatus."</td><td>".$Status."</td>
					<td>".
					anchor('admin/article/edit/'.$val['id'], '编辑')."&nbsp;&nbsp;".
						anchor('admin/article/del/'.$val['id'], '删除')."</td>
					</tr>";
				}
			} else {
				echo "<tr><td colspan='6' align='center'>还未发布任何文章<a href='".site_url("/admin/article/add")."'>点击新增</a></td></tr>";
			}
		?>
		</tbody>
	</table>
	<div class="clear"></div>
	<?php echo $page;?>
</div>
<?php $this->load->view('admin/footer');?>
