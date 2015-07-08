<?php
	$sql = mysql_connect('localhost', "luyiqin", "123456") or die("connect to MySQL failed!" . mysql_error() . "<br/>");
	$db = mysql_select_db("cstsports", $sql) or die("connect to database failed" . mysql_error() . "<br/>");
	mysql_query("set names gbk2312");
	session_start();
?>
