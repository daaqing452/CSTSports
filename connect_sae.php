<?php
	session_start();
	$sql = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS) or die("connect to MySQL failed!" . mysql_error() . "<br/>");
	$db = mysql_select_db(SAE_MYSQL_DB, $sql) or die("connect to database failed" . mysql_error() . "<br/>");
	mysql_query("set names gbk2312");
?>
