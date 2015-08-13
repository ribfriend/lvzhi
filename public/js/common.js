$(function(){	
	if($('.slide_box_img a').length>0){
	slide();}
	$('.sli_box').bind("mouseleave",function(){$(this).children("dd").hide();}).children("dt").bind("click",function(){$(this).nextAll().toggle();});
	$(".mydate").click(function(){$(this).parent("dd").hide();$(".date_box").slideDown();});
	///////
	$(".detail>table.detail:odd").addClass("whitegray");
	//////
	$(".jgg>div>span").click(function(){ $(this).addClass("on").siblings().removeClass("on");
		$("#watermark").val($(this).attr("dir"));
	});
	$(":radio[name='watermark_c']").click(function(){$("#watermark").val($(this).val());});
	///////
	$(".tab_menu>ul>li").click(function(){
		index=$(this).index();
		$(this).addClass("tab_select").siblings().removeClass("tab_select");
		$(".tab_content>div").eq(index).fadeIn().siblings().hide();
	});
	$(".tab_content>div:first").fadeIn();
	$("#balltime").change(function(){
		var age=GetDateDiff($(this).val(),Date(), "year");
		$("#ballage").val(age+"年");	
	});
	$(".add").click(function(){
		$v_name=$(this).siblings('input').attr('name');
		var altVal = $(this).attr('alt');
		var objLi = $('li.'+altVal);
		if (objLi.size() > 0)
		{
			$('li.'+altVal).last().after('<li class="'+altVal+'"><label>&nbsp;</label><input type="text"  name="'+$v_name+'"  class="ipt_txt w2"  /><span class="del">&nbsp;</span></li>');	
		}
		else
		{
			$(this).parent('li').after('<li class="'+altVal+'"><label>&nbsp;</label><input type="text"  name="'+$v_name+'"  class="ipt_txt w2"  /><span class="del">&nbsp;</span></li>');	
		}
		$(".del").click(function(){
			$(this).parent("li").remove();	
		});
	});
	/////////////msg//////////////////////
	// $("#msg_table tr[class!='dis_none']").click(function(){$(".dis_none").hide();$(this).next().eq(0).toggle(500,function(){
		// $size=$(this).find('.tit').size();
		// $height=800;
		// if($size>20){$(this).find(".re_box").css("height",$height).addClass("over_s");}
		// });});
	
	/////////VA/////////
	ey_form_js.ini();
	$("#reg").submit(function(){
		if(!ey_form_js.reg_name($("input[name='u_name']"))){
			ey_form_js.v_error($("input[value='检查用户名']"));
		}else if(!ey_form_js.reg_pass($("input[name='u_pass']"))){
			ey_form_js.v_error($("input[name='u_pass']"));
		}else if(!$("input[name='u_pass']").val()==$("input[name='u_pass_to']").val()){
			ey_form_js.v_error($("input[name='u_pass_to']"));
			$("input[name='u_pass_to']").focus();
		}else if(!ey_form_js.reg_email($("input[name='email']"))){
			ey_form_js.v_error($("input[name='email']"));
		}else if(!ey_form_js.checkEmpty($("input[name='code']"))){
			ey_form_js.v_error($(".code_change"));
		}else{return true;}	
		return false;
	});	
	$("#login").submit(function(){
		if((!ey_form_js.reg_name($("#uname")))||(!ey_form_js.reg_pass($("#upass")))){
			ey_form_js.ey_alert($("#login"),"请输入正确的用户名和密码");
		}else{
			return true;
		}
		return false;	
	});
	$("#search").submit(function(){
		// if((!ey_form_js.checkEmpty($("input[name='keyword']")))){
		// 	ey_form_js.ey_alert($("#search"),"请输入搜索的内容");
		// }else{
		// 	return true;
		// }
		ey_form_js.ey_alert($("#search"),"搜索暂未开通！");
		return false;	
	});
	/********gotop**********/
	$.scrolltotop({
	   	className: 'totop',
	   	controlHTML : '<img src="/public/img/home/gotop.png"/>',
	   	offsety:50,
		offsetx:50
    });
});
var slide_timer;
function slide(){
	window.onload=function(){  
		var move_legnth=956;
		var box_width=0;
		var i_move_length=0;
		$(".slide").hover(function(){time_slide(false)},function(){time_slide(true);});
		$(".slide_box_img img").each(function(index, element) {
				$img_width=$(this).width();	
				box_width=box_width+$img_width;	
			});	
		$(".a_right").click(s=function(){	
			$box_margin_left=parseInt($(".slide_box").css("margin-left"));
			i_move_length=i_move_length-move_legnth;			
			if(~i_move_length>=box_width){i_move_length=0;}
			$(".slide_box_img").animate({marginLeft:i_move_length+"px"},800);
			////
			$(this).unbind("click");
			  setTimeout(function(){
			   $(".a_right").bind("click",s);
			   },800)		
		});
		$(".a_left").click(s2=function(){	
			$box_margin_left=parseInt($(".slide_box").css("margin-left"));
			i_move_length=i_move_length+move_legnth;		
			if(i_move_length>=0){i_move_length=0;}
			$(".slide_box_img").animate({marginLeft:i_move_length+"px"},800);	
			////
			$(this).unbind("click");
			  setTimeout(function(){
			   $(".a_left").bind("click",s2);
			   },800)			
		});
		time_slide(true);
	}
}
function time_slide(is_hold){
	if(is_hold){
		slide_timer=setInterval(function(){$(".a_right").trigger("click")},3000);
	}else{
		clearInterval(slide_timer);
	}
}


function GetDateDiff(startTime, endTime, diffType) {
	//将xxxx-xx-xx的时间格式，转换为 xxxx/xx/xx的格式
	startTime = startTime.replace(/-/g, "/");
	endTime = endTime.replace(/-/g, "/");
	//将计算间隔类性字符转换为小写
	diffType = diffType.toLowerCase();
	var sTime = new Date(startTime); //开始时间
	var eTime = new Date(endTime); //结束时间
	//作为除数的数字
	var divNum = 1;
		switch (diffType) {
		case "second":
		divNum = 1000;
		break;
		case "minute":
		divNum = 1000 * 60;
		break;
		case "hour":
		divNum = 1000 * 3600;
		break;
		case "day":
		divNum = 1000 * 3600 * 24;
		break;
		case "year":
		divNum = 1000 * 3600 * 24 * 30 * 12;
		va=(eTime.getTime() - sTime.getTime()) / parseInt(divNum);
		if(va<0.5){return "不满半";}else if(va>0.5 && va<1){return "不满一";}else{return parseInt(va);}
		return ;
		break;
		default:
		break;
		}
	return parseInt((eTime.getTime() - sTime.getTime()) / parseInt(divNum));
}
var ey_form_js={
	ini:function(){},
	animate_bg:function(obj){
		obj.animate({'backgroundColor':"#e42c38"},1000).animate({'backgroundColor':"#eeefef"},1000);
	},
	v_good:function($obj){
		if($obj.siblings(".good").length==0){
			$obj.siblings(".error").remove();
			$obj.after('<span class="good">&nbsp;</span>');}
	},
	v_error:function($obj){
		if($obj.siblings(".error").length==0){
		
		$(".error").each(function (i, o){
			$(o).remove();
		})
		$obj.siblings(".good").remove();
		$obj.after('<span class="error">&nbsp;</span>');}
	},
	ey_alert:function(obj,txt){
		if($("#ey_alert").length<=0){
        obj.append('<div id="ey_alert">'+txt+'</div>');
        setTimeout(function(){
            $("#ey_alert").fadeOut(800,function(){
                $(this).remove("#ey_alert");
            });
        },2000);
    }
	},
	ey_alertbox:function(dombox){
		$("#"+dombox).fadeIn();
		$("#"+dombox).prepend("<span class='boxClose' >x</span>");
		$(".boxClose").on('click',function(){
			$("#"+dombox).fadeOut();
		})
		
		$("#"+dombox).find("textarea").focus(function(){
			if($(this).val()=="为了让你尽快成功加入球队，请对自己的身份进行简短的说明"){
				$(this).val('');
			}			
		});
		$("#"+dombox).find("textarea").blur(function(){
			if($(this).val() == ''){
				$(this).val('为了让你尽快成功加入球队，请对自己的身份进行简短的说明');
			}
		});
	},
	reg_name:function(obj){		
		$reg=/^[\u4e00-\u9fa5]{1,11}$|^[\dA-Za-z_]{1,20}$/;  
        if($reg.test(obj.val())){        
            return true
        }else{ 
			obj.focus();  
            return false;
        }  
	},
	reg_email:function(obj){
		$reg=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;  
        if($reg.test(obj.val())){        
            return true
        }else{ 
			obj.focus();  
            return false;
        }   
	},
	reg_pass:function(obj){
		$reg=/^[a-zA-Z0-9_-]\w{5,12}$/;
		if($reg.test(obj.val())){        
            return true
        }else{ 
			obj.focus();  
            return false;
        }  	
	},
	reg_invite:function(obj){
		$reg=/^[a-zA-Z0-9_-]\w{3,7}$/;
		if($reg.test(obj.val())){        
            return true
        }else{ 
			obj.focus();  
            return false;
        }  	
	},
	checkEmpty:function(dom,errorClass){  
    var value=$.trim(dom.val());
		if(value.length<1){
			dom.addClass(errorClass);
			dom.focus();
			return false;
		}else{        
			return true;
		}
	}
};