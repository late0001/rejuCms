<?php include('system/pcon.php');?>
<div class="hy-head-menu">
	<div class="container">
	    <div class="row">
		  	<div class="item">
			    <div class="logo hidden-xs">
					<a class="hidden-sm hidden-xs" href="<?php echo $rjcms_domain;?>"><img src="<?php echo $rjcms_domain.$rjcms_logo;?>" /></a>
		  			<a class="visible-sm visible-xs" href="<?php echo $rjcms_domain;?>"><img src="<?php echo $rjcms_domain.$rjcms_logo;?>" /></a>											  
				</div>	
				<div class="search"> 
<form id="ff-search" role="search" action="<?php echo $rjcms_domain;?>seacher.php" method="post">
                            <input class="form-control" placeholder="输入影片关键词..." type="text" id="ff-wd" name="wd" required="">
                            <input type="submit" class="hide"><a href="javascript:" class="btns" title="搜索" onClick="$('#ff-search').submit();"><i class="icon iconfont icon-search"></i></a></form>
			   </div>			   
			   <ul class="menulist hidden-xs">
					<li><a href="<?php echo $rjcms_domain;?>">首页</a></li>
					<?php if($rjcms_dianying==1){?><li <?php echo $movie;?>><a href="<?php echo $rjcms_domain;?>movie.php">电影</a></li><?php }?>
					<?php if($rjcms_dianshi==1){?><li <?php echo $tv;?>><a href="<?php echo $rjcms_domain;?>tv.php">电视剧</a></li><?php }?>
					<?php if($rjcms_dongman==1){?><li <?php echo $dm;?>><a href="<?php echo $rjcms_domain;?>dongman.php">动漫</a></li><?php }?>
					<?php if($rjcms_zongyi==1){?><li <?php echo $zy;?>><a href="<?php echo $rjcms_domain;?>zongyi.php">综艺</a></li><?php }?>

										<?php
						$result = mysqli_query($conn, 'select * from rjcms_nav order by id asc');
						while($row = mysqli_fetch_array($result)){
						?>
<li class="act<?php echo $row['id'];?>"><a href="<?php echo $row['n_url'];?>" target="_blank"><?php echo $row['n_name'];?></a></li>
<?php
						}
						?>

				</ul>													 
		  	</div>							
	    </div>
	</div>
</div>

