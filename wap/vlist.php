<?php include('../system/inc.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php  include 'head.php';
$tv='class="active"'?>
<title>视频列表-<?php echo $rjcms_seoname;?></title>
<meta name="keywords" content="视频排行,<?php echo $rjcms_keywords;?>">
<meta name="description" content="<?php echo $rjcms_description;?>">
</head>
<body>
<?php include 'header.php'; ?>
<section class="tuijian_box">
<?php echo get_ad(18)?>
    <div class="bgfff shaixuan clearfix">
    <div class="fl leimu_zui"> 
		
        <a class="on" href="">最近热映</a> 

     
        </div>
    <div class="fr shaixuan_2"><a href="javascript:;" id="shaixuan">条件筛选 <em class="shaixuan_icon"><img src="<?php echo $rjcms_domain;?>wap/style/images/icon_y4_03.jpg"></em></a> </div>
 
  </div>
    
        <div class="lebiao_box bgfff shaixuan" style="display: none">
              <div class="biao_li leibiao clearfix">
        <dt><h2 class="leixing"><a href="./wap/vlist.php?cid=0">全部</a></h2></dt> 
        <div style="width: 90%;float: right">
											  <?php
$result = mysqli_query($conn, 'select * from rjcms_vod_class where c_pid=0 order by c_id asc');
while ($row = mysqli_fetch_array($result)){

			echo '﻿<dd><a href="./vlist.php?cid='.$row['c_id'].'" >'.$row['c_name'].'</a></dd>';
		}
?>
						</ul>
<?php
if ($_GET['cid'] != 0){
	?>
						<ul class="clearfix">
											  <?php
$result = mysqli_query($conn, 'select * from rjcms_vod_class where c_pid='.$_GET['cid'].' order by c_sort desc,c_id asc');
while ($row = mysqli_fetch_array($result)){

			echo '﻿<dd><a href="./vlist.php?cid='.$row['c_id'].'" >'.$row['c_name'].'</a></dd>';
		}
?>
						</ul>
<?php }?>                

                        
                        
                        </div>
      </div>

         
    </div>
  </div>
  <div class="dianying_box bgfff clearfix content">
    <ul class="clearfix">
	<?php
							if (isset($_GET['cid'])) {
								if ($_GET['cid'] != 0){
									$sql = 'select * from rjcms_vod where d_parent in ('.$_GET['cid'].') order by d_id desc';
									$pager = page_handle('page',24,mysqli_num_rows(mysqli_query($conn, $sql)));
									$result = mysqli_query($conn, $sql.' limit '.$pager[0].','.$pager[1].'');
								}else{
									$sql = 'select * from rjcms_vod order by d_id desc';
									$pager = page_handle('page',24,mysqli_num_rows(mysqli_query($conn, $sql)));
									$result = mysqli_query($conn, $sql.' limit '.$pager[0].','.$pager[1].'');
								}
							}
							while($row= mysqli_fetch_array($result)){
								$cc="./bplay.php?play=";
								$dd="./bplay/";
if ($rjcms_wei==1){
$ccb=$dd.$row['d_id'];
}
else{
$ccb=$cc.$row['d_id'];	
}
if ($row['d_jifen']>0){
$ok="onclick=\"return confirm('此视频为收费视频，观看需要支付".$row['d_jifen']."积分，您是否观看？')\"";
}
else{
$ok="";
}

echo '<li><a href="'.$ccb.'">
<img src="'.$row['d_picture'].'"></a>       
<p class="clearfix leimu"><span class="fl"></span></p>
        <a href="'.$ccb.'">
		<span class="biaoti">'.$row['d_name'].'</span></a></li>
        ';


		 } ?>
		 
        
      
 
    </ul>  <div class="hy-page clearfix">
<ul class="cleafix">
<?php echo page_show($pager[2],$pager[3],$pager[4],2);?></ul>
			</div>
  </div>

</section>


<?php  include 'footer.php';?>
