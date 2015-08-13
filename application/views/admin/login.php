<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>管理后台</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin_login');?>/common.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/admin_login");?>/login.css" media="screen" />
		<link id="color" rel="stylesheet" type="text/css" href="<?php echo base_url("public/admin_login");?>/default.css" />
		<!-- scripts -->
	 
	</head>
	<body>
		<div id="login">
			<!-- login -->
			<div class="title">
				<h5>管理后台</h5>
				<div class="corner tl"></div>
				<div class="corner tr"></div>
			</div>
			<div class="inner">
				<form action="<?php echo site_url('admin/index/doLogin'); ?>" method="post">
				<div class="form">
					<!-- fields -->
					<div class="fields">
						<div class="field">
							<div class="label">
								<label for="username">用户名:</label>
							</div>
							<div class="input">
								<input type="text" id="username" name="username" size="40" value="" class="focus" />
							</div>
						</div>
						<div class="field">
							<div class="label">
								<label for="password">密码:</label>
							</div>
							<div class="input">
								<input type="password" id="password" name="password" size="40" value="" class="focus" />
							</div>
						</div>
						
						
						 
						<div class="buttons">
							<input type="submit"  class="ui-state-default" value="登 录" />
						</div>
					</div>
					<!-- end fields -->
					
				</div>
				</form>
			</div>
			<!-- end login -->
			 
		</div>
	</body>
</html>