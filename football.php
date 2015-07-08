<?php
	// 赛事介绍
	function introducePage()
	{
		global $game;
		$now = singleQuery("select * from zqgame where game='".$game."'");
		echo $now["content"];
	}
	
	// 赛事新闻
	function docPage()
	{
		global $url;
		global $game;
		global $addr;
		$docid = $url[2];
		
		if ($docid == "")
		{
			$result = mysql_query("select * from doc where game='".$game."' order by docid desc");
			echo "<ul class='nav nav-tabs nav-stacked'>";
			while ($now = mysql_fetch_array($result))
			{
				echo "
					<li><a href='".$addr."doc&".$now["docid"]."'><span class='JJwryh'>".$now["title"]."</span></a></li>
				";
			}
			echo "</ul>";
			return;
		}
		
		$now = singleQuery("select * from doc where docid='".$docid."'");
		echo "
			<h2><center><span class='JJwryh'>".$now["title"]."</span></center></h2><br/><br/>
			".$now["content"]."
		";
	}
	
	// 小组赛
	function groupmatchPage()
	{
		global $game;
		$N = 18;
		$g = array(
			//		组   排  班  场  分  胜  平  负  进  失  净  弃
			array(  'A', 1,  14, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			array(  'A', 1,  15, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			array(  'A', 1,  20, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			array(  'A', 1,  22, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			array(  'A', 1,  24, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			
			array(  'B', 1,  11, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			array(  'B', 1,  25, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			array(  'B', 1,  32, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			array(  'B', 1,  35, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			
			array(  'C', 1,  12, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			array(  'C', 1,  13, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			array(  'C', 1,  33, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			array(  'C', 1,  34, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			
			array(  'D', 1,  10, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			array(  'D', 1,  21, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			array(  'D', 1,  23, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			array(  'D', 1,  30, 0,  0,  0,  0,  0,  0,  0,  0,  0   ),
			array(  'D', 1,  31, 0,  0,  0,  0,  0,  0,  0,  0,  0   )
		);
		
		for ($i = 0; $i <= $N; ++ $i)
		{
			if ($i == $N)
			{
				echo "</table></center>";
				break;
			}
			
			if ($i == 0 || $g[$i][0] != $g[$i - 1][0])
			{
				if ($i > 0)
				{
					echo "</table></center><br/><br/><br/><br/><br/>";
				}
				echo "
					<h1 class='jjwryh'>".$g[$i][0]."组</h1>
					<center>
					<table border='1' cellpadding='5px'>
					<tr>
						<td>排名</td>
						<td>班级</td>
						<td>场次</td>
						<td>积分</td>
						<td>胜</td>
						<td>平</td>
						<td>负</td>
						<td>进球</td>
						<td>失球</td>
						<td>净胜球</td>
						<td>弃权</td>
					</tr>
				";
			}
			
			echo "
				<tr>
					<td>".$g[$i][1]."</td>
					<td>计".$g[$i][2]."</td>
					<td>".$g[$i][3]."</td>
					<td>".$g[$i][4]."</td>
					<td>".$g[$i][5]."</td>
					<td>".$g[$i][6]."</td>
					<td>".$g[$i][7]."</td>
					<td>".$g[$i][8]."</td>
					<td>".$g[$i][9]."</td>
					<td>".$g[$i][10]."</td>
					<td>".$g[$i][11]."</td>
				</tr>
			";
		}
	}
	
	// 射手榜
	function shooterPage()
	{
		$N = 3;
		$g = array(
			//		班  名        进
			array(  23, "鲁逸沁", 0    )
		);
	
		echo "
			<center>
				<div class='JJrankblock'>
					<img class='img-rounded' src='image/shooter.png'></img>
				</div>
				<h1 class='JJwryh JJrankblocktext'>射手榜</h1>
				<table border='0' cellpadding='5px'>
					<tr>
						<td width='100px'><b>排名</b></td>
						<td width='100px'><b>班级</b></td>
						<td width='100px'><b>姓名</b></td>
						<td width='100px'><b>进球数</b></td>
					</tr>
		";
		for ($i = 0; $i < $N; $i = $j)
		{
			$j = $i + 1;
			while ($j < $N && $g[$i][2] == $g[$j][2]) ++ $j;
			for ($k = $i; $k < $j; ++ $k)
			{
				echo "<tr/>";
				if ($k != $i) echo "<td>&nbsp</td>"; else echo "<td>".($i + 1)."</td>";
				echo "
					<td>".$g[$k][0]."</td>
					<td>".$g[$k][1]."</td>
					<td>".$g[$k][2]."</td>
					</tr>
				";
			}
		}
		echo "
				</table>
			</center>
		";
	}
	
	// 数据库
	function dataPage()
	{
		
	}
?>


<?php
	$url = seperateURL();
	$game = $url[0];
	$addr = "index.php?".$game."&";
?>

<!-- 左侧导航 -->
<div class="JJleft">
	<ul class="nav nav-stacked">
		
		<li>
			<a href="<?php echo $addr."doc" ?>" class="button button-rounded button-flat-royal" style="padding:5px;margin-bottom:10px">
				<span class="JJlabeltext JJlabel">赛事新闻</span>
			</a>
		</li>
		
		<li>
			<a href="<?php echo $addr."groupmatch" ?>" class="button button-rounded button-flat-royal" style="padding:5px;margin-bottom:10px">
				<span class="JJlabeltext JJlabel">小组赛</span>
			</a>
		</li>
		
		<li>
			<a href="<?php echo $addr."knochoutmatch" ?>" class="button button-rounded button-flat-royal" style="padding:5px;margin-bottom:10px">
				<span class="JJlabeltext JJlabel">淘汰赛</span>
			</a>
		</li>
		
		<li>
			<a href="<?php echo $addr."shooter" ?>" class="button button-rounded button-flat-royal" style="padding:5px;margin-bottom:10px">
				<span class="JJlabeltext JJlabel">射手榜</span>
			</a>
		</li>
		
		<li>
			<a href="<?php echo $addr."data" ?>" class="button button-rounded button-flat-royal" style="padding:5px;margin-bottom:10px">
				<span class="JJlabeltext JJlabel">数据库</span>
			</a>
		</li>
		
	</ul>
</div>





<!-- 内容 -->
<div class="JJright img-rounded">
<?php
	if ($url[1] == "doc") docPage(); else
	if ($url[1] == "groupmatch") groupmatchPage(); else
	if ($url[1] == "knockoutmatch") knockoutmatchPage(); else
	if ($url[1] == "shooter") shooterPage(); else
	if ($url[1] == "data") dataPage();
?>
</div>