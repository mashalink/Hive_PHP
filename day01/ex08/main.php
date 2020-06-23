#!/usr/bin/php
<?PHP
	include("ft_is_sort.php");
	$i = 10;
	$array_1 = array();
	while ($i > 0)
	{
		array_push($array_1, $i);
		$i--;
	}
	$array_2 = array();
	while ($i < 10)
	{
		array_push($array_2, $i);
		$i++;
	}
	echo ft_is_sort($array_1) ? "TRUE\n" : "FALSE\n";
	echo ft_is_sort($array_2) ? "TRUE\n" : "FALSE\n";
?>