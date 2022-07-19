<?php include('system/inc.php');?>
<head>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>视频解析</title>
</head>
<?php 
//echo "nimabibibibibi".$_GET["playid"];
if($_GET["playid"] == 2){ ?>
  
<!--embed id="Player" name="Player" type="application/xfplay-plugin" width="100%" height="100%" param_url="<?php {echo ''.$_GET["url"];}?> PARAM_Status=" 1"="" param_autoplay="1">-->
 <object ID="Xfplay" name="Xfplay" width="900" height="550" classid="clsid:E38F2429-07FE-464A-9DF6-C14EF88117DD" >

    <PARAM name="URL" value="<?php {echo ''.$_GET["url"];}?>">
   

    <PARAM name="Status" value="1"> 

    
    <embed type="application/xfplay-plugin"
            src="<?php {echo ''.$_GET["url"];}?>"
           PARAM_URL="O:\TDownload\JUFE-014\JUFE-014.mp4"
           PARAM_Status="1"
           width="900" height="550"></embed>

    </object>

<?php }else{ ?>
<iframe id="iframepage" allowFullScreen=true marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="<?php {echo ''.$_GET["url"];}?>" height="100%" width="100%"></iframe>
<?php } ?>
<style type="text/css">
body{
  	margin: 0px;
    padding: 0px;
    background: #000;
}
</style>



