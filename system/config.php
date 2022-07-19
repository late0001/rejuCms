<?php
error_reporting(0); 
$movie="";
$tv="";
$dm="";
$zy="";
$result = mysqli_query($conn, 'select * from rjcms_system where id = 1');
$row = mysqli_fetch_array($result);
$rjcms_domain = $row['s_domain'];
$rjcms_name = $row['s_name'];
$rjcms_seoname = $row['s_seoname'];
$rjcms_keywords = $row['s_keywords'];
$rjcms_description = $row['s_description'];
$rjcms_copyright = $row['s_copyright'];
$rjcms_cache = $row['s_cache'];
$rjcms_wei = $row['s_wei'];
$rjcms_user = $row['s_user'];
$rjcms_logo = $row['s_logo'];
$rjcms_weixin = $row['s_weixin'];
$rjcms_dashang = $row['s_dashang'];
$rjcms_mjk = $row['s_mjk'];
$rjcms_jiekou = $row['s_jiekou'];
$rjcms_changyan = $row['s_changyan'];
$rjcms_qqun = $row['s_qqun'];
$rjcms_token= $row['s_token'];
$rjcms_bdyun= $row['s_bdyun'];
$rjcms_tongji= $row['s_tongji'];
$rjcms_qianxian= $row['s_qianxian'];
$rjcms_dianying= $row['s_dianying'];
$rjcms_dianshi= $row['s_dianshi'];
$rjcms_zongyi= $row['s_zongyi'];
$rjcms_dongman= $row['s_dongman'];
$rjcms_tuiguang= $row['s_tuiguang'];
$rjcms_shoufei= $row['s_shoufei'];
$rjcms_cishu= $row['s_cishu'];
$rjcms_pc= $row['s_pc'];
$rjcms_hong= $row['s_hong'];
$rjcms_gonggao= $row['s_gonggao'];
$rjcms_bofang= $row['s_bofang'];
$rjcms_guanzhu= $row['s_guanzhu'];
$rjcms_fengmian= $row['s_fengmian'];
$rjcms_mail= $row['s_mail'];
$rjcms_smtp= $row['s_smtp'];
$rjcms_muser= $row['s_muser'];
$rjcms_mpwd= $row['s_mpwd'];
$rjcms_wappid= $row['s_wappid'];
$rjcms_wkey= $row['s_wkey'];
$rjcms_alipay= $row['s_alipay'];
$rjcms_appid= $row['s_appid'];
$rjcms_appkey= $row['s_appkey'];
$rjcms_tixing= $row['s_tixing'];
$rjcms_appewm= $row['s_appewm'];
$rjcms_appbt= $row['s_appbt'];
$rjcms_apppic= $row['s_apppic'];
$rjcms_appurl= $row['s_appurl'];
$rjcms_gg= $row['s_gg'];
$rjcms_hctime= $row['s_hctime'];
$rjcms_beijing= $row['s_beijing'];
$rjcms_dianyingnew= $row['s_dianyingnew'];
$rjcms_dongmannew= $row['s_dongmannew'];
$rjcms_zongyinew= $row['s_zongyinew'];
$rjcms_zhifu= $row['s_zhifu'];
$rjcms_tuijian= $row['s_tuijian'];
$rjcms_wxguanzhu= $row['s_wxguanzhu'];
$rjcms_smsname= $row['s_smsname'];
$rjcms_smspass= $row['s_smspass'];
$rjcms_miaoshu= $row['s_miaoshu'];
$real_domain= $row['s_shouquan'];
//广告获取
function get_ad($t0){
	$result = mysqli_query($conn, 'select * from rjcms_ad where catid ='.$t0.'');
	if (!!$row = mysqli_fetch_array($result)){
return $row['pic'];
	}else{
		return '';
	};
}

function curl_file_get_contents($durl){
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $durl);
   curl_setopt($ch, CURLOPT_TIMEOUT, 5);
   curl_setopt($ch, CURLOPT_USERAGENT, _USERAGENT_);
   curl_setopt($ch, CURLOPT_REFERER,_REFERER_);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $r = curl_exec($ch);
   curl_close($ch);
    return $r;
 }

?>
