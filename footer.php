<div class="hy-gototop hidden-sm hidden-xs">
   <ul class="item clearfix">
    <li><a href="<?php echo $rjcms_domain;?>ucenter" title="会员中心"><i class="icon iconfont icon-member1"></i></a></li>
    <li><a href="<?php echo $rjcms_domain;?>book.php" title="留言求片"><i class="icon iconfont icon-comment"></i></a></li>
	<li><a href="javascript:()" title="观看记录"><i class="icon iconfont icon-record1"></i></a><div class="history clearfix" style="width:200px">
				<div class="head">
					<h5 class="margin-0 text-muted">观看历史</h5>
				</div>
<?php if ($timu!=""){?>
<script type="text/javascript ">
					$MH.limit = 10;
					$MH.WriteHistoryBox(200, 170, 'font');
					$MH.recordHistory({
						name: '<?php echo $timu; ?>',
						link: '<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>',
						pic: ''
					})
				</script>
<?php }elseif ($d_name!=""){?>
<script type="text/javascript ">
					$MH.limit = 10;
					$MH.WriteHistoryBox(200, 170, 'font');
					$MH.recordHistory({
						name: '<?php echo $d_name; ?>',
						link: '<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>',
						pic: ''
					})
				</script>
<?php }else {?>
<script type="text/javascript ">
					$MH.limit = 10;
					$MH.WriteHistoryBox(200, 170, 'font');
					$MH.recordHistory({
						name: '',
						link: '',
						pic: ''
					})
				</script>
<?php }?>

			</div>	</li>		
    <li class="codehover"><a href="javascript:()" title="二维码"><i class="icon iconfont icon-code1"></i></a>
     <div class="code clearfix">
      <p class="margin-0">
	  <img class="pic-responsive" src="<?php echo $rjcms_weixin;?>" alt="扫描二维码">
	  </p>
     </div></li>
    <li><a data-toggle="tooltip" data-placement="top" class="" href="javascript:scroll(0,0)" title="返回顶部"><i class="icon iconfont icon-uparrow"></i></a></li>   </ul>
  </div>
<div class="tabbar visible-xs">
		<a href="<?php echo $rjcms_domain;?>" class="item ">
        <i class="icon iconfont icon-home"></i>
        <p class="text">首页</p>
    </a>
	<a href="<?php echo $rjcms_domain;?>movie.php" class="item ">
        <i class="icon iconfont icon-film"></i>
        <p class="text">电影</p>
    </a><a href="<?php echo $rjcms_domain;?>tv.php" class="item ">
        <i class="icon iconfont icon-show"></i>
        <p class="text">电视剧</p>
    </a><a href="<?php echo $rjcms_domain;?>dongman.php" class="item ">
        <i class="icon iconfont icon-mallanimation"></i>
        <p class="text">动漫</p>
    </a><a href="<?php echo $rjcms_domain;?>zongyi.php" class="item ">
        <i class="icon iconfont icon-flag"></i>
        <p class="text">综艺</p>
    </a>    </div>
<div class="container">
	<div class="row">
		<div class="hy-footer clearfix">
        <p style="padding: 0 4px;text-align:center" class="container-fluid"><?php echo $rjcms_copyright;?><?php echo $rjcms_tongji;?></p>
		</div>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
    $(function() {
        $(".videopic.lazy").lazyload({effect: "fadeIn"});  
        $("[data-toggle='tooltip']").tooltip();
    });

</script>	
</body>
</html>
