<?php include('system/inc.php');
error_reporting(0);
//获取详情字段
$result = mysqli_query($conn, 'select * from rjcms_vod where d_id = '.$_GET['play'].' ');
if (!!$row = mysqli_fetch_array($result)) {
	$d_id = $row['d_id'];
	$d_name = $row['d_name'];
	$d_jifen = $row['d_jifen'];
	$d_user = $row['d_user'];
	$d_parent = $row['d_parent'];
	$d_picture = $row['d_picture'];
	$d_content = $row['d_content'];
	$d_scontent = $row['d_scontent'];
	$d_seoname = $row['d_seoname'];
	$d_keywords = $row['d_keywords'];
	$d_description = $row['d_description'];
	$d_player = $row['d_player'];
	$d_title = ($d_seoname == '') ? $d_name .' - '.$rjcms_name : $d_seoname.' - '.$d_name.' - '.$rjcms_name ;
} else {
	die ('您访问的详情不存在');
}
$result1 = mysqli_query($conn, 'select * from rjcms_vod_class where c_id='.$d_parent.' order by c_id asc');
while ($row1 = mysqli_fetch_array($result1)){
$c_hide=$row1['c_hide'];
}
if($c_hide>0){
	if(!isset($_SESSION['user_name'])){
		alert_href('请注册会员登录后观看',''.$rjcms_domain.'ucenter');
	};
    $result = mysqli_query($conn, 'select * from rjcms_user where u_name="'.$_SESSION['user_name'].'"');//查询会员积分
     if($row = mysqli_fetch_array($result)){
	 $u_group=$row['u_group'];//到期时间
     }
    //echo "用户名： ".$_SESSION['user_name'].", u_group： ".$u_group;
 	if($u_group<=1){//如果会员组
 	alert_href('对不起,您不能观看会员视频，请升级会员！',''.$rjcms_domain.'ucenter/mingxi.php');
 	} 
}
include('system/shoufei.php');
if($d_jifen>0){//积分大于0,普通会员收费
	if(!isset($_SESSION['user_name'])){
		alert_href('请注册会员登录后观看',''.$rjcms_domain.'ucenter');
	};
    $result = mysqli_query($conn, 'select * from rjcms_user where u_name="'.$_SESSION['user_name'].'"');//查询会员积分
     if($row = mysqli_fetch_array($result)){
     $u_points=$row['u_points'];//会员积分
     $u_plays=$row['u_plays'];//会员观看记录
     $u_end=$row['u_end'];//到期时间
	 $u_group=$row['u_group'];//到期时间
     }	

	     if($u_group<=1){//如果会员组
     if($d_jifen>$u_points){
	 alert_href('对不起,您的积分不够，无法观看收费数据，请推荐本站给您的好友、赚取更多积分',''.$rjcms_domain.'ucenter/yaoqing.php');
    }  else{

    if (strpos(",".$u_plays,$d_id) > 0){ 

	}	
	//有观看记录不扣点
else{

   $uplays = ",".$u_plays.$d_id;
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
}
if($d_user>0){	
if(!isset($_SESSION['user_name'])){
		alert_href('请注册会员登录后观看',''.$rjcms_domain.'ucenter');
	};
    $result = mysqli_query($conn, 'select * from rjcms_user where u_name="'.$_SESSION['user_name'].'"');//查询会员积分
     if($row = mysqli_fetch_array($result)){
     $u_points=$row['u_points'];//会员积分
     $u_plays=$row['u_plays'];//会员观看记录
     $u_end=$row['u_end'];//到期时间
	 $u_group=$row['u_group'];//到期时间
     }		 
if($u_group<$d_user){
	alert_href('您的会员组不支持观看此视频!',''.$rjcms_domain.'ucenter/mingxi.php');
}
}
function get_play($t0){
	$result = mysqli_query($conn, 'select * from rjcms_player where id ='.$t0.'');
	if (!!$row = mysqli_fetch_array($result)){
return $row['n_url'];
	}else{
		return $t0;
	};
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php  include 'head.php';?>
<title><?php echo $d_title;?></title>
<meta name="keywords" content="<?php echo $d_keywords;?>">
<meta name="description" content="<?php echo $d_description;?>">
<style type="text/css">
  #timer{background: rgba(0, 0, 0, 0.59);padding: 5px;text-align: center;width: 30px;position: absolute;top: 5%;right: 2%;color: #fff;font-size: 16px;border-radius: 50%;height: 30px;line-height: 20px}
  #xiang{background: rgba(177, 13, 13, 0.87);padding: 5px;text-align: center;width: auto;position: absolute;bottom: 2%;right: 1%;color: #fff;font-size: 16px;border-radius: 10px;height: 20px;line-height: 9px}
</style> 

</head>
<body class="vod-play">
<?php include 'header.php'; ?>
<div class="container">
<div class="row"  style="margin-top:10px"><?php echo get_ad(2)?></div>
	<div class="row">
		<div class="hy-player clearfix">
			<div class="item">
				<div class="col-md-9 col-sm-12 padding-0">
					<div class="info embed-responsive "  id="cms_player">
					<img id="addid" src="" style="display: none;width:100%;border: 0px solid #FF6651"><div id="shiping_box"></div>
					<a style="display:none" id="videourlgo" href=""></a>

<script type="text/javascript"> 

          function run(){
        var s = document.getElementById("timer");      
        if(!s){          
            return false;
        }else{
          s.innerHTML = s.innerHTML * 1 - 1;
        }
        
    }
    window.setInterval("run();", 1000);
	$('#shiping_box').html('<div style="text-align:center;width:100%;"><?php echo get_ad(1)?></div><div id="timer"><?php echo $rjcms_miaoshu;?></div>');

    //设置延时函数
    function adsUp(){    
        $("#shiping_box").html('<iframe allowFullscreen="true" src="<?php echo $rjcms_domain;?>jx.php?url=<?php $result = mysqli_query($conn, 'select * from rjcms_vod where d_id ='.$d_id.'');
	if (!!$row = mysqli_fetch_array($result)){
$d_scontent=explode("\r\n",$row['d_scontent']);
//print_r($d_scontent);
for($i=0;$i<count($d_scontent);$i++)
{	$d_scontent[$i]=explode('$',$d_scontent[$i]);
		}
	//echo get_play($row['d_player']).$d_scontent[0][1];
	echo $d_scontent[0][1];
	}else{
		return '';
	};?>" id="video" style="width:100%;border:none" allowtransparency="true" allowfullscreen="true" frameborder="0" scrolling="no"></iframe>');  
    }
    <?php if($u_group>1){ $rjcms_miaoshu = 0;}?> //去除广告计时
    //五秒钟后自动收起
    var t = setTimeout(adsUp,<?php echo $rjcms_miaoshu*1000;?>); 
    
</script>
</div>
					<div class="footer clearfix">
						<ul class="cleafix hidden-sm hidden-xs">

									<li><a class="btn btn-sm btn-default" href="<?php echo $rjcms_domain;?>addfav.php?title=<?php echo $d_title ?>&dizhi=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>"> <i class="icon iconfont icon-collection"></i> 收 藏</a></li>

						</ul>
						<span class="text-muted" id="xuji"></span>
					</div>
					<div class="footer clearfix" id="xlu" style="display:none; height:auto"><span class="text-muted" ></span></div>
				</div>
									<div class="col-md-3 col-sm-12 padding-0">
					<div class="sidebar">
						<div class="hy-play-list play">
							<div class="item tyui" id="dianshijuid">
								<div class="panel clearfix">
									<a class="option collapsed" data-toggle="collapse" data-parent="#playlist" href="#playlist1">点击播放<span class="text-muted pull-right"><i class="icon iconfont icon-right"></i></span></a>
									<div id="playlist1" class="playlist collapse in dianshijua">
										<ul class="playlistlink-1 list-15256 clearfix">
<?php $result = mysqli_query($conn, 'select * from rjcms_vod where d_id ='.$d_id.'');
	if (!!$row = mysqli_fetch_array($result)){
$d_scontent=explode("\r\n",$row['d_scontent']);
//print_r($d_scontent);
for($i=0;$i<count($d_scontent);$i++)
{	$d_scontent[$i]=explode('$',$d_scontent[$i]);
if($d_scontent[$i][1]!=""){
	echo'<li><a href="'.$rjcms_domain.'jx.php?url='.get_play($row['d_player']).''.$d_scontent[$i][1].'" target="ajax" id="'.$d_scontent[$i][0].'">'.$d_scontent[$i][0].'</a></li>';
}
	}
	}else{
		return '';
	};?></ul>

									</div>
						</div>
		<div class="panel clearfix">
									<a class="option collapsed" data-toggle="collapse" data-parent="#playlist" href="#playlist1">影音先锋<span class="text-muted pull-right"><i class="icon iconfont icon-right"></i></span></a>
									<div id="playlist1" class="playlist collapse in dianshijua">
										<ul class="playlistlink-1 list-15256 clearfix">
<?php $result = mysqli_query($conn, 'select * from rjcms_vod where d_id ='.$d_id.'');
	if (!!$row = mysqli_fetch_array($result)){
$d_scontent=explode("\r\n",$row['d_scontent']);
//print_r($d_scontent);
for($i=0;$i<count($d_scontent);$i++)
{	$d_scontent[$i]=explode('$',$d_scontent[$i]);
if($d_scontent[$i][1]!=""){
	//echo $rjcms_domain.'jx.php?url='.$d_scontent[$i][1].'&playid=2'.'<br>';
	echo'<li><a href="'.$rjcms_domain.'jx.php?url='.''.$d_scontent[$i][1].'&playid=2'.'" target="ajax" id="'.$d_scontent[$i][0].'">'.$d_scontent[$i][0].'</a></li>';
}
	}
	}else{
		return '';
	};?></ul>

									</div>
						</div>		
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var al = $('.dianshijua a');
	al.attr('class','am-btn am-btn-default lipbtn');
	var ji= new Array();
	var btnji= new Array();
	for(var g=0;g<al.length;g++){
		ji.push(al[g].href);
		btnji.push(al[g].id);
		al[g].href = 'javascript:void(0)';
		al[g].target = '_self';
		al.eq(g).attr('onclick','bofang(\''+ji[g]+'\',\''+btnji[g]+'\')');
	};
</script>
<script type="text/javascript">
var tishi = ('正在为您播放<?php echo $d_name; ?>');
document.getElementById('xuji').innerHTML = tishi;
	function bofang(mp4url,jiid){
		var tishi = ('正在为您播放<?php echo $d_name; ?> '+jiid+'');
		document.getElementById('xuji').innerHTML = tishi;
		document.getElementById('video').src=''+mp4url;
		
				//点击之后
document.getElementById('xuji').style.display='block';
document.getElementById('video').style.display='none';
function test() {
			document.getElementById('video').style.display='block';
		}

		setTimeout(test, 0);
	};
</script>

<div class="container">
	<div class="row">
		<div class="col-md-9 col-sm-12 hy-main-content">
			<div class="hy-layout clearfix"><div style="margin-top:0px"><?php echo get_ad(13)?></div>
				<div class="hy-switch-tabs">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#list3" data-toggle="tab">剧情介绍</a></li>
											</ul>
				</div>
				<div class="tab-content">
					<div class="hy-play-list tab-pane fade in active" id="list3">
						<div class="item">
							<div class="plot">
								<?php echo $d_content; ?></div>
						</div>
					</div>
				</div>
			</div>

			<div class="hy-layout clearfix">
				<div class="hy-video-head">
					<h3 class="margin-0">影片评论</h3>
				</div>
				<div class="ff-forum" id="ff-forum" data-id="37432" data-sid="1">
<?php echo $rjcms_changyan; ?>
</div>
			</div>
		</div>
		<script type='text/javascript' src='<?php echo $rjcms_domain;?>style/js/view-history.js'></script>
<script>
var store = $.AMUI.store;var lishi = $('#xuji1').html();store.set('site','<?php echo $d_title;?>');      	 store.set('siteurl','<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>');store.set('li',viewji)</script>

<script type="text/javascript">
 var temp = {type: "video", name: "<?php echo $d_title;?>",url: "<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>"};			
var histemp = store.get('history')? store.get('history'): [];
       for(var i=0; i<histemp.length; i++) {
            if(histemp[i].type == "video" && histemp[i].url == "<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>") {
                histemp.splice(i, 1); 
                break;
            }
        }
histemp.unshift(temp); 
store.set('history', histemp);
//alert(JSON.stringify(store.get("history")));
var doo = store.get("history");
//$("#sc").html('"+store.get('history')+"');
function qc () {
	store.clear();
		
}
		</script>
		<div class="col-md-3 col-sm-12 hy-main-side hidden-sm hidden-xs">
			<div class="hy-layout clearfix">
				<div class="hy-details-qrcode side clearfix">
					<div class="item">
						<h5 class="text-muted">扫一扫用手机观看</h5>
						<p>
						<img src="http://pan.baidu.com/share/qrcode?w=250&h=250&url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>" width="250">
						</p>
						<p class="text-muted">
							分享到朋友圈
						</p>
					</div>
				</div>
				<div class="hy-video-ranking side clearfix">
					<div class="head">
						<a class="text-muted pull-right" href="<?php echo $rjcms_domain;?>vlist.php?cid=0">更多 <i class="icon iconfont icon-right"></i></a>
						<h4><i class="icon iconfont icon-top text-color"></i> 抢先看资源</h4>
					</div>
					<div class="item">
						<ul class="clearfix">
						<?php $result = mysqli_query($conn, 'select * from rjcms_vod order by d_id desc LIMIT 0,12');
		while ($row = mysqli_fetch_array($result)){
$cc="./bplay.php?play=";
$dd="../bplay/";
if ($rjcms_wei==1){
$ccb=$dd.$row['d_id'];
}
else{
$ccb=$cc.$row['d_id'];	
}
			echo '<li class="text-overflow"><span class="pull-right text-color">->></span><a href="'.$ccb.'" title="'.$row['d_name'].'">
						<em class="number active ">抢先</em>'.$row['d_name'].'</a></li>';
		}?>			

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<span class="ff-hits" id="ff-hits-insert" data-id="37432" data-sid="vod" data-type="insert"></span>		<script>
	    var swiper = new Swiper('.hy-switch', {
	        pagination: '.swiper-pagination',
	        paginationClickable: true,
	        slidesPerView: 5,
	        spaceBetween: 0,
	        nextButton: '.swiper-button-next',
	        prevButton: '.swiper-button-prev',
	        breakpoints: {
	            1200: {
	                slidesPerView: 4,
	                spaceBetween: 0
	            },
	            767: {
	                slidesPerView: 3,
	                spaceBetween: 0					            
	            }
	        }
	    });	 
	    </script>
<span class="ff-record-set" data-sid="1" data-id="37432" data-id-sid="1" data-id-pid="1">
</span>



<?php include 'footer.php'; ?>
<script type="text/javascript ">
					$MH.limit = 10;
					$MH.WriteHistoryBox(200, 170, 'font');
					$MH.recordHistory({
						name: '<?php echo $d_name; ?>',
						link: '<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>',
						pic: '/m-992/uploads/allimg/201706/a0a13289528feabb.jpg'
					})
				</script>
