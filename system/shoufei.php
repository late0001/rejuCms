<?php
//1.本系统所有资源均自动采集，无需人工，省时省力。新版增加了发布视频功能、会员功能、充值功能、支付功能等。
//2.影院自适应所有设备，PC/手机/pad均可使用。
//3.本系统不依托任何第三方CMS，纯PHP，对环境要求小，基本所有的PHP环境都可轻松带起。
//4.所有广告及版权信息均可从后台更改。
//5.可对接微信（有教程及配置文件），可打包制作APP（苹果+安卓）。

if($rjcms_user==1){//开启收费模式
//判定会员是否登录
if(!isset($_SESSION['user_name'])){
		alert_href('请注册会员登录后观看',''.$rjcms_domain.'ucenter/login.php');
	};
//获取会员信息
 $result = mysqli_query($conn, 'select * from rjcms_user where u_name="'.$_SESSION['user_name'].'"');//查询会员积分
     if($row = mysqli_fetch_array($result)){
     $u_points=$row['u_points'];//会员积分
     $u_plays=$row['u_plays'];//会员观看记录
     $u_end=$row['u_end'];//到期时间
	 $u_group=$row['u_group'];//会员组
     }	
//判断会员组
if ($u_group==1){
//判定会员观看次数
$d_cishu=explode(',',$u_plays);
for($i=0;$i<count($d_cishu);$i++)
{
$cishu=$i;
}
if ($cishu>=$rjcms_cishu){
	//大于免费观看次数出现此信息
	 alert_href('对不起,您的观看次数已经用完，请推荐本站给您的好友、赚取更多积分',''.$rjcms_domain.'ucenter/yaoqing.php');	
} 
else
//写入观看记录
{
	if (strpos(",".$u_plays,$d_id) > 0){ 

	}else{
 $uplays = $u_plays.",".$d_id;	
 $uplays = str_replace(",,",",",$uplays);
 $_data['u_plays'] =$uplays;
 $sql = 'update rjcms_user set '.arrtoupdate($_data).' where u_name="'.$_SESSION['user_name'].'"';
if (mysqli_query($conn, $sql)) {
}
}
}

}
if($d_jifen>0){//积分大于0,普通会员收费	
//会员积分不足 
if($d_jifen>$u_points){
	 alert_href('对不起,您的积分不够，无法观看收费数据，请推荐本站给您的好友、赚取更多积分',''.$rjcms_domain.'ucenter/yaoqing.php');
    }
else{
//扣除积分
if (strpos(",".$u_plays,$d_id) > 0){ 

	}	
	//有观看记录不扣点
else{

   $uplays = $u_plays.",".$d_id;	
   $uplays = str_replace(",,",",",$uplays);
   $_data['u_points'] =$u_points-$d_jifen;
   $_data['u_plays'] =$uplays;
   $sql = 'update rjcms_user set '.arrtoupdate($_data).' where u_name="'.$_SESSION['user_name'].'"';
if (mysqli_query($conn, $sql)) {

alert_href('您成功支付'.$d_jifen.'积分,请重新打开视频观看!',''.$rjcms_domain.'bplay.php?play='.$d_id.'');
}
}
	
}
}
if($u_group<$d_user){
	alert_href('您的会员组不支持观看此视频!',''.$rjcms_domain.'ucenter/mingxi.php');
}
}
 ?>
