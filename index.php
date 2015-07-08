<?php
	error_reporting(E_ALL || ~E_NOTICE);
	include_once("connect.php");
	include_once("function.php");
	$url = seperateURL();
?>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>酒井竞技</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<script class="jsbin" src="jquery-1.10.1.min.js"></script>
	<link href='bootstrap/css/bootstrap.css' rel='stylesheet'>
	<link href='main.css' rel='stylesheet'>
	<link href="buttons\Buttons\css\buttons.css" rel="stylesheet">
	<script src="bootstrap/js/bootstrap.js"></script>
</head>

<body class="JJbody">

<div class="JJcontainer">
	
	<!-- <div class="JJcontainer" style="height:40px"> </div> -->
	
	<!-- 标题 -->
	<div class="img-rounded" style="background-color:#ffffff">
		<a href="index.php"><img src="image/header.png" style="margin:10px"/></a>
	</div>





	<div class="JJcontainer" style="height:20px"> </div>





	<!-- 导航 -->
	<ul class="nav nav-tabs">
	
	<!-- 酒井足球 -->
	<li class="dropdown">
		<a class="dropdown-toggle button button-rounded button-flat-primary JJguidetag" data-toggle="dropdown" style="padding-top:20px" href="#">
			<span class="JJguidetext">酒井足球</span>
		</a>
		<ul class="dropdown-menu">
			<li>
				<a href="index.php?2014jjbzqs&doc">2014~2015赛季酒井杯足球赛</a>
			</li>
		</ul>
	</li>

	<li><div class="JJguideblank">&nbsp;</div></li>
  
	<!-- 酒井篮球 -->
	<li class="dropdown">
		<a class="dropdown-toggle button button-rounded button-flat-action JJguidetag" data-toggle="dropdown" style="padding-top:20px" href="#">
			<span class="JJguidetext">酒井篮球</span>
		</a>
		<ul class="dropdown-menu">
			
		</ul>
	</li>

	<li><div class="JJguideblank" style="width:30px">&nbsp;</div></li>
  
	<!-- 酒井田径 -->
	<li class="dropdown">
		<a class="dropdown-toggle button button-rounded button-flat-highlight JJguidetag" data-toggle="dropdown" style="padding-top:20px" href="#">
			<span class="JJguidetext">酒井田径</span>
		</a>
		<ul class="dropdown-menu">
			
		</ul>
	</li>

	<li><div class="JJguideblank">&nbsp;</div></li>
  
	<!-- 其他赛事 -->
	<li class="dropdown">
		<a class="dropdown-toggle button button-rounded button-flat-caution JJguidetag" data-toggle="dropdown" style="padding-top:20px" href="#">
			<span class="JJguidetext">其他赛事</span>
		</a>
		<ul class="dropdown-menu">
			
		</ul>
	</li>

	</ul>
	
	
	
	
	
	<div class="JJcontainer" style="height:20px"> </div>

	<div class="JJcontainer">
<?php
	if (substr($url[0], 4, 6) == "jjbzqs")
	{
		include_once("football.php");
		exit(0);
	} else
	{
		include_once("frontpage.php");
		exit(0);
	}
?>
		<div style="clear:both"> </div>
	</div>
	
	
	
	
	
	<div class="JJcontainer" style="height:1000px">
		<p>asdasd</p>
	</div>

</div>

</body>

</html>