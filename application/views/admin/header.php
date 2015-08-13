<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台</title>

<!-- CSS -->
<link href="<?php echo base_url("public");?>/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url("public");?>/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url("public");?>/css/ie7.css" /><![endif]-->

<!-- JavaScripts-->
<script type="text/javascript" src="<?php echo base_url("public");?>/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url("public");?>/js/jNice.js"></script>
</head>

<body>
	<div id="wrapper">
    	<!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
    	<h1>后台管理</h1>     
        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
        <ul id="mainNav">
            <li><a href="<?php echo site_url("admin/customer/index");?>">分销商管理</a></li>
		    <li><a href="<?php echo site_url('/admin/customer/adds')?>">添加一级分销商</a></li>
			<li><a href="<?php echo site_url('/admin/customer/editUser')?>">修改账户</a></li>
			<li class="logout"><a href="<?php echo site_url('admin/index/logout'); ?>">退出</a></li>
        </ul>
        <!-- // #end mainNav -->
		<div id="containerHolder">
			<div id="container">
				<div id="sidebar">
                	<ul class="sideNav">
						<!--选中 class="active"--> 
						
                    </ul>
                    <!-- // .sideNav -->
                </div>