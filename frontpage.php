<div style="float:left">
	<div id="myCarousel" class="carousel slide" style="width:430px;">
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
		</ol>
		
		<!-- Carousel items -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="image/large_sEyQ_1809000134531191.jpg"></img>
				<div class="carousel-caption">
					<h4>美如画</h4>
					<p>老大尽力了，输球不怪他。再看他队友，纯属废物渣。干啥啥不行，全都去死吧。你说他不行，你行你上啊！</p>
				</div>
			</div>
			<div class="item">
				<img src="image/large_yYN0_3f3e000088f4118f.jpg"></img>
				<div class="carousel-caption">
					<h4>。。。</h4>
					<p>。。。</p>
				</div>
			</div>
			
			
		</div>
		
		<!-- Carousel nav -->
		<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
	</div>
</div>

<div class="JJfrontpageright img-rounded">
<?php
	$result = mysql_query("select * from doc order by docid desc");
	$cnt = 0;
	while ($now = mysql_fetch_array($result))
	{
		++ $cnt;
		//if ($cnt > 5) break;
		echo "
			<a href='index.php?".$now["game"]."&doc&".$now["docid"]."'><div style='margin:20px 0px 20px 0px'><span class='JJfrontpagetext'>".$now["title"]."</span></div></a>
		";
	}
?>
</div>

<script>
	$('.carousel').carousel({
		interval: 4000
	})
</script>