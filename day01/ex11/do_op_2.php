#!/usr/bin/php
<?php
	function do_op($a, $b, $sign)
	{		
		if ($b == 0 && ($sign == '/' || $sign == '%'))
			echo "Divider cannot be zero!\n";
		else if ($sign == '+')
			echo $a + $b."\n";
		else if ($sign == '-')
			echo $a - $b."\n";
		else if ($sign == '*')
			echo $a * $b."\n";
		else if ($sign == '/')
			echo $a / $b."\n";
		else if ($sign == '%')
			echo $a % $b."\n";
	}
	if ($argc == 2)
	{
		if (preg_match_all("/^( *-?\d+ *)(\*|\+|-|\/|%)( *-?\d+ *)$/", $argv[1], $mat))
		{
			$i = 0;
			foreach ($mat[0] as $val) {
			$a = trim($mat[1][$i]);
			$sign = trim($mat[2][$i]);
			$b = trim($mat[3][$i]);
			$i++;
			do_op($a, $b, $sign);
			}
		}
		else
				echo "Syntax Error\n";
	}
	else 
		echo "Incorrect Parameters\n";
?>