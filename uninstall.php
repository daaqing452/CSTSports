<?php
	include_once("connect.php");
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<?php
	mysql_query(
		"drop table docs"
	);
	echo "卸载成功<br/>";
	echo mysql_error();
?>