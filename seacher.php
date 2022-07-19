<?php include('system/inc.php');
$q=$_POST['wd'];
$seach=file_get_contents('https://so.360kan.com/index.php?kw='.$q);
$szz='#js-playicon" title="(.*?)"\s*data-logger#';
$szz1='#a href="(.*?)" class="g-playicon js-playicon"#';
$szz2='#<img src="(.*?)" alt="(.*?)" \/>[\s\S]+?</a>\n</div>#';
$szz3='#(<b>(.*?)</b><span>(.*?)</span></li></ul>)?<ul class="index-(.*?)-ul g-clear">(\n\s*)?<li>(\n\s*)?<b>类型：</b>(\n\s*)?<span>(.*?)</span>#';
$szz4='#<b>类型：</b>[\s\S]*?</li>#';
$szz5='#<b>地区：</b>[\s\S]*?</li>#';
$szz6='#<div class="cont">[\s\S]*?<h3 class="title">#';//评分
$szz7='#<b>导演：</b>(.*?)</li>#';//导演
$szz8='#data-desc=\'[\s\S]+?\'>#';//简介
$mxzl="#<dl class='w-star-intro'><dt>介绍：</dt><dd>(.*?)</dd></dl>#";//简介
$mxss='#<li data-logger=(.*?) class=\'w-mfigure\'><a class=\'w-mfigure-imglink g-playicon js-playicon\' href=\'(.*?)\'> <img src=\'(.*?)\' data-src=\'(.*?)\' alt=\'(.*?)\'  /><span class=\'w-mfigure-hintbg\'>(.*?)</span><span class=\'w-mfigure-hint\'>(.*?)</span></a><h4><a class=\'w-mfigure-title\' href=\'(.*?)\'>(.*?)</a></h4></li>#';//模糊搜索结果
preg_match_all($szz,$seach,$sarr);
preg_match_all($szz8,$seach,$sarr8);
preg_match_all($szz1,$seach,$sarr1);
preg_match_all($szz2,$seach,$sarr2);
preg_match_all($szz3,$seach,$sarr3);
preg_match_all($szz4,$seach,$sarr4);
preg_match_all($szz5,$seach,$sarr5);
preg_match_all($szz6,$seach,$sarr6);
preg_match_all($szz7,$seach,$sarr7);
preg_match_all($mxss,$seach,$sarr8);
preg_match_all($mxzl,$seach,$sarr9);
$one=$sarr[1];//标题
$two=$sarr2[1];//图片
$three=$sarr3[3];//集数
$si=$sarr4[0];//类型
$wu=$sarr5[0];//年代
$liu=$sarr6[0];//评分
$qi=$sarr7[1];//导演
$ba=$sarr8[0];//简介
$nine =$sarr1[1];
$mingxing =$sarr8[2];
$mingxing1 =$sarr8[4];
$mingxing2 =$sarr8[5];
$mingxing3 =$sarr8[6];
$mingxing4 =$sarr9[1];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="cache-control" content="no-siteapp">
<title>搜索<?php echo $q?>-<?php echo $rjcms_seoname;?></title>
<link rel="stylesheet" href="<?php echo $rjcms_domain;?>style/css/bootstrap.min.css" />
<link href="<?php echo $rjcms_domain;?>style/css/swiper.min.css" rel="stylesheet" type="text/css" >		
<link href="<?php echo $rjcms_domain;?>style/font/iconfont.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $rjcms_domain;?>style/css/blackcolor.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $rjcms_domain;?>style/css/style.min.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="<?php echo $rjcms_domain;?>style/js/swiper.min.js"></script>
<meta name="keywords" content="<?php echo $q?>,<?php echo $rjcms_keywords;?>">
<meta name="description" content="<?php echo $rjcms_description;?>">
<!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->
</head>

<body class="vod-search">
<?php  include 'header.php';?>
<div class="container">
	<div class="row">
		<div class="col-md-9 col-sm-12 hy-main-content">
			<div class="hy-layout clearfix">
				<div class="hy-video-head">
					<span class="text-muted pull-right hidden-xs"></span>
					<h4 class="margin-0">搜索到与<span class="text-color">“<?php echo $q?>”</span>相关的结果</h4>
				</div>
				<?php 

	$result = mysqli_query($conn, 'select * from rjcms_vod where d_name like "%'.$q.'%" order by d_id desc');
		while ($row = mysqli_fetch_array($result))
{
$tupian=$row['d_picture'];
$cs=$row['d_name'];
$jianjie=$row['d_content'];
$cc="./bplay.php?play=";
$dd="./bplay/";
if ($rjcms_wei==1){
$chuandi=$dd.$row['d_id'];
}
else{
$chuandi=$cc.$row['d_id'];	
}	
?>
				<div class="hy-video-details active clearfix">
					<div class="item clearfix">
						<dl class="content">
							<dt><a class="videopic" href="<?php echo $chuandi?>" style="background: url(<?php echo $tupian?>) no-repeat; background-position:50% 50%; background-size: cover;"><span class="play hidden-xs"></span></a></dt>
							<dd class="clearfix">
							<div class="head">
								<h3><?php echo $cs?></h3>
							</div>
							<div class="score">
								<div class="star">
									<span class="star-cur" id="score-0"></span>
								</div>
								<span class="branch"></span>
								<script type="text/javascript">
												var str = "0%" 
												document.getElementById("score-0").style.width = (str.replace(".", ""))
										    </script>
							</div>
							<ul>
								<li><span><?php echo $row['d_zhuyan']?></span></li>
								<li><span>类型：<?php echo get_channel_name($row['d_parent'])?></span></li>
<li><span class="text-muted">简介：</span><?php echo $jianjie?></li>

							</ul>
							<div class="block">
								<a class="text-muted" href="<?php echo $chuandi?>">查看详情 <i class="icon iconfont icon-right"></i></a>
							</div>
							</dd>
						</dl>
					</div>
				</div>
<?php } ?> 
<?php 
if (!empty($one)){
foreach ($one as $ni=>$cs){ 
$mvsrc1 = str_replace("http://www.360kan.com", "", "$nine[$ni]");
$pingfen = str_replace('<div class="b-tomato"><div class="rating-site yellow"><p class="value">评分：<span>', '', "$liu[$ni]");
$pingfen = str_replace('</span></p></div></div>', '', "$pingfen");
$pingfen = str_replace('    ', '', "$pingfen");
$pingfen = str_replace('<div class="cont">', '', "$pingfen");
$pingfen = str_replace('<h3 class="title">', '', "$pingfen");
$pingfen = str_replace(array("\r\n", "\r", "\n"), '', "$pingfen");
$pingfen = str_replace('<div class="b-tomato"><div class="rating-site red"><p class="value">评分：<span>', '', "$pingfen");
$pingfen = str_replace('<div class="b-tomato"><div class="rating-site green"><p class="value">评分：<span>', '', "$pingfen");
$jianjie= str_replace("data-desc='", '', "$ba[$ni]");
$jianjie= str_replace("'>", '', "$jianjie");
$tupian=$two[$ni];
if ($rjcms_wei==1){
$chuandi='../../vod'.$mvsrc1;
}
else{
$chuandi='./play.php?play='.$mvsrc1;	
}//结束
$d_scontent=explode(',',$rjcms_shoufei);
for($i=0;$i<count($d_scontent);$i++)
{
if($cs==$d_scontent[$i]){
//提示错误值
$xianshi='style="display:none"';
     }	

}
?>
<div class="hy-video-details active clearfix" <?php echo $xianshi?>>
					<div class="item clearfix">
						<dl class="content">
							<dt><a class="videopic" href="<?php echo $chuandi?>" style="background: url(<?php echo $tupian?>) no-repeat; background-position:50% 50%; background-size: cover;"><span class="play hidden-xs"></span></a></dt>
							<dd class="clearfix">
							<div class="head">
								<h3><?php echo $cs?><?php echo $three[$ni]?></h3>
							</div>
							<div class="score">
								<div class="star">
									<span class="star-cur" id="score-<?php echo $pingfen?>"></span>
								</div>
								<span class="branch"><?php echo $pingfen?></span>
								<script type="text/javascript">
												var str = "<?php echo $pingfen?>%" 
												document.getElementById("score-<?php echo $pingfen?>").style.width = (str.replace(".", ""))
										    </script>
							</div>
							<ul>
								<li><?php echo $si[$ni]?></li>
								<li><?php echo $wu[$ni]?></li>
<li><span class="text-muted">简介：</span><?php echo $jianjie?></li>

							</ul>
							<div class="block">
								<a class="text-muted" href="<?php echo $chuandi?>">查看详情 <i class="icon iconfont icon-right"></i></a>
							</div>
							</dd>
						</dl>
					</div>
				</div>

<?php } 
}else{
	
foreach ($mingxing as $k=>$mx){ 
$mvsrc1 = str_replace("http://www.360kan.com", "", "$mingxing[$k]");
$tupian=$mingxing1[$k];
$title=$mingxing2[$k];
$jishu=$mingxing3[$k];
if ($rjcms_wei==1){
$chuandi='../../vod'.$mvsrc1;
}
else{
$chuandi='./play.php?play='.$mvsrc1;	
}//结束

?>
<div class="hy-video-details active clearfix">
					<div class="item clearfix">
						<dl class="content">
							<dt><a class="videopic" href="<?php echo $chuandi?>" style="background: url(<?php echo $tupian?>) no-repeat; background-position:50% 50%; background-size: cover;"><span class="play hidden-xs"></span></a></dt>
							<dd class="clearfix">
							<div class="head">
								<h3><?php echo $title?><?php echo $jishu?></h3>
							</div>

							<ul>
<li><span class="text-muted">主演：</span><?php echo $q?></li>

							</ul>
							<div class="block">
								<a class="text-muted" href="<?php echo $chuandi?>">查看详情 <i class="icon iconfont icon-right"></i></a>
							</div>
							</dd>
						</dl>
					</div>
				</div>
<?php } ?> 
<?php } ?> 
				</div>
		</div>
		<div class="col-md-3 col-sm-12 hy-main-side hidden-sm hidden-xs">
			<div class="hy-layout clearfix">
				<div class="hy-video-ranking side clearfix">
					<div class="head">
						<a class="text-muted pull-right" href="<?php echo $rjcms_domain;?>movie.php?m=/dianying/list.php?cat=all%26pageno=1">更多 <i class="icon iconfont icon-right"></i></a>
						<h4><i class="icon iconfont icon-top text-color"></i> 电影排行榜</h4>
					</div>
					<div class="item">
						<ul class="clearfix">
      <?php 
      include './data/bangdan.php';
      foreach ($bdarr[1] as $kurl=>$bd){
          //echo $bd;//name
          $bdurl1=$bdurl[$kurl];//url
		  $bdurl1 = str_replace("http://www.360kan.com", "", "$bdurl1");
          $bdliang1=$bdliang[$kurl];
		   if ($rjcms_wei==1){
$chuandi='./vod'.$bdurl1;
}
else{
$chuandi='./play.php?play='.$bdurl1;	
}
          //echo $bdurl1;
		  echo "<li class='text-overflow '><span class='pull-right text-color'>$bdliang1</span><a href='$chuandi' title='$bd'><em class='number active'>></em>$bd</a></li>";

      }
      
      
      ?>
	  </ul>
					</div>
				</div>
				<div class="hy-video-ranking side clearfix">
					<div class="head">
						<a class="text-muted pull-right" href="<?php echo $rjcms_domain;?>tv.php?u=/dianshi/list.php?cat=all%26pageno=1">更多 <i class="icon iconfont icon-right"></i></a>
						<h4><i class="icon iconfont icon-top text-color"></i> 电视剧排行榜</h4>
					</div>
					<div class="item">
						<ul class="clearfix">
	  <?php 
      include './data/bangdan.php';
      foreach ($tvbdarr[1] as $tvkurl=>$tvbd){
          //echo $bd;//name
          $bdurl2=$tvbdurl[$tvkurl];//url
		  $bdurl2= str_replace("http://www.360kan.com", "", "$bdurl2");
          $tvbdliang1=$tvbdliang[$tvkurl];
		  		   if ($rjcms_wei==1){
$chuandi1='./vod'.$bdurl2;
}
else{
$chuandi1='./play.php?play='.$bdurl2;	
}
          //echo $bdurl1;
		   echo "<li class='text-overflow '><span class='pull-right text-color'>$tvbdliang1</span><a href='$chuandi1' title='$tvbd'><em class='number active'>></em>$tvbd</a></li>";

      }
      
      
      ?>	

					</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	    var swiper = new Swiper('.hy-slide', {
	        pagination: '.swiper-pagination',
	        paginationClickable: true,
	        autoplay: 3000,
	    });	    
	    </script>

<?php  include 'footer.php';?>
<?php  ?>
