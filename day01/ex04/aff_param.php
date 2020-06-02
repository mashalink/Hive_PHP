#!/usr/bin/php
<?php
	$i = 0;
	foreach($argv as $item)
	{
		if ($i++ > 0)
			echo $item."\n";
	}
?>