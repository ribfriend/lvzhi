<?php
Header("Content-type: image/jpeg"); 
$code = isset($_REQUEST['code']) ? $_REQUEST['code'] : '';
if($code == ''){
	die("异常操作！");
}
$conn = mysql_connect("localhost","root","lvzhi");
mysql_select_db("lvzhi_auth");
mysql_query("set names utf8");
$sql = "SELECT * FROM agent WHERE auth_id = '".$code."'"; 
$query = mysql_query($sql); 
$row = mysql_fetch_array($query);
if(!$row['auth_id']){die('1');}
$query = mysql_query($sql);
$arr = array();
while($row = mysql_fetch_array($query)){ 
	$arr['auth_id'] = $row['auth_id'];
	$arr['level'] = $row['level'];
	$arr['contact'] = $row['contact'];
	$arr['user_num'] = $row['user_num'];
	$arr['telphone'] = $row['telphone'];
	$arr['chanel_id'] = $row['chanel_id'];
	$arr['chanel'] = $row['chanel'];
	$arr['is_auth'] = $row['is_auth'];
	if($row['is_auth']==0){
		die('2');
	}else if($row['deadline'] < date('Y-m-d')){
		die('3');
	}
}
$im = imagecreatefromjpeg("template.jpg"); 
$white = ImageColorAllocate($im, 136,91,36);
$size=20;
ImageTTFText($im, $size, 0, 280, 580, $white, "vista.ttf", "授权编号");
ImageTTFText($im, $size, 0, 410, 580, $white, "vista.ttf", $arr['auth_id']);
ImageTTFText($im, $size, 0, 280, 625, $white, "vista.ttf", "      级别");
ImageTTFText($im, $size, 0, 410, 625, $white, "vista.ttf", $arr['level']);
ImageTTFText($im, $size, 0, 280, 670, $white, "vista.ttf", "      姓名");
ImageTTFText($im, $size, 0, 410, 670, $white, "vista.ttf", $arr['contact']);
ImageTTFText($im, $size, 0, 280, 715, $white, "vista.ttf", "   身份证");
ImageTTFText($im, $size, 0, 410, 715, $white, "vista.ttf", $arr['user_num']);
ImageTTFText($im, $size, 0, 280, 760, $white, "vista.ttf", "      手机");
ImageTTFText($im, $size, 0, 410, 760, $white, "vista.ttf", $arr['telphone']);
ImageTTFText($im, $size, 0, 280, 805, $white, "vista.ttf", "      渠道");
ImageTTFText($im, $size, 0, 410, 805, $white, "vista.ttf", $arr['chanel']);
$channel_tag="      店名";
if($arr['chanel'] == "微信")
{
	$channel_tag="   微信号";
}
ImageTTFText($im, $size, 0, 280, 850, $white, "vista.ttf", $channel_tag);
ImageTTFText($im, $size, 0, 410, 850, $white, "vista.ttf", $arr['chanel_id']);
for($i = 0; $i <7; $i++)
{
	ImageTTFText($im, $size, 0, 380, 580+$i*45, $white, "vista.ttf", "：");
}
include("phpqrcode/phpqrcode.php");
$value="http://".$_SERVER['SERVER_ADDR']."/test/qccode.php?code=".$code;
$errorCorrectionLevel = "S";
$matrixPointSize = "4";
$str = QRcode::png($value, $code.".png", $errorCorrectionLevel, $matrixPointSize);
$qcimg = imagecreatefrompng($code.".png");
//var_dump($str);exit();
imagecopy($im,$qcimg,250,1000,0,0,140,140);
//var_dump(imagecopy($im,$time.".png",0,0,50,240,222,222));exit();*/
imagejpeg($im,$code.".jpg");
ImageDestroy($im);
//echo '<img src="115.28.181.55/test/'.$code.'.jpg" />';
header("Location:http://".$_SERVER['SERVER_ADDR']."/test/qccode.php?code=".$code);
?>
