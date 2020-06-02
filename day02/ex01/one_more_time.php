#!/usr/bin/php
<?php
	if($argc == 2)
	{
		if((substr_count($argv[1], ' ') != 4) || (substr_count($argv[1], ':') != 2))
		{
			echo "Wrong Format\n";
			exit(-1);
		}
		
		if ((preg_match("/(^[L|l]undi|^[M|m]ardi|^[M|m]ercredi|^[J|j]eudi|^[V|v]endredi|^[S|s]amedi|^[D|d]imanche)( )([1-9]{1}|[0-3][0-9])( )([J|j]anvier|[F|f][é|e]vrier|[M|m]ars|[A|a]vril|[M|m]ai|[J|j]uin|[J|j]uillet|[A|a]o[û|u]t|[S|s]eptembre|[O|o]ctobre|[N|n]ovembre|[D|d][é|e]cembre)( )([1-2]{1}[0-9]{3})( )([0-2]{1}[0-9]{1}:[0-2]{1}[0-9]{1}:[0-6]{1}[0-9]{1})$/", $argv[1])) == 1)
		{
			$arr = explode(" ", $argv[1]);
			$time = explode(':', $arr[4]);
			$dayofweek = array("1" => "lundi", "2" => "mardi", "3" => "mercredi", "4" => "jeudi", "5" => "vendredi", "6" => "samedi", "0" => "dimanche");
			$dayofweekbig = array("1" => "Lundi", "2" => "Mardi", "3" => "Mercredi", "4" => "Jeudi", "5" => "Vendredi", "6" => "Samedi", "0" => "Dimanche");
			$month = array("1" => "janvier","2" => "février","3" => "mars", "4" => "avril", "5" => "mai", "6" => "juin" , "7" => "juillet", "8" => "août", "9" => "septembre", "10" => "octobre", "11" => "novembre", "12" => "décembre");
			$monthbig = array("1" => "Janvier","2" => "Février","3" => "Mars", "4" => "Avril", "5" => "Mai", "6" => "Juin" , "7" => "Juillet", "8" => "Août", "9" => "Septembre", "10" => "Octobre", "11" => "Novembre", "12" => "Décembre");
			$month2 = array("1" => "janvier","2" => "fevrier","3" => "mars", "4" => "avril", "5" => "mai", "6" => "juin" , "7" => "juillet", "8" => "aout", "9" => "septembre", "10" => "octobre", "11" => "novembre", "12" => "decembre");
			$monthbig2 = array("1" => "Janvier","2" => "Fevrier","3" => "Mars", "4" => "Avril", "5" => "Mai", "6" => "Juin" , "7" => "Juillet", "8" => "Aout", "9" => "Septembre", "10" => "Octobre", "11" => "Novembre", "12" => "Decembre");
			$day = array_search($arr[0], $dayofweek);
			if (!$day)
				$day = array_search($arr[0], $dayofweekbig);
			$checkmonth = array_search($arr[2], $month);	
			if (!$checkmonth)
				$checkmonth = array_search($arr[2], $monthbig);
			if (!$checkmonth)
				$checkmonth = array_search($arr[2], $month2);
			if (!$checkmonth)
				$checkmonth = array_search($arr[2], $monthbig2);
			$real_day = date('w', strtotime($arr[3]."-".$checkmonth."-".$arr[1]." ".$arr[4]));
			// echo $real_day;
			// echo $day;
			// echo $checkmonth;
			// echo arr[2];
			if ($real_day != $day || !checkdate($checkmonth, $arr[1], $arr[3]))
			{
					echo "Wrong Format\n";
					exit(-1);
			}
			if (($arr[3] > 1969) && ((time[0] > -1 && $time[0] < 25) && ($time[1] > -1 && $time[1] < 60) && ($time[2] > -1 && $time[2] < 60)) && ($arr[1] > 0 && $arr[1] < 32))
			{
				date_default_timezone_set("Europe/Paris");
				echo strtotime($arr[3]."-".$checkmonth."-".$arr[1]." ".$arr[4])."\n";
			}
			else
			{
				echo "Wrong Format\n";


				exit(-1);
			}
		}
		else
		{
			echo "Wrong Format\n";
			exit(-1);
		}
	}
?>