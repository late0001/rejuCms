<?php

if (isset($_POST['save'])) {
	null_back($_POST['l_name'], '请填写链接名称');
	non_numeric_back($_POST['l_sort'], '排序必须是数字!');
	$data['l_name'] = $_POST['l_name'];
	$data['l_logo'] = $_POST['l_logo'];
	$data['l_url'] = $_POST['l_url'];
	$data['l_sort'] = $_POST['l_sort'];
	$sql = 'update rjcms_link set ' . arrtoupdate($data) . ' where l_id = ' . $_GET['l_id'] . '';
	if (mysqli_query($conn, $sql)) {
		alert_href('链接修改成功!', 'cms_link.php');
	} else {
		alert_back('修改失败!');
	}
}
