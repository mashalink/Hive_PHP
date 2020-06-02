#!/usr/bin/php
<?php
	$i = 0;
	$array = array();
	foreach($argv as $item)
	{
		if ($i++ > 0)
		{
			$str = array_filter(explode(" ", $item));
			$array = array_merge($array, $str);
		}
	}
	sort($array);
	foreach($array as $item)
		echo $item."\n";
?>