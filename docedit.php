<?php
	include_once("connect.php");
	include_once("function.php");
	error_reporting(E_ALL || ~E_NOTICE);
	$addr = "docedit.php";
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>酒井竞技 - 编辑</title>
	<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="ueditor/ueditor.all.js"></script>
	<script class="jsbin" src="jquery-1.10.1.min.js"></script>

<?php

	function selectGames()
	{
		$ret = "";
		$ret = $ret."<option value='2014jjbzqs'>2014~2015赛季酒井杯足球赛</option>";
		return $ret;
	}

	// 添加文档
	function adddoc()
	{
		global $addr;
		global $str2;
		
		if ($str2 == "yes")
		{
			$now = singleQuery("select * from system");
			$docid = $now["docnumber"] + 1;
			
			mysql_query("
				update system set docnumber=".$docid."
			");
			
			$nowTime = date('y-m-d h:i:s', time());
			
			mysql_query("
				insert into doc (game, docid, title, content, time) values
				('".$_POST["game"]."', ".$docid.", '".$_POST["title"]."', '".$_POST["content"]."', '".$nowTime."')
			");
			
			echo "添加成功！<br/><br/>";
			echo mysql_error();
			echo "<a href='".$addr."'>返回</a>";
			return;
		}
		
		echo "
			<h1>添加文档</h1>
			<form method='post' action='".$addr."?adddoc&yes'>
				比赛：
				<select name='game'>".selectGames()."</select>
				<br/>
				标题：
				<input type='text' name='title' style='width:946px'/>
				<br/>
				内容：
				<script id='content' name='content' type='text/plain'></script>
				<script type='text/javascript'>
					var ue = UE.getEditor('content');
				</script>
				<input type='submit' value='确定'/>
			</form>
		";
	}
	
	// 修改文档
	function modifydoc()
	{
		global $addr;
		global $str2;
		
		if ($str2 == "")
		{
			$result = mysql_query("
				select * from doc order by docid desc
			");
			echo "<h1>选择文档</h1><table border='0' cellpadding='10px'>";
			while ($now = mysql_fetch_array($result))
			{
				echo "
					<tr>
						<td><b>".$now["game"]."</b></td>
						<td><a href='".$addr."?modifydoc&".$now["docid"]."'>".$now["title"]."</a></td>
					</tr>
				";
			}
			return;
		}
		
		if ($str2 == "yes")
		{
			mysql_query("
				update doc set title='".$_POST["title"]."', content='".$_POST["content"]."' where docid='".$_POST["docid"]."'
			");
			echo "修改成功！<br/><br/>";
			echo mysql_error();
			echo "<a href='".$addr."'>返回</a>";
			return;
		}
		
		if ($str2 == "delete")
		{
			mysql_query("
				delete from doc where docid='".$_POST["docid"]."';
			");
			echo "删除成功！<br/><br/>";
			echo mysql_error();
			echo "<a href='".$addr."'>返回</a>";
			return;
		}
		
		$now = singleQuery("select * from doc where docid='".$str2."'");
		echo "
			<h1>修改文档</h1>
			<form method='post' action='".$addr."?modifydoc&yes'>
				比赛：
				<input type='text' name='game' value='".$now["game"]."' readonly='readonly'/>
				<br/>
				编号：
				<input type='text' name='docid' value='".$now["docid"]."' readonly='readonly'/>
				<br/>
				标题：
				<input type='text' name='title' style='width:946px' value='".$now["title"]."'/>
				<br/>
				内容：
				<script id='content' name='content' type='text/plain'>"
					.$now["content"]."
				</script>
				<script type='text/javascript'>
					var ue = UE.getEditor('content');
				</script>
				<input type='submit' value='确认'/>
			</form>
			<form method='post' action='".$addr."?modifydoc&delete'>
				<input type='submit' value='删除'/>
				<input type='text' name='docid' style='display:none' value='".$now["docid"]."' readonly='readonly'/>
			</form>
		";
	}
?>
</head>

<body>

<?php
	if ($_POST["pwd"] != "jsjxxshtybnb" && $_SESSION["admin"] != "yes")
	{
		echo "
			<form method='post' action='".$addr."'>
				口令：<input type='password' name='pwd' />
				<input type='submit' value='进入'/>
			</form>
		";
		exit(0);
	}
	
	$_SESSION["admin"] = "yes";
	
	$url = seperateURL();
	$type = $url[0];
	$str2 = $url[1];
	
	// 分类
	if ($type == "")
	{
		echo "
			<h1>编辑足球数据</h1>
			<a href='".$addr."?adddoc'>添加文档</a>&nbsp;&nbsp;
			<a href='".$addr."?modifydoc'>修改文档</a><br/><br/>
		";
		exit(0);
	}
	
	// 添加文档
	if ($type == "adddoc") { adddoc(); exit(0); }
	// 修改文档
	if ($type == 'modifydoc') { modifydoc(); exit(0); }
?>



</body>

</html>