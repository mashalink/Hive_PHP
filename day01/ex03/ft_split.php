<?php
	function ft_split($str)
	{
		$array = array_filter(explode(" ", $str));
		sort($array);
		if (count($array) == 0)
			return(NULL);
		return ($array);
	}
?>