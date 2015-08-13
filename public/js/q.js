
function slide3(){
	 window.onload=function(){  
	 	//获取外box实际宽度
		var box_width=0;
		var arr_width={};
		var img_size=$(".slide_box>img").size();
		var box_slide_num=5;
		var move_length=0;
		var local_num=0;
		$(".slide_box>img").each(function(index, element) {
			$img_width=$(this).width();	
			arr_width[index]=$img_width;
			box_width=box_width+$img_width;	
		});		
		$(".a_right").click(function(){				
			for(i=local_num*box_slide_num;i<(local_num+1)*box_slide_num;i++){
				move_length+=arr_width[i];
			}
			if(move_length>=box_width){move_length=0;}
			$(".slide_box").animate({marginLeft:"-"+move_length+"px"});				
			if(local_num==parseInt(img_size/box_slide_num)){
				local_num=0;
			}else{
				local_num+=1;
			}
			console.log(local_num);
		});	
		$(".a_left").click(function(){
			move_length=~move_legnth;		
			for(i=local_num*box_slide_num;i<(local_num+1)*box_slide_num;i++){
				move_length+=arr_width[i];
			}			
			console.log(move_length);
			if(move_length<=0){move_length=0;}
			$(".slide_box").animate({marginLeft:move_length+"px"});	
			if(local_num==5){
				local_num=0;
			}else{
				local_num-=1;
			}
		});	
	
	 }	
	}