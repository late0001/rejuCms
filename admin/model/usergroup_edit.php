<?php
if (isset($_POST['save'])) {
	null_back($_POST['ug_name'], '请输入名称');
	$_data['ug_name'] = $_POST['ug_name'];
	$_data['ug_upgrade'] = $_POST['ug_upgrade'];
	$sql = 'update rjcms_user_group set ' . arrtoupdate($_data) . ' where ug_id = ' . $_GET['id'] . '';
	if (mysqli_query($conn, $sql)) {
		alert_href('修改成功!', 'cms_usergroup.php');
	} else {
		alert_back('修改失败!');
	}
}
