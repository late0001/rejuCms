<?php include('../system/inc.php');
include '../system/list.php';
$page=$_GET['page'];?>
<!DOCTYPE html>
<html>
<head lang="en">
<?php  include 'head.php';
$movie='class="weui-state-active"'?>
<title>看电影-2018最新好看的最新电影-<?php echo $rjcms_seoname;?></title>
<meta name="keywords" content="看电影,<?php echo $rjcms_keywords;?>">
<meta name="description" content="<?php echo $rjcms_description;?>">
</head>
<body>
<?php include 'header.php'; ?>
<section class="tuijian_box">
<?php echo get_ad(9)?>
    <div class="bgfff shaixuan clearfix">
    <div class="fl leimu_zui"> 
	<?php 
$b=(strpos($_GET['m'],'rank='));
$ye=substr($_GET['m'],$b+5);
?>
		
        <a <?php if ($ye=="rankhot"){echo 'class="on"';}elseif($ye=="createtime" or $ye=="rankpoint"){}else{ echo 'class="on"';};?> href="?m=/dianying/list.php?rank=rankhot&page=1">最近热映</a> 
      
    <a  <?php if ($ye=="createtime"){echo 'class="on"';}else{};?> href="?m=/dianying/list.php?rank=createtime&page=1">最新上映</a>
         
    <a  <?php if ($ye=="rankpoint"){echo 'class="on"';}else{};?> href="?m=/dianying/list.php?rank=rankpoint&page=1">最受好评</a>
     
        </div>
    <div class="fr shaixuan_2"><a href="javascript:;" id="shaixuan">条件筛选 <em class="shaixuan_icon"><img src="<?php echo $rjcms_domain;?>wap/style/images/icon_y4_03.jpg"></em></a> </div>
 
  </div>
    
        <div class="lebiao_box bgfff shaixuan" style="display: none">
              <div class="biao_li leibiao clearfix">
        <dt><h2 class="leixing"><a href="?m=/dianying/list.php?cat=all&page=1">全部</a></h2></dt> 
        <div style="width: 90%;float: right">
          <?php
foreach($mcat as $kcat=>$vcat){$flname=$mname[$kcat];
if($flname!==伦理){
$flid='/dianying/list.php?cat='.$vcat.'&page=1';
echo "<dd><a href='?m=$flid' target='_self'>$flname</a></dd>";}}?>       
                       

                        
                        
                        </div>
      </div>
                  <div class="biao_li leibiao clearfix">
        <dt><h2 class="leixing"><a href="?m=/dianying/list.php?area=all&pageno=1">全部</a></h2></dt>
        <div style="width: 90%;float: right">
                
<?php

foreach($mcat1 as $kcat=>$vcat){$flname=$mname1[$kcat];
$flid='/dianying/list.php?year='.$vcat.'&page=1';
echo "<dd><a href='?m=$flid' target='_self'>$flname</a></dd>";}?>

                        
                        </div>
      </div>
                  
      <div class="biao_li leibiao clearfix">
        <dt><h2 class="leixing"><a href="?m=/dianying/list.php?area=all&page=1">全部</a></h2></dt>
        <div style="width: 90%;float: right">
<?php
foreach($mcat2 as $kcat=>$vcat){$flname=$mname2[$kcat];
$flid='/dianying/list.php?area='.$vcat.'&page=1';
echo "<dd><a href='?m=$flid' target='_self'>$flname</a></dd>";}?>

                        
                        
                        </div>
      </div>
       
         
    </div>
  </div>
  <div class="dianying_box bgfff clearfix content">
    <ul class="clearfix">
<?php
$flid1=$_GET['m'];
if ($flid1==""){
$flid1='/dianying/list.php?rank=rankhot&pageno=1';
}
include '../system/360.php';
foreach ($xname as $key=>$xvau){ $do=$xlist[$key]; 
$do1=$do; 
$cc="./play.php?play="; 
if ($rjcms_wei==1){
$ccb=vod.$do1;
}
else{
$ccb=$cc.$do1;	
}
echo '<li><a href="'.$ccb.'">
<img src="'.$ximg[$key].'"></a>';
if ($lname[$key]!="") {
echo '<span class="fenshu">'.$lname[$key].'</span>';
} 
echo '<p class="clearfix leimu"><span class="fl"></span><span class="fr">'.$xjishu[$key].'</span></p>
        <a href="'.$ccb.'">
		<span class="biaoti">'.$xvau.'</span></a></li>
        ';
						

						
 } ?>               
      
 
    </ul>  <div class="hy-page clearfix">
				<ul class="cleafix">
<?php include('../system/fenye.php');?>
</ul>
			</div>
  </div>

</section>


<?php  include 'footer.php';?>
