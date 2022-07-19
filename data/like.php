<?php
$fang=$_GET['play']; 
$yuming='http://www.360kan.com';
$jmfang= $yuming.$fang;

mkdir('./data');
mkdir('./data/runtime');
$gxpd=time()-filemtime('./data/runtime/'.md5($flid2));
if($gxpd>2*60*60){
$like=file_get_contents($jmfang);
file_put_contents('./data/runtime/'.md5($jmfang),gzdeflate($like));
}	
$like=gzinflate(file_get_contents('./data/runtime/'.md5($jmfang)));

$likezz="#<li  title='(.*?)' class='w-newfigure w-newfigure-(.*?)'><a href='(.*?)'#"; 
$likeimg="#<li  title='(.*?)' class='w-newfigure w-newfigure-(.*?)'><a href='(.*?)'  class='js-link'><div class='w-newfigure-imglink g-playicon js-playicon'> <img src='(.*?)' data-src='(.*?)' alt='(.*?)'  />#"; 
preg_match_all($likezz, $like,$likearr); 
preg_match_all($likeimg, $like,$likearr1); 
$likename=$likearr1[1]; $likeurl=$likearr1[3]; 
$likeimg=$likearr1[5]; foreach ($likename as $ks=>$vs){

$host1=$likeurl[$ks]; 
$hjiami=$host1; 
if ($rjcms_wei==1){
$chuandi='../../vod'.$hjiami;
}
else{
$chuandi='./play.php?play='.$hjiami;	
}
	echo "  <div class='swiper-slide'>
								<div class='item'>
									<a class='videopic lazy' href='$chuandi' title='$vs' data-original='$likeimg[$ks]' style='background: url($likeimg[$ks]) no-repeat; background-position:50% 50%; background-size: cover;'><span class='play hidden-xs'></span><span class='score'>推荐</span></a>
									<div class='title'>
										<h5 class='text-overflow'><a href='$chuandi'>$vs</a></h5>
									</div>
									<div class='subtitle text-muted text-muted text-overflow hidden-xs'>
																			</div>
								</div>
							</div>";
							
							
 } ?>
