<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://115.28.181.55/public/js/jquery-1.10.2.min.js"></script>
<title>代理商查询</title>
<link  rel="stylesheet" type="text/css" href="http://520hbs.com/style.css"/>
</head>
<body>
<div class="agentSearch">
	<input type="text" autocomplete="off" class="search-text-input" name="agentCode" id="agentCode" placeholder="输入代理商家授权号">
	<span><input type="button" class="search-button" value="查询" id="agentCode_submit" onclick="validate();"></span>
	 <label class="text-info">输入缠绵鸟波波小姐代理商授权编号，验证真伪</label>
</div>
<div class="showmessage acheck-message" id="showMessage"></div>
<!--<form action="http://localhost/test/image.php" method="post">-->
<!--<input type="text"  id="agentCode" name="code" />-->
<!--<input type="submit" value="查询" onclick = "checkproduct();">-->
<!--</form>-->
</body>
</html>
<script type="text/javascript" language="javascript">
function validate(){  
    var reg = new RegExp("^[a-zA-Z0-9][a-zA-Z0-9_]{1,512}$");  
    var val = $("#agentCode").val(); 
    if($("#agentCode").val()== ''){
		alert('输入的信息不能为空');
		return;
	} 
 	if(!reg.test(val)){  
     	alert("请输入数字和字母，不能单独为0且长度不能超过512个字符!");  
     	return;
 	}   
 	checkproduct();
}  
function checkproduct(){
    jQuery.ajax({
        type: "get",
        url: ("<?php echo base_url()."/test/image.php" ?>"),
        dataType: "true",
        data: "code="+$("#agentCode").val(),
        complete:function(obj){
			//console.log(obj.responseText);
			if(obj.responseText == 1){
				$('#showMessage').html('代理商授权码不存在！');
				$("#showMessage").show();
				return;
			}else if(obj.responseText == 2){
				$('#showMessage').html('此代理商可能由于违规被取消授权！');
				$("#showMessage").show();
				return;
			}else if(obj.responseText == 3){
				$('#showMessage').html('此代理商授权时间已到，已失效！');
				$("#showMessage").show();
				return;
			}
        	else if(obj!=''){
	        	document.getElementById("showMessage").innerHTML=obj.responseText;
	        	$("#showMessage").show();
	        	//document.getElementById("showMessageLink").innerHTML="生成二维码地址： http://www.520hbs.com/showagent.php?code="+$("#agentCode").val();
	        }
	        else{
	        	document.getElementById("showMessage").innerHTML="代理商授权码不存在！";	
	        	$("#showMessage").show();
	        }
		}
         
    });
  }   

</script>
