<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
header ( "content-Type: text/html; charset=utf-8" );
//备份数据库
//这里的账号、密码、名称都是从页面传过来的
$conn = mysqli_connect(DATA_HOST,DATA_USERNAME,DATA_PASSWORD);
if(!$conn) //连接mysql数据库
{
 echo '数据库连接失败，请核对后再试';
 exit;
}
if(!mysqli_select_db($conn, DATA_NAME)) //是否存在该数据库
{
 echo '不存在数据库,请核对后再试';
 exit;
}
mysqli_query($conn, "set names 'utf8'");
$mysql= "set charset utf8;\r\n";
$q1=mysqli_query($conn, "show tables");
while($t=mysqli_fetch_array($q1)){
  $table=$t[0];
  $q2=mysqli_query($conn, "show create table `$table`");
  $sql=mysqli_fetch_array($q2);
  $mysql.=$sql['Create Table'].";\r\n";
  $q3=mysqli_query($conn, "select * from `$table`");
  while($data=mysql_fetch_assoc($q3)){
    $keys=array_keys($data);
    $keys=array_map('addslashes',$keys);
    $keys=join('`,`',$keys);
    $keys="`".$keys."`";
    $vals=array_values($data);
    $vals=array_map('addslashes',$vals);
    $vals=join("','",$vals);
    $vals="'".$vals."'";
    $mysql.="insert into `$table`($keys) values($vals);\r\n";
  }
}
$filename="../backupdata/".DATA_NAME.".sql"; //存放路径，默认存放到项目最外层
$fp = fopen($filename,'w');
fputs($fp,$mysql);
fclose($fp);
alert_href('备份成功!','cms_data.php');
?>
 
