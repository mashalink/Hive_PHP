<?php
	function ft_is_sort($array)
	{
		$copy = $array;
		sort($copy);
		if($copy == $array)
			return (TRUE);
		else
			return (FALSE);
	}
?>