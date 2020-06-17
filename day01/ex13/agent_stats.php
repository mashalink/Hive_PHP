#!/usr/bin/php
<?php
	if ($argc != 2)
		return (0);
	$arr = file("php://stdin");
	unset($arr[0]);
	if ($argv[1] == "average")
	{
		$i = 0;
		$sum = 0;
		foreach ($arr as $line)
		{
			$line = explode(";", $line);
			if ($line[1] != "" && $line[2] != "moulinette")
			{
				$sum += intval($line[1]);
				$i++;
			}
		}
		if ($i > 0)
			echo $sum / $i."\n";
	}
	else if ($argv[1] == "average_user")
	{
		$list = array();
		foreach ($arr as $line)
		{
			$line = explode(";", $line);
			$list[$line[0]] = 42;
		}
		ksort($list);
		foreach ($list as $user => $value)
		{
			$sum = 0;
			$count = 0;
			foreach ($arr as $elem)
			{
				$elem = explode(";", $elem);
				if ($elem[0] == $user && $elem[1] != "" && $elem[2] != "moulinette")
				{
					$sum += $elem[1];
					$count++;
				}
			}
			if ($count > 0)
				echo $user.":".$sum / $count."\n";
		}
	}
	else if ($argv[1] == "moulinette_variance")
	{
		$list = array();
		foreach ($arr as $line)
		{
			$line = explode(";", $line);
			$list[$line[0]] = 42;
		}
		ksort($list);
		foreach ($list as $user => $value)
		{
			$sum = 0;
			$count = 0;
			$mouli = 0;
			foreach ($arr as $elem)
			{
				$elem = explode(";", $elem);
				if ($elem[0] == $user && $elem[1] != "" && $elem[2] != "moulinette")
				{
					$sum += $elem[1];
					$count++;
				}
				if ($elem[0] == $user && $elem[1] != "" && $elem[2] == "moulinette")
				{
					$mouli = $elem[1];
				}
			}
			$res = ($sum / $count) - $mouli;
			if ($count > 0)
				echo $user.":".$res."\n";
		}
	}
?>