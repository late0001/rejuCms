<?php
error_reporting(E_ALL^E_DEPRECATED);
ob_start();
if (!session_id()) session_start();
define('PCFINAL', TRUE);
date_default_timezone_set('PRC');//设置时区
header('Content-type:text/html; charset=utf-8');//设置编码
include('data.php');
$conn = mysqli_connect(DATA_HOST, DATA_USERNAME, DATA_PASSWORD);
if (mysqli_connect_errno($conn)) 
{ 
    echo "连接 MySQL 失败: " . mysqli_connect_error(); 
} 
mysqli_select_db($conn, DATA_NAME);
mysqli_query($conn, 'set names utf8');
$cms_version = 'v2.1-20180428';
?>
