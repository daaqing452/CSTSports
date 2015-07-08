<?php
	function getNowPageURL() 
	{
		$pageURL = 'http';

		if ($_SERVER["HTTPS"] == "on") 
		{
			$pageURL .= "s";
		}
		$pageURL .= "://";

		if ($_SERVER["SERVER_PORT"] != "80") 
		{
			$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
		} 
		else 
		{
			$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
	
	function seperateURL()
	{
		$str0 = getNowPageURL();
		
		$pos = strpos($str0, "?");
		if ($pos == false) return;
		$ret[0] = substr($str0, $pos + 1);
		
		for ($i = 0; ; ++ $i)
		{
			$pos = strpos($ret[$i], "&");
			if ($pos == false) break;
			$ret[$i + 1] = substr($ret[$i], $pos + 1);
			$ret[$i] = substr($ret[$i], 0, $pos);
		}
		
		return $ret;
	}
	
	function singleQuery($queryStr)
	{
		$result = mysql_query($queryStr);
		while ($now = mysql_fetch_array($result))
			return $now;
	}
	
	function swap(&$A, &$B)
	{
		$temp = $A;
		$A = $B;
		$B = $temp;
	}
?>