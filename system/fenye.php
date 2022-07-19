<?php 
//1.本系统所有资源均自动采集，无需人工，省时省力。新版增加了发布视频功能、会员功能、充值功能、支付功能等。
//2.影院自适应所有设备，PC/手机/pad均可使用。
//3.本系统不依托任何第三方CMS，纯PHP，对环境要求小，基本所有的PHP环境都可轻松带起。
//4.所有广告及版权信息均可从后台更改。
//5.可对接微信（有教程及配置文件），可打包制作APP（苹果+安卓）。


$fenyema="#<div monitor-desc='分页' id='js-ew-page' data-block='js-ew-page'  class='ew-page'>[\s\S]+?</div>#";
preg_match_all($fenyema, $rurl,$yeshua); 
$yeshu=implode($glue, $yeshua[0]);
$yeshu = str_replace('http://www.360kan.com', '?m=', "$yeshu");
$yeshu = str_replace('<a href=', '<li><a href=', "$yeshu");
$yeshu = str_replace('<a target=', '<li><a target=', "$yeshu");
$yeshu = str_replace('</a>', '</a></li>', "$yeshu");
$yeshu = str_replace("class='btn'", '', "$yeshu");
$yeshu = str_replace("pageno", 'page', "$yeshu");
$yeshu = str_replace("<span>...</span>", '', "$yeshu");
$yeshu = str_replace("下一页&gt;", '&gt', "$yeshu");
$yeshu = str_replace("&lt;上一页", '&lt;', "$yeshu");
echo $yeshu;
?>
