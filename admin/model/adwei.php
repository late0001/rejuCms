<?php

if (isset($_POST['save'])) {
	null_back($_POST['n_name'], '请输入名称');
	$_data['name'] = $_POST['n_name'];
	$str = arrtoinsert($_data);
	$sql = 'insert into rjcms_adclass (' . $str[0] . ') values (' . $str[1] . ')';
	if (mysqli_query($conn, $sql)) {
		alert_href('添加成功!', 'cms_adwei.php');
	} else {
		alert_back('添加失败!');
	}
}
if (isset($_GET['del'])) {
	$sql = 'delete from rjcms_adclass where id = ' . $_GET['del'] . '';
	if (mysqli_query($conn, $sql)) {
		alert_href('删除成功!', 'cms_adwei.php');
	} else {
		alert_back('删除失败！');
	}
}
