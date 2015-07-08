<?php
	error_reporting(E_ALL || ~E_NOTICE);
	include_once("connect.php");
	include_once("function.php");
	
	date_default_timezone_set("Asia/Shanghai");
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<?php
	mysql_query("
		create table doc
		(
			game varchar(50),
			docid int(20),
			title text,
			content text,
			time varchar(50)
		)
	");
	
	mysql_query("
		create table system
		(
			docnumber int(20)
		)
	");
	
	mysql_query("
		insert into system (docnumber) values (0)
	");
	
	echo "安装成功！<br/>";
	echo mysql_error();
?>